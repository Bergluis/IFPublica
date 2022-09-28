<!DOCTYPE html>
<html>
<?php
    include "bd_conectar.php";
    $mysqli = Conectar();
    
    if(isset($_POST['salvar'])){
        $codigo = $_POST['codResumo'];
        $titulo = $_POST['tituloPronto'];
        $palavras = $_POST['palavraPronto'];
        $resumo = $_POST['resumoPronto'];
        $array = explode(';', $palavras);
        $palavra1 = $array[0];
        $palavra2 = $array[1];
        $palavra3 = $array[2];
               
        $x = $mysqli->query("
            UPDATE artigos
            SET art_titulo = '$titulo', art_palavra1 = '$palavra1', art_palavra2 = '$palavra2', art_palavra3 = '$palavra3', art_resumo = '$resumo', art_conferido = 1
            WHERE art_pk = $codigo;
            ");
        header("Location:Index.php");
    } else if(isset($_POST['cancelar'])){
        header("Location:Index.php");
    }
?>
</html>