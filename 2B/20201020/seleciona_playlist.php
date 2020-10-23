<?php 
    header("Content-Type: application/json");
    include "conexao.php";
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
                
    if(!empty($_POST)|| $_POST==""){
        $select.=" WHERE ";
        
        $nome_playlist = $_POST["id"];
        $select.=" playlist.id_playlist = $nome_playlist";
    }

    $select .= " ORDER BY nome_playlist, nome_musica";

    $resultado = mysqli_query($conexao,$select) or die($select);
    while($linha=mysqli_fetch_assoc($resultado)){
        $tabela[]= $linha;
    }

    echo json_encode($tabela);
?>