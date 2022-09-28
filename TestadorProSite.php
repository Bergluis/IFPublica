<?php
if( $_GET['tmpString'] != null ) {
    $pes_pk = $_GET['tmpString'];
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
                                <a href="index.php">Principal</a>
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
        
        <!-- // Consulta do evento //-->
        
        <?php

            include "bd_conectar.php";
            $mysqli = Conectar();

            $consulta1 = $mysqli->query("
            SELECT * FROM eventos
            INNER JOIN pessoas ON eventos.eve_fk_revisor = pessoas.pes_pk
            WHERE pes_pk = $pes_pk;
            ");

            $quantidade1 = $consulta1->num_rows;
            if ( $quantidade1 == 0 ){    header("Location:index.php"); }
            
            if($consulta1){

                $registro = $consulta1->fetch_array(MYSQLI_ASSOC);
                    $eve_cod=$registro["eve_pk"];
                    $eve_nome=$registro["eve_nome"];
                    $eve_edicao=$registro["eve_edicao"];
                    $eve_revisor=$registro["pes_nome"];
                
            }else echo($db->error);
        
            $consulta1->close();

        ?>
                    
        <div class="Banner_sec" id="home">
            <!--  \\ Begin banner Side -->
            <div class="bannerside">
                    <div align="center">
                        <strong>Bem vindo(a) <?php echo $eve_revisor ?></strong>
                    </div>
	            <div class="Center">
                    
                    <form action="ArtigosAlteracoes.php" method="post">
                    <select name="evento">
                        
                        
                        
                        <option value="0">Selecione o evento</option>
                        <option value="1"><?php echo $eve_nome," ",$eve_edicao; ?></option>
                    </select>
                        <br>
                    <input type="submit" name="botao" value="Listar Artigos">
                    </form>
	            </div>
            </div>
            <!--  // End banner Side // -->
            <div class="clear"></div>
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