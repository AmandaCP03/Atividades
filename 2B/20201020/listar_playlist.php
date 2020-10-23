<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Lista - Playlist </title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <script src="jquery-3.3.1.min.js"></script>
        <script>
             $(document).ready(function(){
                 $("#playlist").change(function(){
                    
                    var id = $("#playlist").val();
                    if(id != ''){
                        $.post("seleciona_playlist.php", {"id":id}, function(msg){
                            console.log(msg);
                            $.each(msg, function(indice, valor){
                                if(indice == 0){
                                    texto= '<div class="alert" role="alert">';
                                    texto+='<h3 class="display-5">'+valor.nome_playlist+'</h3></div>';
                                }
                                texto+='<div class="card text-center">';
                                texto+='<h5 class="card-header">'+valor.nome_musica+'</h5>';
                                texto+='<div class="card-body"><h5 class="card-title">'+valor.nome_banda+'</h5>';
                                texto+='<iframe width="220" height="150" src="https://www.youtube.com/embed/'+valor.codigo_musica+'';
                                texto+=' frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
                                texto+='<a class="btn btn-light">'+valor.nome_genero+'</a></div> <br/>';
                                    
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
        <div class="d-flex justify-content-center">
            <h6 class="display-4">Playlists</h6>
        </div>
        <form action="listar_playlist.php" method = "POST" name="filtro" >
                <div class="form-group col-md-6 offset-md-3" style="padding-left: 1%;">
                    <select name = "playlist" id="playlist" class="form-control">
                    <option value =""> ::FILTRAR PLAYLIST::</option>
                    <option value =""> TODAS </option>
                    <?php
                        while($linhaPlaylist = mysqli_fetch_assoc($resultadoPlaylist)){
                            echo '<option value='.$linhaPlaylist["id_playlist"].'> '.$linhaPlaylist["nome_playlist"].'</option>';
                        }
                    ?>
                    </select>
                </div>
        </form>
        <div class="container" style="margin-top: 10%;">
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
                    echo'<div class="alert" role="alert">
                    <h3 class="display-5">'.$linha["nome_playlist"].'</h3>
                        </div>';   
                    $teste=$linha['cod_playlist'];
                }
                echo'<div class="card text-center">
                        <h5 class="card-header">'.$linha["nome_musica"].'</h5>
                        <div class="card-body">
                            <h5 class="card-title">'.$linha["nome_banda"].'</h5>
                            <iframe width="220" height="150" src="https://www.youtube.com/embed/'.$linha['codigo_musica'].'"
                                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <a class="btn btn-light">'.$linha["nome_genero"].'</a>
                    </div>
                    <br/>';
                
            }
            
            ?>
            </div>
            </div>
            
            
    </body>
</html>