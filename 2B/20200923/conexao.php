<?php
    $host="localhost";
    $user="root";
    $password="usbw";
    $bd="taxonomia";
    $con=mysqli_connect($host, $user, $password, $bd);
    if(!$con){
        echo "Erro ao conectar";
    }
?>