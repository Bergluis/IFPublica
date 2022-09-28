<?php
    if(isset($_POST['enviar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    } else {
        $email = null;
        $senha = null;
    }
    include "bd_conectar.php";
    $mysqli = Conectar();
    
    $consulta1 = $mysqli->query("
            SELECT * FROM pessoas
            WHERE pes_email LIKE '$email';
            ");

            $quantidade1 = $consulta1->num_rows;
            if ( $quantidade1 == 0 ){    header("Location:index.php"); }

            if($consulta1){
                $dados1 = $consulta1->fetch_array(MYSQLI_ASSOC);
                    $cod_pessoa=$dados1["pes_pk"];
                    $pes_email=$dados1["pes_email"];
                    $pes_senha=$dados1["pes_senha"];
            }else echo($db->error);

        $consulta1 = $mysqli->query("
            SELECT * FROM eventos
            WHERE eve_fk_revisor = $cod_pessoa;
            ");

            $quantidade1 = $consulta1->num_rows;
            if ( $quantidade1 == 0 ){    header("Location:index.php"); } else {
        if($email == $pes_email && $senha == $pes_senha){
            header("Location:TestadorProSite.php?tmpString='$cod_pessoa'");
        } else {
            header("Location:Index.php");
        }
        }
?>