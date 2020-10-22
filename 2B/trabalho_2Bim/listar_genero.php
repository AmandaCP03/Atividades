<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Lista - Genero </title>
    </head>
    <body>
        <?php  include "menu.php";?>
        <h4 > FILTRAR POR: </h3> 
        <form method = "POST" name="filtro">
            <input type="text" name="nome_genero" placeholder = "Nome genero..."/>
            <input type="submit" value="Filtrar"/>
        </form>
        <br/> 

    <?php

        include "conexao.php";

        $select = "SELECT * FROM genero ";

        if(!empty($_POST)){
            $select .= " WHERE (1=1) ";
        
            if($_POST["nome_genero"]!=""){
                $nome_genero = $_POST["nome_genero"];

                $select .= " AND nome_genero like '%$nome_genero%'";
            }
        }

        $resultado = mysqli_query($conexao,$select);

        echo '<ul>';

        while($linha = mysqli_fetch_assoc($resultado)){
            echo '<li>'.$linha["nome_genero"].'</li>';
        }

        echo "</ul>";
    ?>       
    </body>
</html>