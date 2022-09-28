<?php
if( $_GET['id'] != '' ) {
    $cod_artigo = $_GET['id'];
}
if ( empty($cod_artigo) ){    header("Location:index.php");   }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- Title Tag -->
    <title>IFPublica-VA</title>
    <link rel="icon" type="image/png" href="img/logo7icone.png" />
<!-- November Template http://www.templatemo.com/tm-473-november -->
    <!-- <<Mobile Viewport Code>> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            
    <!-- <<Attched Stylesheets>> -->
    <link rel="stylesheet" href="css/theme.css" type="text/css" />
    <link rel="stylesheet" href="css/media.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />

    <!-- Owl Carousel -->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="owl-carousel/bootstrapTheme.css" rel="stylesheet">
    <link href="owl-carousel/custom.css" rel="stylesheet">

</head>
<body>

        <!-- \\ Begin Header \\ -->
        <header>
            <div class="Center">
                <div class="logo">
                    <a href="index.php"><img src="img/logo7va.png" alt="logo"></a>
                </div>
               <div id="mobile_sec">
               <div class="mobile"><i class="fa fa-bars"></i><i class="fa fa-times"></i></div>
                <div class="menumobile">
                    <!-- \\ Begin Navigation \\ -->
                    <nav class="Navigation">
                        <ul>
                            <li>                                
                                <a href="javascript:window.history.go(-1)"> < Voltar para a lista de artigos></Voltar></a>
                                <span class="menu-item-bg"></span>
                            </li>
                        </ul>
                    </nav>
                    <!-- // End Navigation // -->
                </div>
                </div>
                <div class="clear"></div>
            </div>
        </header>
        <!-- // End Header // -->    
        <!-- \\ Begin Banner Section \\ -->
        <div id="Container">
             <header2>
            <div class="Center2">
                
                 </div>
            </header2>
<?php

include "bd_conectar.php";
$mysqli = Conectar();

