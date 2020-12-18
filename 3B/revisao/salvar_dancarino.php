<?php
    header("Content-Type: application/json");
    include "conexao.php";

    if(!empty($_POST["estilo"])){

        $estilo = $_POST["estilo"];
        $dancarino = $_POST["dancarino"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $query = "INSERT into dancarino(nome_dancarino, estilo, email, senha, permissao) 
        values('$dancarino','$estilo', '$email', '$senha', '2')";
 
        mysqli_query($conexao, $query) or die($query);

        echo json_encode('<br/><center><p> DANÇARINO(S) CADASTRADO(S)! </p></center>');
    }else{
        echo json_encode("<br/><center><p> PREENCHA TODOS OS DADOS! </p></center>");
    }
?>