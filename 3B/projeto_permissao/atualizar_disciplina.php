<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $id_disciplina = $_POST["id_disciplina"];
    $descricao = $_POST["descricao"];
    


    $update = "UPDATE disciplina SET nome='$nome',
                                descricao='$descricao'                                
                                WHERE
                                id_disciplina='$id_disciplina'";
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>