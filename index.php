<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="utf-8" />
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
                    <img src="img/logo7va.png">
                </div>
               <div id="mobile_sec">
               <div class="mobile"><i class="fa fa-bars"></i><i class="fa fa-times"></i></div>
                <div class="menumobile">
                    <!-- \\ Begin Navigation \\ -->
                    <nav class="Navigation">
                        <ul>
                            <li class="active">                                
                                <a href="#home">Inicio</a>
                                <span class="menu-item-bg"></span>
                            </li>
                        
                            <li>
                                <a href="#publicacoes">Publicações</a>
                                <span class="menu-item-bg"></span>
                            </li>
                            <li>
                                <a href="#login">Login</a>
                                <span class="menu-item-bg"></span>
                            </li>
                            <li>
                                <a href="#busca">Busca</a>
                                <span class="menu-item-bg"></span>
                            </li>
                            <li>
                                <a href="#sobre">Sobre</a>
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
        
        <header2>
            <div class="Center2">
                <br>                <br>
                <align center></align>
                <a href=”https://www.facebook.com/IFPublica-195572467739576/”><img src="img/Face.png"  width= 45px; height= 45px; ></a>
                <br><br><br>
                <a href=””><img src="img/gmail-cone-icon.png"  width= 45px; height= 45px; ></a>
            </div>
        </header2>
        
        
        <!-- // End Header // -->
        <!-- \\ Begin Banner Section \\ -->
        <div class="Banner_sec" id="home">
            <!--  \\ Begin banner Side -->
            <div class="bannerside">
	            <div class="Center">
                    <!--  \\ Begin Left Side -->
                    <div class="leftside">
                        <img src="img/ifsul-va.png">
                    </div>                        								
                    <!--  // End Left Side // -->
                    <!--  \\ Begin Right Side -->

                    <!--  // End Right Side // -->
	            </div>
            </div>
            <!--  // End banner Side // -->
            <div class="clear"></div>
        </div>
        <!-- // End Banner Section // -->
         <div class="bgcolor"></div>
        <!-- \\ Begin Container \\ -->
        <div id="Container">
            <!-- \\ Begin publicacoes Section \\ -->
            <div class="tabela_publicacoes" id="publicacoes">
                <div class="Center">            	
                    <div class="Titulo">Publicações</div>            		
                    <div class="Texto">Clique na imagem para ter acesso aos Anais. Tenha uma ótima e prazeirosa leitura! </div> 
					<br />
                <!-- \\ Inicio da Tabela de publicações \\ -->

              <div class="owl-carousel" id="anais" >


<?php

$retangulo[0] = "darkCyan";
$retangulo[1] = "forestGreen";
$retangulo[2] = "orange";
$retangulo[3] = "yellow";
$retangulo[4] = "dodgerBlue";
$retangulo[5] = "skyBlue";
$retangulo[6] = "zombieGreen";
$retangulo[7] = "violet";
$retangulo[8] = "yellowLight";
$retangulo[9] = "steelGray";

include "bd_conectar.php";
$mysqli = Conectar();

