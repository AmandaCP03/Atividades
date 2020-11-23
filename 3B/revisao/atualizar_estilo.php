<?php

    include "conexao.php";

    $id_estilo = $_POST["id_estilo"];
    $nome_estilo = $_POST["nome_estilo"];

    $update = "UPDATE estilo SET nome_estilo='$nome_estilo' 
                    WHERE id_estilo=$id_estilo";
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>