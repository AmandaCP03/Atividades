<?php 
    include "conexao.php";
    include "cabecalho.php";
    $genero = $_POST["genero"];
    $nome_especie = $_POST["nome_especie"];
    $nome_cientifico_especie = $_POST["nome_cientifico_especie"];
    $insert = "INSERT INTO especie(
                                    nome, 
                                    nome_cientifico,
                                    cod_genero
                                ) VALUES (
                                    '$nome_especie',
                                    '$nome_cientifico_especie',
                                    '$genero'
                                )";
    mysqli_query($con, $insert)
     or die(mysqli_error($con));
    echo "Especie inserida com sucesso";
?>