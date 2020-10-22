<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Lista - Genero </title>
    </head>
    <body>
        <?php  
            include "menu.php";
            include "conexao.php";
            $selectGenero = "SELECT nome_genero FROM Genero";

            $resultadoGenero = mysqli_query($conexao,$selectGenero);
        ?>
        <form method = "POST" name="filtro">
            <select name = "genero">
                <option value =""> ::SELECIONE O GENERO DA BANDA::</option>
                <?php
                    while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                        echo '<option value='.$linhaGenero["nome_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                    }
                ?>
            </select>
            <br/><br/>
            <input type="text" name="nome_banda" placeholder =  "Nome Banda..."/>
            <input type="submit" value="Pesquisar"/>
        </form>
        <br/> 
        <?php
            $select = "SELECT banda.nome_banda, genero.nome_genero  FROM banda INNER JOIN genero ON banda.cod_genero = genero.id_genero";
            
            if(!empty($_POST)){
                $select .= " WHERE (1=1) ";
            
                if($_POST["genero"]!=""){
                    $nome_genero = $_POST["genero"];

                    $select .= " AND genero.nome_genero like '%$nome_genero%'";
                }

                if($_POST["nome_banda"]!=""){
                    $banda = $_POST["nome_banda"];

                    $select .= " AND banda.nome_banda like '%$banda%'";
                }
            }

            $resultado = mysqli_query($conexao,$select);

            echo '<ul>';

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<li>'.$linha["nome_banda"].'(<b>'.$linha["nome_genero"].'</b>)</li>';
            }

            echo "</ul>";
        ?>
    </body>
</html>