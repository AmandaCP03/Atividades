<?php
    session_start();
    session_destroy();
    header("Location:lista_frutas.php");
?>