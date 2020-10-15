<?php 
    include "conexao.php";
    include "cabecalho.php";
    $nome_familia = $_POST["nome_familia"];
    $nome_cientifico = $_POST["nome_cientifico"];
    $insert = "INSERT INTO familia(
                                    nome, 
                                    nome_cientifico
                                ) VALUES (
                                    '$nome_familia',
                                    '$nome_cientifico'
                                )";
    mysqli_query($con, $insert)
     or die(mysqli_error($con));
    echo "Familia inserida com sucesso";
?>