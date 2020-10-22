<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Cadastro - Música </title>

        <script src="../../../jquery-3.5.1.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#genero").change(function(){
                    //PHP pra buscar
                    var id = $("#genero").val();
                    $.post("seleciona_banda.php", {"id":id}, function(msg){
                        option="<option label='::SELECIONE UMA BANDA::' />";  
                        console.log("Foi");     
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

        if(empty($_POST)){
            echo'
                <form action="form_musica.php" method = "POST" name="cadastro_musica" >
                    <input type="text" name="nome_musica" placeholder = "Nome Música..."/><br/><br/>
                    <select name = "genero" id="genero">
                        <option label="::SELECIONE UM GENERO::"> </option>
                ';
                while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                    echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                }
            echo'
            </select><br/><br/>

            <select name="banda" id="banda">
                <option label="::SELECIONE UMA BANDA::"> </option>
            </select><br/><br/>

            <textarea name="codigo_musica"> </textarea><br/><br/>

            <input type="submit" value="Cadastrar"/>
            
            </form>            
            ';
        }else{

            $musica = $_POST["nome_musica"];
            $codigo = $_POST["codigo_musica"];
            $genero = $_POST["genero"];
            $banda = $_POST["banda"];



            $query = "INSERT into musica(nome_musica, cod_musica, cod_genero, cod_banda) values('$musica','$codigo','$genero','$banda')";

            mysqli_query($conexao, $query) or die($query);

            echo'<p> MÚSICA CADASTRADA! </p>';
        }
    ?>       
    </body>
</html>