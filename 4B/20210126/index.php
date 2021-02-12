<?php

	session_start();
	include "const_cookie.php";
	include "conteudo.php";
	
	if(isset($_SESSION["cpf"])){
		$titulo = "Entrada";
		$conteudos = array();
		$conteudos[0] = "<p>Olá, ".$_SESSION['email'].".</p>";
		$conteudos[1] = "<p>Seu tipo é ".$_SESSION['tipo'].".</p>";
		$conteudos[2] = "<p>Seja bem vindo ao sistema</p>";
		$conteudos[3] = "<table border='1px solid black'>";
		$conteudos[4] = "<tr>";
		$conteudos[5] = "<th> Nome </th>";
		$conteudos[6] = "<th> Valor </th>";
		$conteudos[7] = "<th> Apagar </th>";
		$conteudos[8] = "</tr>";
		if(isset($_COOKIE[NOME_COOKIE])){
			$conteudos[9] = "<tr id='a1'>";
			$conteudos[10] = "<td> E-mail </td>";
			$conteudos[11] = "<td> ".base64_decode($_COOKIE[NOME_COOKIE])." </td>";
			$conteudos[12] = "<td> <input type='checkbox' name='apagar1' id='apagar1'/> </td>";
			$conteudos[13] = "</tr>";
		}	
		if(isset($_COOKIE[NOME_COOKIE2])){
			$conteudos[14] = "<tr id='a2'>";
			$conteudos[15] = "<td> Tipo </td>";
			$conteudos[16] = "<td> ".$_COOKIE[NOME_COOKIE2]." </td>";
			$conteudos[17] = "<td> <input type='checkbox' name='apagar2' id='apagar2'/> </td>";
			$conteudos[18] = "</tr>";
		}if(isset($_COOKIE[NOME_COOKIE3])){
			$conteudos[19] = "<tr id='a3'>";
			$conteudos[20] = "<td> CPF </td>";
			$conteudos[21] = "<td> ".$_COOKIE[NOME_COOKIE3]." </td>";
			$conteudos[22] = "<td> <input type='checkbox' name='apagar2' id='apagar3'/> </td>";
			$conteudos[23] = "</tr>";
		}
		if((!isset($_COOKIE[NOME_COOKIE]) && !isset($_COOKIE[NOME_COOKIE2])) && !isset($_COOKIE[NOME_COOKIE3])){
			$conteudos[9] = "<tr>";
			$conteudos[10] = "<td colspan='3'> Nenhum cookie </td>";
			$conteudos[11] = "</tr>";
		}
		$conteudos[24] = "</table>";
		$conteudos[25] = "<p><a href='logout.php'>Sair</a></p>";
		exibir($titulo, $conteudos);
	}
	else {
		//session_destroy();
		header("location: form_login.php");
	}
?>