<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    // Select pra verificar nas bandas

    $select="SELECT nome_banda, id_banda FROM banda  
    
            WHERE cod_genero = '".$_POST['id']."' ORDER BY nome_banda";
    
    $res = mysqli_query($conexao, $select);
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>