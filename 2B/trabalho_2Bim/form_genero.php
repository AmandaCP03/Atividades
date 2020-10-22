<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Cadastro - Genero </title>
    </head>
    <body>
    <?php
        include "menu.php";

        if(empty($_POST)){
            echo'
            <form method = "POST" name="form_genero">
                <input type="text" name="genero" placeholder = "Nome Genero..."/>
                <input type="submit" value="Cadastrar"/>
            </form>
            ';
        }else{
            include "conexao.php";

            $genero = $_POST["genero"];

            $query = "INSERT into genero(nome_genero) values('$genero')";

            mysqli_query($conexao, $query) or die($query);

            echo'<p> GENERO CADASTRADO! </p>';
        }
    ?>       
    </body>
</html>