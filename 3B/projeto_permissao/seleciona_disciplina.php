<?php
/*Este script tem duas funções: 
- retornar a lista de dados atualizada a cada alteração, porque 
dependendo da alteração, altera-se a ordem;
- retornar uma tupla específica solicitada para alteração.*/
header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT id_disciplina, disciplina.nome as disciplina, descricao
                                FROM disciplina ORDER BY disciplina";

if(isset($_GET["id"])){
    $id_disciplina = $_GET["id"];
    $select = "SELECT * FROM disciplina WHERE id_disciplina='$id_disciplina' ORDER BY nome";
}



$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>