<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    $estilo = $_POST["estilo"];
    $select = "SELECT dancarino.nome_dancarino AS nome_dancarino, 
                dancarino.estilo as id_estilo,
                estilo.nome_estilo AS nome_estilo 
                FROM dancarino 
                INNER JOIN estilo ON dancarino.estilo=estilo.id_estilo 
                WHERE dancarino.estilo = $estilo ORDER BY nome_dancarino";

    $resultado = mysqli_query($conexao,$select) or die($select);
    while($linha=mysqli_fetch_assoc($resultado)){
        $tabela[]= $linha;
    }
 
    echo json_encode($tabela);
?>