<?php
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Cadastro - Playlist </title>

        <script src="../../../jquery-3.5.1.min.js"></script>
        <script>
        
        </script>
    </head>
    <body>
    <?php
        include "menu.php";
        include "conexao.php";
        $selectMusica = "SELECT musica.id_musica AS id_musica, 
                        musica.nome_musica AS nome_musica, 
                        genero.nome_genero as nome_genero,
                        banda.nome_banda AS nome_banda 
                        FROM musica 
                        INNER JOIN genero ON genero.id_genero=musica.cod_genero 
                        INNER JOIN banda ON banda.id_banda=musica.cod_banda 
                        ORDER BY nome_musica";

        $resultadoMusica = mysqli_query($conexao,$selectMusica);

        if(empty($_POST)){
            echo'
                <form action="form_playlist.php" method = "POST" name="cadastro_playlist" >
                    <input type="text" name="nome_playlist" placeholder = "Nome Playlist..."/><br/><br/>
                ';
                while($linhaMusica = mysqli_fetch_assoc($resultadoMusica)){
                    echo '<input type="checkbox" name="musica[]" value='.$linhaMusica["id_musica"].'> <b>'.$linhaMusica["nome_musica"].' - </b>'.$linhaMusica["nome_banda"].' ('.$linhaMusica["nome_genero"].')<br/><br/>';
                }
            echo'
            <button> Cadastrar </button>
            </form>            
            ';
        }else{
            $playlist = $_POST["nome_playlist"];
            $musicas = $_POST["musica"];

            $query = "INSERT into playlist(nome_playlist) values('$playlist')";

            mysqli_query($conexao, $query) or die($query);

            /////////////
            $insertID = mysqli_insert_id($conexao);

            foreach($musicas as $e){
                $query2 = "INSERT into musica_playlist(cod_musica, cod_playlist) values('$e', '$insertID')";
            
                mysqli_query($conexao, $query2) or die($query2);
            }

            echo'<p> PLAYLIST CADASTRADA! </p>';
        }
    ?>       
    </body>
</html>