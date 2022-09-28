<!DOCTYPE html>
<?php
    if(isset ($_POST['botao'])){
        $consulta = $_POST['consulta'];
        $palavra = $_POST["busca"];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
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

<!-- \\ Begin Holder \\ -->
<div class="DesignHolder">
	<!-- \\ Begin Frame \\ -->
	<div class="LayoutFrame">
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
                                <a href="index.php">Voltar</a>
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
        
        
         <!-- \\ SUMÁRIO - início \\ -->
            <div class="anais" id="sumario">
                <div class="Center">                
                <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                <tr >
                    <td valign="top">
                        
                    <div class="AreaTexto">
                    
                    <div class="TituloPainel"><?php echo "Sumário"; ?></div>



                    <?php
                        include "bd_conectar.php";
                        $mysqli = Conectar();
                        
                        
                        
                        if($consulta == 0){echo "Você não selecionou a consulta!";}
                        
                        if($consulta != 0){
                        $numero_nivel = 1;
                        $numero_area = 1;
                        $numero_artigo = 1;

                            
                        if($consulta==1){ 
                        //consulta por título    
                            
                        $palavra = $_POST["busca"];
                        $consulta4 = $mysqli->query("
                        SELECT * FROM artigos
                        INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
                        INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
                        WHERE art_titulo LIKE '%$palavra%'
                        ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
                            ");


                        }else if($consulta==2){
                        //consulta por palavra-chave
                            
                        $palavra = $_POST["busca"];
                        $consulta4 = $mysqli->query("
                        SELECT * FROM artigos
                        INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
                        INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
                        WHERE art_palavra1 LIKE '%$palavra%'
                        OR art_palavra2 LIKE '%$palavra%'
                        OR art_palavra3 LIKE '%$palavra%'
                        ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
                            ");

                        }else if($consulta==3){
                        //consulta por Título e Palavra-chave
                            
                        $palavra = $_POST["busca"];
                        $palavra2 = $_POST["busca2"];
                        $consulta4 = $mysqli->query("
                        SELECT * FROM artigos
                        INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
                        INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
                        WHERE art_palavra1 LIKE '%$palavra2%'
                        OR art_palavra2 LIKE '%$palavra2%'
                        OR art_palavra3 LIKE '%$palavra2%' 
                        AND art_titulo LIKE '%$palavra%'
                        ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
                            ");

                        }else if($consulta==4){
                        //consulta por Área
                            
                        $palavra = $_POST["busca"];
                        $consulta4 = $mysqli->query("
                        SELECT * FROM artigos
                        INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
                        INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
                        WHERE Artigos.art_fk_area = Areas.are_pk
                        AND Areas.are_nome LIKE '%$palavra%'
                        ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
                            ");

                        }else if($consulta==5){
                        //busca por data
                            
                        $palavra = $_POST["busca"];
                        $consulta4 = $mysqli->query("
                        SELECT * FROM artigos, Eventos
                        INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
                        INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
                        WHERE artigos.art_fk_evento = Eventos.eve_pk
                        AND Eventos.eve_data_inicio LIKE '%$palavra%'
                        ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
                            ");

                        }else if($consulta==6){
                        //busca por autor
                            
                        $palavra = $_POST["busca"];
                        $consulta4 = $mysqli->query("
                        SELECT * FROM artigos 
                        INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
                        INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
                        WHERE artigos.art_pk = Autor_Artigo.aa_fk_artigo
                        AND Autor_Artigo.aa_fk_autor = Pessoas.pes_pk
                        AND pes_nome like '%$palavra%'
                        ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
                            ");

                        }else if($consulta==7){
                        //consulta por premiações    
                            
                        $consulta4 = $mysqli->query("
                        SELECT * FROM artigos
                        INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
                        INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
                        WHERE art_premiado = 1 OR art_premiado = 2 OR art_premiado = 3
                        ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
                            ");

                        }else if($consulta==8){
                        //busca por autor e premiações 
                            
                        $palavra = $_POST["busca"];
                        $consulta4 = $mysqli->query("
                        SELECT * FROM artigos, Autor_Artigo, Pessoas
                        INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
                        INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
                        WHERE artigos.art_premiado = 1 OR artigos.art_premiado = 2 OR artigos.art_premiado = 3
                        AND artigos.art_pk = Autor_Artigo.aa_fk_artigo
                        AND Autor_Artigo.aa_fk_autor = Pessoas.pes_pk
                        AND pes_nome like '%$palavra%'
                        ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
                            ");

                        }else if($consulta==9){
                            echo "Consulta por Sinônimos<br>";
                        }
                            
                            
                            

                        $aux_nivel = 0;
                        $aux_area = 0;

                        while ($dados4 = $consulta4->fetch_assoc()) {
                            if($dados4["niv_pk"] != $aux_nivel){
                                echo '<div class="TituloNivel">'.$numero_nivel.'. Nível '.$dados4["niv_nome"].'</div>';
                                $numero_nivel++;
                                $numero_area = 1;

                            }

                            if($dados4["are_pk"] != $aux_area){
                                echo '
                                <div class="TituloArea">'.($numero_nivel-1).'. '.$numero_area.'. '.$dados4["are_nome"].'</div>
                                <div class="AreaDescricao">'.$dados4["are_descricao"].'</div>
                                ';
                                $numero_area++;
                                $numero_artigo = 1;
                            } 
                            $art_cod = $dados4["art_pk"];

                            echo '
                            <div class="TituloArtigo"> 
                            <a href="Artigo.php?id='.$art_cod.'">'.($numero_nivel-1).'. '.($numero_area-1).'. '.$numero_artigo.'. ' . $dados4["art_titulo"] . '
                            ';
                            if( $dados4["art_premiado"] != 0 ){
                                echo'
                                    <img src="img/premiado.png" width="20px">
                                ';
                            }
                            echo' 
                            </a>
                            &nbsp;&nbsp;<img src="img/olho.png" width="15px"><span class="Acessos">' . $dados4["art_acesso"] . '</span>
                            </div> 
                            ';
                            $numero_artigo++;
                            $aux_nivel = $dados4["niv_pk"];
                            $aux_area = $dados4["are_pk"];


                        }
                         $consulta4->close();
                        } else {}
                    ?>
                    
                    </div>

                    </td>
                </tr>
                </table>

                </div>

            
            </div>
     <!-- // End Banner Section // -->
         <div class="bgcolor"></div>

	</div>
	<!-- // End Layout Frame // -->
</div>
<!-- // End Design Holder // -->
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