<?php
if( $_GET['id'] != '' ) {
    $eve_cod = $_GET['id'];
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
                            <li>
                                <a href="#capa">Capa</a>
                                <span class="menu-item-bg"></span>
                            </li>
                            <li>
                                <a href="#apresentacao">Apresentação</a>
                                <span class="menu-item-bg"></span>
                            </li>
                            <li>
                                <a href="#sumario">Sumário</a>
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
<?php

include "bd_conectar.php";
$mysqli = Conectar();

$consulta1 = $mysqli->query("
SELECT * FROM eventos
INNER JOIN escolas ON eventos.eve_fk_escola = escolas.esc_pk
INNER JOIN cidades ON escolas.esc_fk_cidade = cidades.cid_pk
INNER JOIN pessoas ON eventos.eve_fk_revisor = pessoas.pes_pk
WHERE eve_pk = $eve_cod
");

$quantidade1 = $consulta1->num_rows;
if ( $quantidade1 == 0 ){    header("Location:index.php"); }
            
if($consulta1){
            
    $registro = $consulta1->fetch_array(MYSQLI_ASSOC);
        $eve_nome=$registro["eve_nome"];
        $eve_sigla=$registro["eve_sigla"];
        $eve_publica=$registro["eve_publicacao"];
        $eve_publica = date('d/m/Y', strtotime($eve_publica));
        $eve_revisor = $registro["pes_nome"];
        $eve_edicao=$registro["eve_edicao"];
        $eve_site=$registro["eve_site"];
        $eve_descricao=$registro["eve_descricao"];
        $eve_inicio=$registro["eve_data_inicio"];
        $eve_ano = date('Y', strtotime($eve_inicio));
        $eve_inicio = date('d/m/Y', strtotime($eve_inicio));
        $eve_fim=$registro["eve_data_fim"];
        $eve_fim = date('d/m/Y', strtotime($eve_fim));
        $eve_logoorig=$registro["eve_logoorig"];
        $eve_escola=$registro["esc_escola"];
        $eve_cidade=$registro["cid_nome"];
        $eve_registro=$registro["eve_registro"];
}else echo($db->error);

$consulta1->close();

?>         
            <!-- \\ CAPA - início \\ -->
            <div class="anais" id="capa">
                <div class="Center">                
                <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%">
                    
                <tr >
                    <td>
                        <span class="imgLogo"><img src="eventos/<?php echo"$eve_logoorig";?>" align="left" width="300px"/></span>

                        <?php 
                        echo"
                        <br />
                        <div class='TituloPainel'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anais</div>
                        <div class='TituloAnais'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$eve_edicao $eve_nome
                        <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;($eve_sigla $eve_ano)</div>
                        <div class='InfoAnais'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data da publicação: $eve_publica</div>
                        <div class='InfoAnais'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Local: $eve_escola <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;($eve_cidade / RS)</div>
                        <div class='InfoAnais'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Revisão textual: <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TÂNIA WINCH LISBÔA <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JOSELINE TATIANA BOTH <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DANIEL PEZZI DA CUNHA <br />
                        </div>
                        <br /><br />
                        <div class='InfoAnais'>Direitos autorais: <br />
                        Autores de artigos publicados nesta biblioteca submeteram-se as regras dos eventos nos seguintes termos: a) Autores mantém os direitos autorais sobre o trabalho, permitindo à biblioteca IFPublica colocá-lo sob uma licença Creative Commons Attribution, que permite livremente a outros acessar, usar e compartilhar o trabalho com o crédito de autoria. b) Autores podem abrir mão dos termos da licença CC e definir contratos adicionais para a distribuição não-exclusiva e subsequente publicação do trabalho (ex.: publicar uma versão atualizada em um periódico, disponibilizar em repositório institucional ou publicá-lo em livro). c) Autores responsabilizam-se integralmente pelo conteúdo dos artigos publicados, inclusive por plágio ou outras irregularidades que porventura eles contenham.
                        <br /><br />
                        </div>                        
                        "; 
                        if( $eve_registro != '' ){
                            echo "
                            <div class='InfoAnais'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registro: $eve_registro</div>
                            ";
                        }
                        echo"
                        ";
                        ?>
 
                    </td>
                </tr>
                </table>

              
                </div>
            
            </div>
            <!-- // CAPA - fim // -->

            <!-- \\  APRESENTAÇÃO - início \\ -->
            <div class="anais" id="apresentacao">
                <div class="Center">                
                <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                <tr >
                    <td valign="top">
                        
                        <?php echo"
                        <div class='AreaTexto'>
                        <div class='TituloPainel'>Apresentação</div>
                        <div class='TituloAnais'>$eve_edicao $eve_nome - $eve_sigla $eve_ano</div>
                        <div class='Texto'>Período de realização do evento: de $eve_inicio até $eve_fim </div>
                        <div class='Texto'>Site oficial: <a href='$eve_site'>$eve_site</a></div>
                        <div class='Texto'>Descrição: $eve_descricao</div>
                        <div class='Texto'>Fotos:</div>
                        <div class='Texto'>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_01.jpg\"><img src=\"eventos/fotos/movaci2015_01.jpg\"></a>
                            </div>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_02.jpg\"><img src=\"eventos/fotos/movaci2015_02.jpg\"></a>
                            </div>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_03.jpg\"><img src=\"eventos/fotos/movaci2015_03.jpg\"></a>
                            </div>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_04.jpg\"><img src=\"eventos/fotos/movaci2015_04.jpg\"></a>
                            </div>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_05.jpg\"><img src=\"eventos/fotos/movaci2015_05.jpg\"></a>
                            </div>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_06.jpg\"><img src=\"eventos/fotos/movaci2015_06.jpg\"></a>
                            </div>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_07.jpg\"><img src=\"eventos/fotos/movaci2015_07.jpg\"></a>
                            </div>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_08.jpg\"><img src=\"eventos/fotos/movaci2015_08.jpg\"></a>
                            </div>
                            <div class=\"Foto\">
                                <a href=\"eventos/fotos/movaci2015_09.jpg\"><img src=\"eventos/fotos/movaci2015_09.jpg\"></a>
                            </div>
                        </div>
                        <div class=\"AposFoto\">
                        </div>

                        <div class='Texto'>Comissão organizadora:
                        
                         ";
