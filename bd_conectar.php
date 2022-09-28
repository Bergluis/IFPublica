<?php

// Testa o MySQL
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if (version_compare(phpversion(), "4", ">")) {
    if (!extension_loaded('mysqli')) {
        echo( "Nao esta habilitada a dll Mysqli" );
        exit;
    }
}

function Conectar(){

define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("SENHA", "");
define("BANCO", "ifpublica2016");

$mysqli = new mysqli(SERVIDOR, USUARIO, SENHA, BANCO);
//@mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO);

// Identificação dos erros MySQL
$erros[2005] = "Esse servidor nao existe";
$erros[2003] = "Servidor Mysql desligado";
$erros[1045] = "Usuario ou senha invalido";
$erros[1049] = "Banco de dados nao encontrado";
$erros[1146] = "Erro de sql a tabela nao existe";
$erros[1062] = "Erro campo unico na tabela, nao pode cadastrar pois ele ja existe";

if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
} 

return $mysqli;
}

?> 