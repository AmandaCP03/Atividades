<?php

include "conf.php";


include "gera_novo_prontuario.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$data_nascimento = $_POST["data_nascimento"];
$sexo = $_POST["sexo"];
$senha = $_POST["senha_cadastro"];

$insert = "INSERT INTO aluno VALUES ('$prontuario','$nome','$email','$data_nascimento','$sexo')";



mysqli_query($conexao,$insert)
    or die("erro: ". mysqli_error($conexao));
    //or die("Erro ao inserir aluno.");

$insert = "INSERT INTO usuario VALUES ('$prontuario','$email','$senha','3')";
mysqli_query($conexao,$insert)
    or die("erro: ". mysqli_error($conexao));

cabecalho();

echo "Aluno inserido com sucesso.";

rodape();

?>