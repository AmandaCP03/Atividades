<?php

    include "conexao.php";

    $id_dancarino = $_POST["id_dancarino"];
    $nome_dancarino = $_POST["nome_dancarino"];
    $estilo = $_POST["id_estilo"];
    $email = $_POST["email"];

    $update = "UPDATE dancarino SET 
                    nome_dancarino='$nome_dancarino',
                    estilo=$estilo,
                    email='$email',
                    WHERE id_dancarino=$id_dancarino";

    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>