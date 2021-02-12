<?php

$validade = time() + 86400*2; //validade é de 2 dias
//time() => total de segundos que foram decorridos desde 01 de janeiro de 1970
$caminho = "/"; //qualquer aplicação do domínio poderá acessar o cookie
$dominio = "localhost";
$seguro = false; //se o cookie deve ser transmitido em conexões do tipo HTTPS, por exemplo
$http = true; //se o cookie deve ser acessado apenas via o protocolo HTTP

    $apagar=$_POST["apagar"];
    
    setcookie( $apagar, "", time()-1, $caminho, $dominio, $seguro, $http); 

    echo "";

?>