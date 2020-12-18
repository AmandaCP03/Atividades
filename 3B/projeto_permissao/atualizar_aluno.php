<?php

    include "conexao.php";
    session_start();
    
    $prontuario = $_SESSION["usuario"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];
    $sexo = $_POST["sexo"];
    $senha_cadastro = $_POST["senha_cadastro"];

    $update = "UPDATE aluno SET nome='$nome',
                                email='$email',
                                data_nascimento='$data_nascimento',
                                sexo='$sexo' WHERE
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