<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Lista - Playlist </title>
        <script src="../../../jquery-3.5.1.min.js"></script>   
        <script>
             $(document).ready(function(){
                 $("#playlist").change(function(){
                    
                    var id = $("#playlist").val();
                    if(id != ''){
                        $.post("seleciona_playlist.php", {"id":id}, function(msg){
                            $.each(msg, function(indice, valor){
                                if(indice == 0){
                                    texto= '<h3>'+valor.nome_playlist+'</h3>';
                                }
                                texto+='<div> <b>Música:</b>'+valor.nome_musica+' ('+valor.nome_banda+') <br/> ';
                                texto+='<b>Gênero:</b>'+valor.nome_genero+'<br/>';
                                texto+='<iframe width="220" height="150" src="https://www.youtube.com/embed/'+valor.codigo_musica+'"';
                                texto+=' frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div> <hr/> ';
                                    
                            });
                            $("#mostrar").html(texto);
                        });
                    }else{
                        document.location.reload(true);
                    }
                //window.location.href = "listar_playlist.php";
                });
            });
        </script>     
    </head>
    <body>
        <?php  
            include "menu.php";
            include "conexao.php";
            $selectPlaylist= "SELECT playlist.nome_playlist, playlist.id_playlist FROM playlist";

            $resultadoPlaylist = mysqli_query($conexao,$selectPlaylist);

        ?>
        <form action="listar_playlist.php" method = "POST" name="filtro">
            <select name = "playlist" id="playlist">
                <option value =""> ::Filtar Playlist::</option>
                <option value =""> TODAS </option>
                <?php
                    while($linhaPlaylist = mysqli_fetch_assoc($resultadoPlaylist)){
                        echo '<option value='.$linhaPlaylist["id_playlist"].'> '.$linhaPlaylist["nome_playlist"].'</option>';
                    }
                ?>
            </select>
        </form>
        <br/> 
        <hr/>
        <?php

            $select = "SELECT musica_playlist.cod_musica AS cod_musica, 
            musica_playlist.cod_playlist AS cod_playlist, 
            musica.nome_musica as nome_musica,
            musica.cod_musica AS codigo_musica, 
            playlist.nome_playlist AS nome_playlist,
            banda.nome_banda AS nome_banda,
            genero.nome_genero AS nome_genero
            FROM musica_playlist 
            INNER JOIN musica ON musica.id_musica=musica_playlist.cod_musica 
            INNER JOIN playlist ON playlist.id_playlist=musica_playlist.cod_playlist 
            INNER JOIN banda ON banda.id_banda=musica.cod_banda 
                AND musica_playlist.cod_musica=musica.id_musica
            INNER JOIN genero ON genero.id_genero=musica.cod_genero 
                AND musica_playlist.cod_musica=musica.id_musica
            ";

            $resultado = mysqli_query($conexao,$select);
            
            $teste=0;
            echo'<div id="mostrar">';
            while($linha = mysqli_fetch_assoc($resultado)){
                if($teste!=$linha['cod_playlist']){
                    echo'<h3>Playlist: '.$linha["nome_playlist"].'</h3><br/>';   
                    $teste=$linha['cod_playlist'];
                }
                echo'<div>
                        <b>Música:</b>'.$linha["nome_musica"].' ('.$linha["nome_banda"].') <br/>
                        <b>Gênero:</b>'.$linha["nome_genero"].'<br/>
                        <iframe width="220" height="150" src="https://www.youtube.com/embed/'.$linha['codigo_musica'].'"
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        <hr/>
                    </div>';
                
            }
            
            ?>
            </div>
            
    </body>
</html>