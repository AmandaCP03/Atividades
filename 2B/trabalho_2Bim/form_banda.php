<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Cadastro - Banda </title>
    </head>
    <body>
    <?php
        include "menu.php";
        include "conexao.php";
        $selectGenero = "SELECT nome_genero, id_genero FROM genero";

        $resultadoGenero = mysqli_query($conexao,$selectGenero);

        if(empty($_POST)){
            echo'
                <form method = "POST" name="cadastro_banda">
                    <select name = "genero">
                        <option value =""> ::SELECIONE UM GENERO::</option>
                ';
                while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                    echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                }
            echo'
            </select>
                <input type="text" name="nome_banda" placeholder = "Nome Banda..."/>
                <input type="submit" value="Cadastrar"/>
            </form>
            ';
        }else{

            $banda = $_POST["nome_banda"];
            $genero = $_POST["genero"];

            $query = "INSERT into banda(nome_banda, cod_genero) values('$banda','$genero')";

            mysqli_query($conexao, $query) or die($query);

            echo'<p> BANDA CADASTRADA! </p>';
        }
    ?>       
    </body>
</html>