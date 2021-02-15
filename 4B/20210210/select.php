<?php 
    include "conexao.php";

    $cpf = $_POST["cpf"];
    $email = $_POST["email"];

    $sql = "SELECT cpf FROM assinantes WHERE cpf=? OR email=?";
        
    if($stmt = mysqli_prepare($conexao, $sql)) { 

        mysqli_stmt_bind_param($stmt, "ss", $cpf, $email);

        mysqli_stmt_execute($stmt);
        //retorna true ou false

        $resultado = mysqli_stmt_get_result($stmt);
        //retorna um resultset para comandos SELECT ou false
        
        if(mysqli_num_rows($resultado) == 1) {
            
            $linha = mysqli_fetch_assoc($resultado);
            if($cpf==$linha["cpf"]){
                echo "0";
            }
            else{
                echo "1";
            }
        }
        else{
            echo "2";
        }
    }
?>