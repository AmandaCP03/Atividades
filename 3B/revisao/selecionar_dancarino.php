<?php
/*Este script tem duas funções: 
- retornar a lista de dados atualizada a cada alteração, porque 
dependendo da alteração, altera-se a ordem;
- retornar uma tupla específica solicitada para alteração.*/
session_start();
header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT dancarino.id_dancarino AS id_dancarino, 
                dancarino.nome_dancarino AS nome_dancarino, 
                dancarino.estilo as id_estilo,
                dancarino.email as email,
                estilo.nome_estilo AS nome_estilo 
                FROM dancarino 
                INNER JOIN estilo ON dancarino.estilo=estilo.id_estilo";

if(isset($_GET["id"])){
    $id_dancarino = $_GET["id"];
    $select .= " WHERE id_dancarino='$id_dancarino'";
}
if($_SESSION["permissao"]=='2'){
    $select .= " AND id_dancarino='".$_SESSION["usuario"]."'";
}

$select .= " ORDER BY nome_dancarino";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>