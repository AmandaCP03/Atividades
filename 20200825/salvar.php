<?php
    if(empty($_GET["nome_pag"])){
        echo "Preencha o nome do arquivo.";
    }else{
        file_put_contents("criacoes/".$_GET["nome_pag"].".html", $_GET["conteudo_pag"]);
        echo "Arquivo criado com sucesso.";
    }
?>