$consulta = $mysqli->query("
SELECT * 
FROM eventos 
ORDER BY eve_data_inicio DESC
");

if($consulta){
    $quantidade = $consulta->num_rows;
        
    $cor = 0;
    while ($registros = $consulta->fetch_array(MYSQLI_ASSOC))
    {
        $eve_cod=$registros["eve_pk"];
        $eve_nome=$registros["eve_nome"];
        $eve_sigla=$registros["eve_sigla"];
        $eve_ano=$registros["eve_data_inicio"];
        $eve_ano = date('Y', strtotime($eve_ano));
        $eve_logo=$registros["eve_logo"];

        echo"
                <div class=\"item $retangulo[$cor]\">
                  <a href=\"anais.php?id=$eve_cod\"><img src=\"eventos/$eve_logo\"></a>
                    <h3>$eve_sigla</h3>
                    <h3>$eve_ano</h3>
                </div>
        ";    
        $cor++;
        if ($cor == 10){ $cor = 0; }
    }

}else echo($db->error);

$consulta->close();

?>                


              </div>

                <!-- // Fim da Tabela de publicações // -->
                </div>
            
            </div>
            </div>
            <div class="sobre" id="login">
            <a name="login"></a>
            <div class="Center">
                    <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                        <tr >
                            <td valign="top">
                                <div class="SubTitulo">
                                Login
                                </div>
                                <div class="Descricao">
                            
                                
                                </div>
                                <div class="Center">
                                <form action="validador.php" method="post">
                                    <input type="text" name="email" placeholder="Email..." style="width: 300px;"/>
                                    <br><br>
                                    <input type="text" name="senha" placeholder="Senha..." style="width: 300px;"/>
                                    <br><br>
                                    <input type="submit" name="enviar" value="Entrar" style="width: 300px;">
                                    <br><br>
                                </form>    
                                </div>
                            </td>
                        </tr>
                    </table>
            </div> 
        </div>
        <form action="ferramenta_busca.php" method="post">
        <div class="sobre" id="busca">
            <a name="busca"></a>
            <div class="Center">
                    <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                        <tr >
                            <td valign="top">
                                <div class="SubTitulo">
                                Ferramenta de busca
                                </div>
                                <div class="Descricao">
                                Selecione o filtro que você deseja aplicar em sua busca por artigos e preencha os campos necessários...
                                <br /><br />
                                </div>
                                <div class="Center">
                                    <script language="javascript">
                                        function HabCampos() {
                                          if (document.getElementById('periodo_sim').checked) {
                                            document.getElementById('campos').style.display = "";
                                            document.getElementById('busca').focus();
                                          }  else {
                                            document.getElementById('campos').style.display = "none";
                                          }}
                                    </script>
                                    <form name="form1" method="post" action="">
                                        <input name="periodo" id="periodo_sim" type="radio" value="sim" onClick="HabCampos()"/>Sim
                                        <input name="periodo" id="periodo_nao" type="radio" value="nao" onClick="HabCampos()"/>N&atilde;o<br/><br/>
                                      <select name="consulta" id="consulta" style="width: 300px;">
                                        <option value="1" id="11" onClick="HabCampos()">Consulta por Título</option>
                                        <option value="2" id="22" onClick="HabCampos()">Consulta por Palavra-chave</option>
                                        <option value="3" id="33" onClick="HabCampos()">Consulta por Título e Palavra-chave</option>
                                        <option value="4" id="44" onClick="HabCampos()">Consulta por Área</option>
                                        <option value="5" id="55" onClick="HabCampos()">Consulta por Data</option>
                                        <option value="6" id="66" onClick="HabCampos()">Consulta por Autor</option>
                                        <option value="7" id="77" onClick="HabCampos()">Consulta por Premiações</option>
                                        <option value="8" id="88" onClick="HabCampos()">Consulta por Autor e Premiações</option>
                                    </select>
                                    <br>
                                    <input type="text" name="busca" placeholder="Informe o parâmetro..." style="width: 300px;"/>
                                    <br>
                                      <label id="campos" style="display:none">
                                      <input type="text" name="busca2" id="busca2" placeholder="Informe o segundo parâmetro..." style="width: 300px;"/>
                                      <br>
                                      </label>
                                    </form>
                                    <input type="submit" name="botao" value="Buscar" style="width: 300px;">
                                    <br><br>
                                </div>
                            </td>
                        </tr>
                    </table>
            </div> 
        </div>
        </form>
            <!-- // End publicacoes Section // -->
        <!-- \\ Begin sobre Section \\ -->
        <div class="sobre" id="sobre">
            <div class="Center">
                <div class="Titulo">Sobre</div>            		
                <div class="Texto">Clique em cada imagem para saber mais sobre esta biblioteca </div> 
                <!-- \\ Begin sobre Site  \\ -->
                <div class="sobreide">
                    <ul>
	                    <li class="Concept"><a href="#oque"><h4>O que é IFPublica?</h4></a></li>
	                    <li class="Development"><a href="#desenvolv"><h4>Quem desenvolveu?</h4></a></li>
    	                <li class="System"><a href="#como"><h4>Como foi desenvolvido?</h4></a></li>
	                    <li class="Desdin"><a href="#contato"><h4>Contato</h4></a></li>
                    </ul>
                </div>
                <!-- // End sobre Site // -->
           
            </div>                
        </div>
            
        <div class="sobre" id="oque">
            <div class="Center">
                    <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                        <tr >
                            <td valign="top">
                                <div class="SubTitulo">
                                O que é IFPublica?
                                </div>
                                <div class="Descricao">
                                A Biblioteca Digital IFPublica é um repositório de artigos publicados pelo Instituto Federal Sul-rio-grandense (IFSul) câmpus Venâncio Aires.
                                <br /><br />
                                A IFPublica tem a finalidade de oferecer acesso democrático a informações presentes em artigos, ampliando as possibilidades de inclusão e desenvolvimento social. Em uma visão mais abrangente e generalizada, a concepção desta biblioteca digital aberta é um exercício de cidadania, já que pressupõe direitos de acesso livre a produções do sistema educacional público.
                                <br /><br />
                                O projeto teve início em março de 2015 com o nome IFCiência, cujo enfoque era manter e divulgar artigos científicos produzidos por diversos câmpus do IFSul. Nessa edição do projeto participaram alunos do quarto ano do curso Técnico de Informática. Foram desenvolvidas as telas de inclusão e pesquisa de artigos. 
                                <br /><br />
                                Em 2016 o projeto foi reformulado. Passou a ser chamado IFPublica, uma vez que passou a armazenar artigos de diversos tipos, não apenas os de caráter científico. Nessa edição participaram alunos do segundo ano do curso Técnico de Informática. Tornou-se restrito a publicações feitas em eventos do Campus Venâncio Aires. Além disso, diversas outras melhorias foram realizadas com o intuito de tornar o sistema mais atraente, versátil e com maior capacidade de expansão.
                                <br /><br />
                                Para 2017 espera-se dar continuidade ao projeto, com a inclusão de novas funcionalidades, tais como métodos de mineração de dados, dentre outros.
                                <br /><br />
                                </div>
                            </td>
                        </tr>
                    </table>
            </div> 
        </div>

        <div class="sobre" id="desenvolv">
            <div class="Center">
                    <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                        <tr >
                            <td valign="top">
                                <div class="SubTitulo">
                                Quem desenvolveu?
                                </div>
                                <div class="Descricao">
                                <strong>Prof. Daniel Pezzi da Cunha</strong> <br />
                                &nbsp;&nbsp; Coordenador e desenvolvedor
                                <br /><br />
                                <strong>Luís Fernando Bergamaschi</strong> <br />
                                &nbsp;&nbsp;Aluno voluntário em 2016
                                <br /><br />
                                <strong>Samuel Matias Finkler</strong> <br />
                                &nbsp;&nbsp;Aluno voluntário em 2016
                                <br /><br />
                                <strong>Gustavo Sebastião Kessler</strong> <br />
                                &nbsp;&nbsp;Aluno bolsista em 2015
                                <br /><br />
                                <strong>Cassiano Ferreira Colares</strong> <br />
                                &nbsp;&nbsp;Aluno voluntário em 2015
                                <br /><br />
                                </div>
                            </td>
                        </tr>
                    </table>
            </div> 
        </div>
            
        <div class="sobre" id="como">
            <div class="Center">
                    <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                        <tr >
                            <td valign="top">
                                <div class="SubTitulo">
                                Como foi desenvolvido?
                                </div>
                                <div class="Descricao">
                                <strong>Metodologia de desenvolvimento aplicada em 2016:</strong><br />
                                Etapa 1 – Ampliação da base de dados: <br />
                                     &nbsp;&nbsp; - Migração do Banco de Dados MySQL para MariaDB; <br />
                                     &nbsp;&nbsp; - Correções de inconsistências e das falhas de integridade referencial.<br />
                                Etapa 2 – Modernização do layout: <br />
                                     &nbsp;&nbsp; - Efeitos visuais dinâmicos; <br />
                                     &nbsp;&nbsp; - Aplicação de Design Responsivo.<br /> 
                                Etapa 3 – Aprimoramento da busca: <br />
                                     &nbsp;&nbsp; - Reformulação do mecanismo de busca por artigos de forma a torná-lo repleto de recursos para facilitar a localização de informações aos usuários.<br /> 
                                Etapa 4 – Testes: <br />
                                     &nbsp;&nbsp; - Aplicação de baterias de testes funcionais e de desempenho. <br />
                                Etapa 5 – Implantação: <br />
                                     &nbsp;&nbsp; - Inclusão dos Anais da Movaci 2014, 2015 e 2016; <br />
                                     &nbsp;&nbsp; - Divulgação da biblioteca entre os servidores.  <br /><br /> 
                                <strong>Recursos utilizados na programação do sistema:</strong><br />
                                Linguagens:<br />
                                &nbsp;&nbsp; - Hypertext Preprocessor (PHP)  <br />
                                &nbsp;&nbsp; - HyperText Markup Language (HTML)  <br /> 
                                &nbsp;&nbsp; - Cascading Style Sheets (CSS)   <br /> 
                                &nbsp;&nbsp; - JavaScript (JS)    <br />
                                &nbsp;&nbsp; - Structured Query Language (SQL)    <br /><br />
                                Banco de Dados:<br />
                                &nbsp;&nbsp; - MariaDB 5.5  <br />
                                &nbsp;&nbsp; - MySQL Workbench 6.3CE  <br />
                                &nbsp;&nbsp; - HeidiSQL 9.2 portable <br /><br />
                                Editores:<br />
                                &nbsp;&nbsp; - Brackets 1.7  <br />
                                &nbsp;&nbsp; - Sublime Text  <br />
                                &nbsp;&nbsp; - Adobe Photoshop CS5  <br /><br />
                                <br /><br />
                                </div>
                            </td>
                        </tr>
                    </table>
            </div> 
        </div>
            
        <div class="sobre" id="contato">
            <div class="Center">
                    <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%;" >
                        <tr >
                            <td valign="top">
                                <div class="SubTitulo">
                                Contato
                                </div>
                                <div class="Descricao">
                                    <strong>IFSul Câmpus Venâncio Aires</strong><br />
                                    Avenida das Indústrias, 1865<br />
                                    Bairro Universitário<br />
                                    Venâncio Aires/RS<br />
                                    CEP 95800-000<br />
                                    Telefone (51) 3793-4200<br />
                                    Site <a href="http://www.venancio.ifsul.edu.br/portal/">http://www.venancio.ifsul.edu.br/portal/</a> <br />
                                <br /><br />
                                </div>
                            </td>
                        </tr>
                    </table>
            </div> 
        </div>
            
        <!-- // End sobre Section // -->
            
        </div>
        <!-- // End Container // -->
	</div>
	<!-- // End Layout Frame // -->

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