$atualiza1 = $mysqli->query("
UPDATE artigos
SET art_acesso = art_acesso + 1
WHERE art_pk = $cod_artigo
");
            
$consulta1 = $mysqli->query("
SELECT * FROM artigos
INNER JOIN escolas ON artigos.art_fk_escola = escolas.esc_pk
WHERE art_pk = $cod_artigo
");

$quantidade1 = $consulta1->num_rows;
if ( $quantidade1 == 0 ){    header("Location:index.php"); }
            
if($consulta1){
    $dados1 = $consulta1->fetch_array(MYSQLI_ASSOC);
        $art_titulo=$dados1["art_titulo"];
        $art_resumo=$dados1["art_resumo"];
        $art_palavra1=$dados1["art_palavra1"];
        $art_palavra2=$dados1["art_palavra2"];
        $art_palavra3=$dados1["art_palavra3"];
        $art_figura1=$dados1["art_figura1"];
        $art_figura2=$dados1["art_figura2"];
        $art_figura3=$dados1["art_figura3"];
        $art_video=$dados1["art_video"];
        $art_premiado=$dados1["art_premiado"];
        $art_escola=$dados1["esc_escola"];
        $art_acesso=$dados1["art_acesso"];
}else echo($db->error);


?>         

            <!-- \\  ARTIGO - início \\ -->
            <div class="Artigo" id="texto">
                <div class="Center">  
                    <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                    <tr >
                    <td valign="top">

                        <?php
                        if( $art_premiado != 0 ){
                        echo'
                        <div class="Acessos">
                        &nbsp;&nbsp;<img src="img/olho.png" width="15px">&nbsp;&nbsp;'.$art_acesso.' pessoas já leram este artigo
                        </div>
                        <div class="Medalha">
                        <img src="img/premiado.png">
                        </div>
                        ';
                        }
                        echo'
                        <div class="Titulo">'.$art_titulo.'¹</div>
                        <div class="Autores">
                        ';
                        
                        // Mostra autores - início
                        $consulta2 = $mysqli->query("
                        SELECT * FROM artigos
                        INNER JOIN autor_artigo ON artigos.art_pk = autor_artigo.aa_fk_artigo
                        INNER JOIN pessoas ON autor_artigo.aa_fk_autor = pessoas.pes_pk
                        WHERE art_pk = $cod_artigo
                        ORDER BY aa_ordem ASC
                        ");
                        while ($dados2 = $consulta2->fetch_assoc()) {
                            echo' '.$dados2["pes_nome"].' ';
                            echo "², ";
                        } 
                        // Mostra autores - fim
                        
                        // Mostra orientadores - início
                        $consulta3 = $mysqli->query("
                        SELECT * FROM artigos
                        INNER JOIN orientador_artigo ON artigos.art_pk = orientador_artigo.oa_fk_artigo
                        INNER JOIN pessoas ON orientador_artigo.oa_fk_orientador = pessoas.pes_pk
                        WHERE art_pk = $cod_artigo
                        ORDER BY oa_ordem ASC
                        ");
                        $quantidade3 = $consulta3->num_rows;
                        $aux3 = 1;
                        while ($dados3 = $consulta3->fetch_assoc()) {
                            echo' '.$dados3["pes_nome"].' ';
                            if( $aux3 == $quantidade3 ) { echo "³"; } else { echo "³, "; }
                            $aux3++;
                        } 
                        // Mostra orientadores - fim
                        
                        echo"
                        </div>
                        <div class=\"Resumo\"><strong>Resumo:</strong><br /> $art_resumo</div>
                        <div class=\"Resumo\"><strong>Palavras-chave:</strong>
                        "; 

                        // Mostra palavras-chave - início
                        if (empty($art_palavra1)) {  echo "Não informadas"; } else { echo "$art_palavra1"; }
                        if (isset($art_palavra2)) {  echo "; $art_palavra2"; }
                        if (isset($art_palavra3)) {  echo "; $art_palavra3"; }
                        // Mostra palavras-chave - fim

                        // Mostra imagens - início
                        echo".
                        </div>
                        <div class=\"Resumo\"><strong>Imagens:</strong><br />
                        ";
                        if (empty($art_figura1)) {  echo "Não informadas. "; }

                        

                        if( isset($art_figura1) ) {  
                        echo"
                        <div class=\"Figura\">
                            <a href=\"artigos/$art_figura1\"><img src=\"artigos/$art_figura1\"></a>
                        </div>
                        ";  
                        }
                        if( isset($art_figura2) ) {  
                        echo"
                        <div class=\"Figura\">
                            <a href=\"artigos/$art_figura2\"><img src=\"artigos/$art_figura2\"></a>
                        </div>
                        ";  
                        }
                        if( isset($art_figura3) ) {  
                        echo"
                        <div class=\"Figura\">
                            <a href=\"artigos/$art_figura3\"><img src=\"artigos/$art_figura3\"></a>
                        </div>
                        ";  
                        }

                        // Mostra imagens - fim
                        echo"
                        
                        
                        </div>
                        
                        <div class=\"AposFigura\">
                        
                        </div>

                        <div class=\"Resumo\"><strong>Vídeo:</strong>
                        ";
                        if (empty($art_video)) {  echo "Não informado. "; } else { echo "$art_video"; }
                        echo"
                        </div>
                        <br /><br />
                        <div class=\"Linha\"></div> 
                        <div class=\"Resumo\"><strong>Legenda:</strong>
                        <br />&nbsp;&nbsp;&nbsp;&nbsp; 1 - Trabalho da escola $art_escola
                        <br />&nbsp;&nbsp;&nbsp;&nbsp; 2 - Autor(a).
                        <br />&nbsp;&nbsp;&nbsp;&nbsp; 3 - Orientador(a).
                        <br /><br /><br /><br />
                        </div>
                        ";
                        ?>
                                     
                </td>
                </tr>
                </table>        
                </div>
            </div>
            <!-- // ARTIGO - fim // -->


        </div>
        <!-- // End Container // -->
        <!-- // End Banner Section // -->
         <div class="bgcolor"></div>

  
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<!-- <<Attched Javascripts>> -->
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.sudoSlider.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>


<!-- <<Carousel>> -->
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>

    <!-- Frontpage Demo -->
    <script>

    $(document).ready(function($) {
      $("#anais").owlCarousel();
    });


    $("body").data("page", "frontpage");

    </script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>

    <script src="assets/js/google-code-prettify/prettify.js"></script>
      <script src="assets/js/application.js"></script>

    <script type="text/javascript">
    jQuery(function($){
      var disqus_loaded = false;
      var top = $("#faq").offset().top; 
      var owldomain = window.location.hostname.indexOf("owlgraphic");
      var comments = window.location.href.indexOf("comment");

      if(owldomain !== -1){
        function check(){
          if ( (!disqus_loaded && $(window).scrollTop() + $(window).height() > top) || (comments !== -1) ){
            $(window).off( "scroll" )
            disqus_loaded = true;
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'owlcarousel'; // required: replace example with your forum shortname
            var disqus_identifier = 'OWL Carousel';
            //var disqus_url = 'http://owlgraphic.com/owlcarousel/';
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
          }
        }
        $(window).on( "scroll", check )
        check();
      } else {
        $('.disqus').hide();
      }
    });
    </script>


</body>
</html>