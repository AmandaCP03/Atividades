<?php
/*Este script tem duas funções: 
- retornar a lista de dados atualizada a cada alteração, porque 
dependendo da alteração, altera-se a ordem;
- retornar uma tupla específica solicitada para alteração.*/
header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT * FROM estilo";

if(isset($_GET["id"])){
    $id_estilo = $_GET["id"];
    $select .= " WHERE id_estilo='$id_estilo'";
}

$select .= " ORDER BY nome_estilo";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>