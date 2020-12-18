<?php

include "conf.php";


$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$cod_professor = $_POST["cod_professor"];

$insert = "INSERT INTO disciplina VALUES (NULL, '$nome','$descricao','$cod_professor')";

mysqli_query($conexao,$insert)
    or die("erro: ". mysqli_error($conexao));    

cabecalho();

echo "Disciplina inserida com sucesso.";

rodape();

?>