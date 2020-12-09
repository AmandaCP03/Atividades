<?php
    header("Content-Type: application/json");
    include "conexao.php";

    if(!empty($_GET["estilo"]) && !empty($_GET["dancarino"]) && !empty($_GET["email"]) && !empty($_GET["email"])){

        $estilo = $_GET["estilo"];
        $dancarino = $_GET["dancarino"];
        $email = $_GET["email"];
        $senha = $_GET["senha"];

        $query = "INSERT into dancarino(nome_dancarino, estilo, email, senha) values('$dancarino','$estilo', '$email', '$senha')";
 
        mysqli_query($conexao, $query) or die($query);

        echo json_encode('<br/><center><p> DANÇARINO(S) CADASTRADO(S)! </p></center>');
    }else{
        echo json_encode("<br/><center><p> PREENCHA TODOS OS DADOS! </p></center>");
    }
?>