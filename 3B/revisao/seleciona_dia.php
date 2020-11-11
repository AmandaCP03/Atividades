<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    $data = $_POST["dia"];
    $select = "SELECT apresentacao.id_apresentacao AS id_apresentacao,
                apresentacao.dia AS dia, 
                apresentacao.horario as hora,
                dancarino.nome_dancarino AS nome_dancarino,
                estilo.nome_estilo AS nome_estilo
                FROM apresentacao 
                INNER JOIN dancarino ON dancarino.id_dancarino=apresentacao.dancarino
                INNER JOIN estilo ON estilo.id_estilo=dancarino.estilo 
                WHERE apresentacao.dia = '$data' ORDER BY dia";

    $resultado = mysqli_query($conexao,$select) or die($select);
    while($linha=mysqli_fetch_assoc($resultado)){
        $tabela[]= $linha;
    }
 
    echo json_encode($tabela);
?>