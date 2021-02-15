<?php

$host = "localhost";
$bd = "jornal";
$usuario = "root";
$senha = "usbw";

	
	$conexao = mysqli_connect($host,$usuario,$senha,$bd);


	if(!$conexao) {
		echo mysqli_connect_errno();
		exit();
	}

	mysqli_set_charset($conexao, "utf8");
?>