<?php
/*Este script tem duas funções: 
- retornar a lista de dados atualizada a cada alteração, porque 
dependendo da alteração, altera-se a ordem;
- retornar uma tupla específica solicitada para alteração.*/
header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT apresentacao.id_apresentacao AS id_apresentacao,
            apresentacao.dia AS dia, 
            apresentacao.horario as hora,
            dancarino.nome_dancarino AS nome_dancarino,
            dancarino.id_dancarino AS id_dancarino,
            estilo.nome_estilo AS nome_estilo
            FROM apresentacao 
            INNER JOIN dancarino ON dancarino.id_dancarino=apresentacao.dancarino
            INNER JOIN estilo ON estilo.id_estilo=dancarino.estilo";

if(isset($_GET["id"])){
    $id_apresentacao = $_GET["id"];
    $select .= " WHERE id_apresentacao='$id_apresentacao'";
}

$select .= " ORDER BY nome_dancarino";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>