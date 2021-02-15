<?php
    session_start();

    if(!empty($_POST)) {
		
		include "conexao.php";
		
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT * FROM assinantes WHERE email=? AND senha=?";
        
        if($stmt = mysqli_prepare($conexao, $sql)) { 

            mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($resultado) == "1") {
                
                $linha = mysqli_fetch_assoc($resultado);
                
                $_SESSION["cpf"] = $linha["cpf"];
                $_SESSION["email"] = $linha["email"];
                $_SESSION["nome"] = $linha["nome"];
                $_SESSION["data_inscricao"] = $linha["data_inscricao"];

                echo "0";
            }
            else {
                echo "1";
            }
            mysqli_stmt_close($stmt);
        }
        else {
            echo '2';
        }
        mysqli_close($conexao);
    }
    else {
        header("location: pagina_inicial.php");
    }
?>