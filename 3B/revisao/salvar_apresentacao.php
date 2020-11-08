<?php
    header("Content-Type: application/json");
    include "conexao.php";

    if(!empty($_GET["dancarino"]) && !empty($_GET["dia"]) && !empty($_GET["hora"])){

        $dancarino = $_GET["dancarino"];
        $dia = $_GET["dia"];
        $hora = $_GET["hora"];

        $query = "INSERT into apresentacao(dancarino, dia, horario) values('$dancarino','$dia','$hora')";
 
        mysqli_query($conexao, $query) or die($query);

        echo json_encode('<br/><center><p> APRESENTAÇÃO CADASTRADA! </p></center>');
    }else{
        echo json_encode("<br/><center><p> PREENCHA AS INFORMAÇÕES! </p></center>");
    }
?>