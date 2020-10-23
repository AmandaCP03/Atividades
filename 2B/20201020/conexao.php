<?php
     $host = "localhost";
     $usuario = "root";
     $senha = "usbw";
     $bd = "musicasplayer";
 
     if(!$conexao = mysqli_connect($host,$usuario,$senha,$bd)){
         echo "Falha na Conexão";
     }
?>