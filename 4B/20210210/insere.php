
<?php 
    include "conexao.php";

    $cpf= $_POST["cpf"];
    $nome_usuario = $_POST["nome"];
    $email = $_POST["email"];
    $senha= $_POST["senha_cod"];
    $data= $_POST["data"];

    $query = "INSERT into assinantes(cpf,nome,email,data_inscricao,senha) values('$cpf','$nome_usuario','$email','$data','$senha')";

    mysqli_query($conexao, $query) or die($query);

    
    echo '<script>location.href="pagina_inicial.php?entrar=1"</script>';
     
    
?>