<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    // Select pra verificar nas familias
    // Precisamos do nome da familia do nome cientifico selecionado

    $select="SELECT nome_cientifico, id_genero FROM genero  
    
    WHERE cod_familia = '".$_POST['id']."' ORDER BY nome_cientifico";

    $res = mysqli_query($con, $select);
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>