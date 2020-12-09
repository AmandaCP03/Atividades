<?php
session_start();

    if(!empty($_POST)){
        include "conexao.php";
        $email = $_POST["email_login"];
        $senha = $_POST["senha_login"];

        $sql = "SELECT id_dancarino FROM dancarino
                    WHERE email='$email' AND senha='$senha'";

        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        if(mysqli_num_rows($resultado)=="1"){
            $linha = mysqli_fetch_assoc($resultado);
            $_SESSION["usuario"]=$linha["id_dancarino"];
            header("Location: index.php");
        }else{
            header("Location: index.php?erro=1");
        }
    }else{
        header("Location: index.php?erro=1");
    }
?>