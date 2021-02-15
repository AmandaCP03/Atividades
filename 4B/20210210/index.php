<?php

	session_start();

	
	if(isset($_SESSION["cpf"])){
        include "head.php";
        echo'<html lang="pt-BR">
            <head>
                <title>Pagina</title>
            </head>
            <body>';
            include "cabecalho2.php";
                echo '<input type="text" id="sessao" value="pagina_errada "  hidden>
                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center" style="margin-top: 1%;">
                    <h1 class="display-4">Bem vindo!!</h1>
                </div>
                <center>
                <div class="row container"> 
                    <div class="col">
                        <img src="img/perfil.png" alt="Avatar" class="avatar" />

                    </div> 
                    <div class="linha"></div>
                    <div class="col">
                        <ul style="list-style: none;">
                            <li><b>CPF:</b>&nbsp'.$_SESSION["cpf"].'</li>
                            <li><b>Nome:</b>&nbsp'.$_SESSION["nome"].'</li>
                            <li><b>Email:</b>&nbsp'.$_SESSION["email"].'</li>
                            <li><b>Data Inscrição:</b>&nbsp'.$_SESSION["data_inscricao"].'</li>
                        </ul>
                    </div>
                </div>
                </center>';
                   include "rodape.html";
            echo'</body>
        </html> ';  
		
	}
	else {
		header("location: pagina_inicial.php");
	}
?>