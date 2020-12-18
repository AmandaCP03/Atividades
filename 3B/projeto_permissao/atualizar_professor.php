<?php

    include "conexao.php";

    $prontuario = $_POST["prontuario"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $formacao = $_POST["formacao"];
    $senha_cadastro = $_POST["senha_cadastro"];

    $update = "UPDATE professor SET nome='$nome',
                                email='$email',
                                formacao='$formacao'
                                WHERE
                                prontuario='$prontuario'";
    
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));


       $update = "UPDATE usuario SET email='$email' ";

        if($senha_cadastro!=""){
            $update.= "             , senha='$senha_cadastro'";
        }
    
        $update .=" WHERE
                        id_usuario='$prontuario'";
    
            mysqli_query($conexao,$update)
                or die(mysqli_error($conexao).$update);
    
    
    

    echo "1";

?>