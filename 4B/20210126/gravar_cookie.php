<?php
    include "const_cookie.php";

    $nome = NOME_COOKIE; //nome do cookie
    $valor = base64_encode($_POST["email"]); //valor do cookie
    $validade = time() + 86400*2; //validade é de 2 dias
    //time() => total de segundos que foram decorridos desde 01 de janeiro de 1970
    $caminho = "/"; //qualquer aplicação do domínio poderá acessar o cookie
    $dominio = "localhost";
    $seguro = false; //se o cookie deve ser transmitido em conexões do tipo HTTPS, por exemplo
    $http = true; //se o cookie deve ser acessado apenas via o protocolo HTTP


    $nome2 = NOME_COOKIE2;
    $valor2 = $_SESSION["tipo"];
    

    $nome3 = NOME_COOKIE3;
    $valor3 = $_SESSION["cpf"];
    

    if(!empty($_POST["lembrete"])) { //se o usuário tiver marcado o checkbox
        //gravar o cookie
        setcookie($nome, $valor, $validade, $caminho, $dominio, $seguro, $http);
        setcookie($nome2, $valor2, $validade, $caminho, $dominio, $seguro, $http);
        setcookie($nome3, $valor3, $validade, $caminho, $dominio, $seguro, $http);
    }else{
        //apagar o cookie
        if(isset($_COOKIE[$nome])) { //se o cookie existir na máquina cliente
            setcookie($nome, "", time()-1, $caminho, $dominio, $seguro, $http);
            setcookie($nome2, "", time()-1, $caminho, $dominio, $seguro, $http);
            setcookie($nome3, "", time()-1, $caminho, $dominio, $seguro, $http);
        }
    }
    
?>