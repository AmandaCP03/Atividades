<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Lista - Música </title>

        
        <script src="../../../jquery-3.5.1.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#genero").change(function(){
                    //PHP pra buscar
                    var id = $("#genero").val();
                    $.post("seleciona_banda.php", {"id":id}, function(msg){
                        option="<option label='::SELECIONE UMA BANDA::' />";  
                        $.each(msg, function(indice, valor){
                            option+="<option value='"+valor.id_banda+"'> "+valor.nome_banda+" </option>";
                        });
                        $("#banda").html(option);
                    });
                });
            });
        </script>
        
    </head>
    <body>
        <?php  
            include "menu.php";
            include "conexao.php";
            $selectGenero = "SELECT nome_genero, id_genero FROM genero";

            $resultadoGenero = mysqli_query($conexao,$selectGenero);
        ?>
        <form action="listar_musica.php" method = "POST" name="filtro">
            <select name = "genero" id="genero">
                <option value =""> ::GENERO DA MÚSICA::</option>
                <?php
                    while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                        echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                    }
                ?>
            </select>
            <select name="banda" id="banda">
                <option value =""> ::BANDA DA MÚSICA:: </option>
            </select>
            <br/><br/>
            <input type="text" name="nome_musica" placeholder =  "Filtrar músicas..."/>
            <input type="submit" value="Filtrar"/>
        </form>
        <br/> 
        <?php
            $select = "SELECT musica.nome_musica AS nome_musica, 
                        genero.nome_genero as nome_genero,
                        banda.nome_banda AS nome_banda 
                        FROM musica 
                        INNER JOIN genero ON genero.id_genero=musica.cod_genero 
                        INNER JOIN banda ON banda.id_banda=musica.cod_banda";
            
            if(!empty($_POST)){
                $select .= " WHERE (1=1) ";
            
                if($_POST["genero"]!=""){
                    $nome_genero = $_POST["genero"];

                    $select .= " AND genero.id_genero like '%$nome_genero%'";
                }

                if($_POST["banda"]!=""){
                    $banda = $_POST["banda"];

                    $select .= " AND banda.id_banda like '%$banda%'";
                }

                if($_POST["nome_musica"]!=""){
                    $musica = $_POST["nome_musica"];

                    $select .= " AND musica.nome_musica like '%$musica%'";
                }
            }
            $select .= " ORDER BY nome_musica";

            $resultado = mysqli_query($conexao,$select);

            echo '<ul>';

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<li>::'.$linha["nome_musica"].'::'.$linha["nome_banda"].'(<b>'.$linha["nome_genero"].'</b>)</li>';
            }

            echo "</ul>";
        ?>
    </body>
</html>