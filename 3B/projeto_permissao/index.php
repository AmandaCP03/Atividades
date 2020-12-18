<?php

include "conf.php";

cabecalho();

if(isset($_SESSION["email"])){
    echo "<div>Olá, ".$_SESSION["email"].".</div>";
}

echo "<div>Bem vindo ao sistema escolar.</div>";

rodape();

?>