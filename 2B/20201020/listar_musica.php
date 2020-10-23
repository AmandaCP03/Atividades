<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Lista - Música </title>

        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <script src="jquery-3.3.1.min.js"></script>
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
                        $("select[name='banda']").prop("disabled", false); // Element(s) are now enabled.
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
        <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <h6 class="display-4">Musicas</h6>
        </div>
        <form action="listar_musica.php" method = "POST" name="filtro">
            <div class="form-row offset-md-3 justify-content-md-center ">
                <div class="form-group col-md-3" style="padding-left: 1%;">
                    <select name = "genero" id="genero" class="form-control">
                        <option value =""> ::GENERO DA MÚSICA::</option>
                        <?php
                            while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                                echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3" style="padding-right: 1%;" >
                    <select name="banda" id="banda" class="form-control"  disabled>
                        <option label="::SELECIONE UMA BANDA::"> </option>
                    </select>
                </div>
            </div>
            <div class="form-row offset-md-3 justify-content-md-center ">
                <div class="form-group col-md-3" style="padding-rigth: 3%;">
                    <div class="col-auto">
                        <input type="text" name="nome_musica" placeholder = "Filtrar Musica..." class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-3" style="padding-right:1%;">
                    <input class="btn btn-dark form-control " type="submit" value="Filtrar"></button>
                </div>
            </div>
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
                    if(isset($_POST["banda"]) && $_POST["banda"]!=""){
                        $banda = $_POST["banda"];

                        $select .= " AND banda.id_banda like '%$banda%'";
                    }else{
                        $nome_genero = $_POST["genero"];

                        $select .= " AND genero.id_genero like '%$nome_genero%'";      

                    }   
                   
                }

                if($_POST["nome_musica"]!=""){
                    $musica = $_POST["nome_musica"];

                    $select .= " AND musica.nome_musica like '%$musica%'";
                }
            }
            $select .= " ORDER BY nome_musica";

            $resultado = mysqli_query($conexao,$select);

            echo '<ul class="list-group list-group-flush col-md-6 offset-md-3 text-align: justify">';

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<li class="list-group-item">'.$linha["nome_musica"].'
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
                    '.$linha["nome_banda"].' (<b>'.$linha["nome_genero"].'</b>)</li>';
            }

            echo "<hr/></ul>";
        ?>
         
    </body>
</html>