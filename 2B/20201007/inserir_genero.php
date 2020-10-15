<?php 
    include "conexao.php";
    include "cabecalho.php";
    $genero = $_POST["genero"];
    $familia = $_POST["familia"];
    $insert = "INSERT INTO genero(
                                    nome_cientifico, 
                                    cod_familia
                                ) VALUES (
                                    '$genero',
                                    '$familia'
                                )";
    mysqli_query($con, $insert)
     or die(mysqli_error($con));
    echo "Genero inserido com sucesso";
?>