<?php
    $host="localhost";
    $usuario="root";
    $senha="usbw";
    $bd="danca";
    if(!$conexao = mysqli_connect($host,$usuario,$senha,$bd)){
        echo "Falha na Conexão";
    }
?>