//Mostra um ou mais coordenadores do evento
$consulta2 = $mysqli->query("
SELECT * FROM eventos 
INNER JOIN comissao_evento ON eventos.eve_pk = comissao_evento.ce_fk_evento
INNER JOIN pessoas ON comissao_evento.ce_fk_comissao = pessoas.pes_pk
WHERE eve_pk = $eve_cod AND ce_coord = 1
ORDER BY pes_nome ASC
    ");

    echo '<br /><br />&nbsp;&nbsp;&nbsp; Coordenação geral <br />';
while ($dados2 = $consulta2->fetch_assoc()) {
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $dados2["pes_nome"] . ' <br />';
}
 $consulta2->close();

// Mostra os membros do comitês do evento
$consulta3 = $mysqli->query("
SELECT * FROM eventos 
INNER JOIN comissao_evento ON eventos.eve_pk = comissao_evento.ce_fk_evento
INNER JOIN pessoas ON comissao_evento.ce_fk_comissao = pessoas.pes_pk
INNER JOIN comites ON comissao_evento.ce_fk_comite = comites.com_pk
WHERE eve_pk = $eve_cod
ORDER BY com_nome ASC, pes_nome ASC
    ");

$aux_comite = 0;
while ($dados3 = $consulta3->fetch_assoc()) {
    if($dados3["com_pk"] != $aux_comite){
        echo '<br />&nbsp;&nbsp;&nbsp; '.$dados3["com_nome"].' <br />';
    } 
    
    if($dados3["ce_coord"] == 2) { 
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $dados3["pes_nome"] . ' - coordenador(a) <br />';
    } else {
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $dados3["pes_nome"] . '<br />';
    }

    $aux_comite = $dados3["com_pk"];
}
 $consulta3->close();
                        echo"
                        </div>
                        </div>
                        "; ?>

                    </td>
                </tr>
                </table>

                </div>
                <div class="clear"></div>
            </div>
            <!-- // APRESENTAÇÃO - fim // -->

            <!-- \\ SUMÁRIO - início \\ -->
            <div class="anais" id="sumario">
                <div class="Center">                
                <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                <tr >
                    <td valign="top">
                        
                    <div class="AreaTexto">
                    
                    <div class="TituloPainel">Sumário</div>



                    <?php

$numero_nivel = 1;
$numero_area = 1;
$numero_artigo = 1;

$consulta4 = $mysqli->query("
SELECT * FROM artigos
INNER JOIN areas ON artigos.art_fk_area = areas.are_pk
INNER JOIN niveis ON areas.are_fk_nivel = niveis.niv_pk
WHERE art_fk_evento = $eve_cod
ORDER BY niv_pk ASC, are_nome ASC, art_titulo ASC
    ");

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
    <a href="artigo.php?id='.$art_cod.'">'.($numero_nivel-1).'. '.($numero_area-1).'. '.$numero_artigo.'. ' . $dados4["art_titulo"] . '
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
                    ?>

                    
                    </div>

                    </td>
                </tr>
                </table>

                </div>

            
            </div>
            <!-- // SUMÁRIO - fim // -->



        </div>
        <!-- // End Container // -->
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