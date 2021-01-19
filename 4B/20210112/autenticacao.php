<?php
session_start();

    if(!empty($_POST)){
        include "conexao.php";
        $email = $_POST["email_login"];
        $senha = $_POST["senha_login"];
        

        $sql = "SELECT usuario.cpf, usuario.id_perfil, permissao.nivel FROM usuario
        INNER JOIN  permissao ON usuario.id_perfil=permissao.nivel
        WHERE email=? AND senha=?";

        if($stmt = mysqli_prepare($conexao, $sql)) { //retorna um statement ou false

            mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
            //retorna true ou false

            mysqli_stmt_execute($stmt);
            //retorna true ou false

            $resultado = mysqli_stmt_get_result($stmt);
            //retorna um resultset para comandos SELECT ou false
            
            if(mysqli_num_rows($resultado) == 1) {
                $linha = mysqli_fetch_assoc($resultado);
                
                $_SESSION["usuario"]=$linha["cpf"];

                if($linha["id_perfil"] == 1){
                    $_SESSION["tipo"]='aluno';
                }elseif($linha["id_perfil"] == 2){
                    $_SESSION["tipo"]='professor';
                }elseif($linha["id_perfil"] == 3){
                    $_SESSION["tipo"]='administrador';
                }

                $_SESSION["permissao"]=$linha["id_perfil"];
                $_SESSION["email"]=$email;
                header("Location: index.php");
            }else {
                echo'Erro na autenticacao';
            }
            mysqli_stmt_close($stmt);
        }else{
            echo "Houve um erro na preparação da consulta SQL:".mysqli_error($conexao);
        }
        mysqli_close($conexao);
    }else{
        //echo'Erro na autenticação';
        header("Location: index.php");
    }
?>