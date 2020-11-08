<?php
    header("Content-Type: application/json");
    include "conexao.php";

    if(!empty($_GET["estilo"]) && !empty($_GET["dancarino"])){

        $estilo = $_GET["estilo"];
        $dancarino = $_GET["dancarino"];

        $query = "INSERT into dancarino(nome_dancarino, estilo) values('$dancarino','$estilo')";
 
        mysqli_query($conexao, $query) or die($query);

        echo json_encode('<br/><center><p> DANÇARINO(S) CADASTRADO(S)! </p></center>');
    }else{
        echo json_encode("<br/><center><p> PREENCHA TODOS OS DADOS! </p></center>");
    }
?>