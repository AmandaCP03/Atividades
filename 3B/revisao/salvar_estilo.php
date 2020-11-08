<?php
    header("Content-Type: application/json");
    include "conexao.php";

    if(!empty($_GET["estilo"])){
        $estilo = $_GET["estilo"];
        $query = "INSERT into estilo(nome_estilo) values('$estilo')";
 
            mysqli_query($conexao, $query) or die($query);

            echo json_encode('<br/><center><p> ESTILO CADASTRADO! </p></center>');
    }else{
        echo json_encode("<br/><center><p> INFORME O ESTILO! </p></center>");
    }
?>