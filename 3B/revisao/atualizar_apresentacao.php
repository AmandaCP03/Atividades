<?php

    include "conexao.php";

    $id_apresentacao = $_POST["id_apresentacao"];
    $dancarino = $_POST["dancarino"];
    $dia = $_POST["dia"];
    $horario = $_POST["horario"];

    $update = "UPDATE apresentacao SET 
                    dancarino=$dancarino,
                    dia='$dia',
                    horario='$horario'
                    WHERE id_apresentacao=$id_apresentacao";

    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>