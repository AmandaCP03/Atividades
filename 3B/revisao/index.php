<?php
include "conf.php";


cabecalho();
include "modal_login.php";

if(!isset($_SESSION["usuario"])){
echo "<div><h6 class='display-4'>Bem vindo ao site <b>Dançarte - Apresentações!</b></h6></div>";
}else{
    echo '<div><h6 class="display-4">Bem vindo, <b>'.$_SESSION['nome_dancarino'].'!</b></h6></div>';
}

rodape();

?>