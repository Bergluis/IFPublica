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
                                <a href="TestadorProSite.php">Voltar</a>
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
        <div class="anais" id="sumario">
                <div class="Center">                
                <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                <tr >
                    <td valign="top">
                        
                    <div class="AreaTexto">
                    
                    <div class="TituloPainel">Filtro</div>
                    <form action="SalvandoBD.php" method="post">

    <?php
    if( $_GET['id'] != '' ) {
        $cod_artigo = $_GET['id'];
    }
    if ( empty($cod_artigo) ){    header("Location:index.php");   }

            //--pegando artigo--//
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
                    $cod_artigo=$dados1["art_pk"];
                    $art_titulo=$dados1["art_titulo"];
                    $art_resumo=$dados1["art_resumo"];
                    $art_palavra1=$dados1["art_palavra1"];
                    $art_palavra2=$dados1["art_palavra2"];
                    $art_palavra3=$dados1["art_palavra3"];
            }else echo($db->error);
            $r = 0;
            while($r !=3){            
                $r++;
                if($r == 1){
                    $string = $art_titulo;
                } else if($r == 2){
                    $string = $art_palavra1.";".$art_palavra2.";".$art_palavra3;
                    $palavrasChave = $string;
                } else if($r == 3){
                    $string = $art_resumo;
                }
                
                
            $array = str_split ($string);
            $qt1 = count($array);
            $contMudancas=0;
            $x = 0;
            $y = 0;
            $z = 0;
            $count = 0;
            $newArray[] = '';
                
                while ($x < $qt1){
                    $caracterTeste = $array[$x];

                    switch($caracterTeste){
                        case ' ':
                            if($count == 0){
                                array_push($newArray,$caracterTeste);
                            } else {
                                $contMudancas++;
                            }
                            $count++;
                            break;
                        case '/':
                            if(!isset($_POST['cbBarra']) == 1){
                                $contMudancas++;
                            } else {
                                array_push($newArray,$caracterTeste);
                            }
                            $count = 0;
                            break;
                        case '+':
                            if(!isset($_POST['cbMais']) == 2){
                                $contMudancas++;
                            } else {
                                array_push($newArray,$caracterTeste);
                            }
                            $count = 0;
                            break;
                        case '<':
                            if(!isset($_POST['cbMenor']) == 3){
                                $contMudancas++;
                            } else {
                                array_push($newArray,$caracterTeste);
                            }
                            $count = 0;
                            break;
                        case '>':
                            if(!isset($_POST['cbMaior']) == 4){
                                $contMudancas++;
                            } else {
                                array_push($newArray,$caracterTeste);
                            }
                            $count = 0;
                            break;
                        case '|':
                            if(!isset($_POST['cbOu']) == 5){
                                $contMudancas++;
                            } else {
                                array_push($newArray,$caracterTeste);
                            }
                            $count = 0;
                            break;
                        case '@':
                            if(!isset($_POST['cbArroba']) == 6){
                                $contMudancas++;
                            } else {
                                array_push($newArray,$caracterTeste);
                            }
                            $count = 0;
                            break;
                        case '`':
                            if(!isset($_POST['cbCrase']) == 7){
                                $contMudancas++;
                            } else {
                                array_push($newArray,$caracterTeste);
                            }
                            $count = 0;
                            break;
                        case '#':
                            if(!isset($_POST['cbVelha']) == 8){
                                $contMudancas++;
                            } else {
                                array_push($newArray,$caracterTeste);
                            }
                            $count = 0;
                            break;
                        default:
                            $count = 0;
                            array_push($newArray,$caracterTeste);
                    }
                    $x++;
                }

                $qt2 = count($newArray);
                $textoFinal= implode("",$newArray);
                if($r == 1){
                    $titulo = $textoFinal;
                    $contMudancas1= $contMudancas;
                } else if($r == 2){
                    $palavras = $textoFinal;
                    $contMudancas2 = $contMudancas;
                } else if($r == 3){
                    $resumo = $textoFinal;                   
                    $contMudancas3 = $contMudancas;
                }
                $string = "";
                $newArray = "";
            }
?> 
                        Código do artigo:<br>
                        <textarea name="codResumo" id="codResumo" rows="1" readonly><?php echo $cod_artigo; ?></textarea><br><br>
                        Título:<br>
                        <textarea name="resumo" id="resumo" rows="10" cols="200" disabled><?php echo $art_titulo; ?></textarea><br>
                    <textarea name="tituloPronto" id="tituloPronto" rows="10" cols="200"><?php echo $titulo; ?></textarea><br>
                        <?php echo $contMudancas1." alteração(ões)."; ?><br><br>
                        Palavras-Chave:<br>
                        <textarea name="resumo" id="resumo" rows="10" cols="200" disabled><?php echo $palavrasChave; ?></textarea><br>
                    <textarea name="palavraPronto" id="palavraPronto" rows="10" cols="200"><?php echo $palavras; ?></textarea><br>
                        <?php echo $contMudancas2." alteração(ões)."; ?><br><br>
                        Resumo:<br>
                        <textarea name="resumo" id="resumo" rows="10" cols="200" disabled><?php echo $art_resumo; ?></textarea><br>
                    <textarea name="resumoPronto" id="resumoPronto" rows="10" cols="200"><?php echo $resumo; ?></textarea><br>
                        <?php echo $contMudancas3." alteração(ões)."; ?><br>
                
                    <div align="right">
                        <input type="submit" name="cancelar" value="Cancelar">
                        <input type="submit" name="salvar" value="Salvar">
                    </div>
                </form>
                    </div>

                    </td>
                </tr>
                </table>

                </div>

            
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
    </div>
    </div>
    </body>
</html>