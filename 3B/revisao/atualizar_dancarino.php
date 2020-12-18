<?php
    session_start();
    include "conexao.php";

    $id_dancarino = $_SESSION["usuario"];
    $nome_dancarino = $_POST["nome_dancarino"];
    $estilo = $_POST["id_estilo"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $update = "UPDATE dancarino SET 
                    nome_dancarino='$nome_dancarino',
                    estilo=$estilo,
                    email='$email'";
    if($senha!=""){
        $update.= "             , senha='$senha'";
    }
    
    $update .=" WHERE id_dancarino='$id_dancarino'";

    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>