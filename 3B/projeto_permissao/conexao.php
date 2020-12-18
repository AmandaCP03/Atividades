<?php


$host = "localhost";
$db = "escola";
$user = "root";
$senha = "usbw";

$conexao = @mysqli_connect($host,$user,$senha,$db) 
    or die("Erro ao abrir a conexão com o banco de dados.");

mysqli_set_charset($conexao, "utf8");
?>