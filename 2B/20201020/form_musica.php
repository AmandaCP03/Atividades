<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Cadastro - Música </title>

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
                        console.log("Foi");     
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
    <?php    include "menu.php";        include "conexao.php";?>
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <h6 class="display-4">Cadastre uma Musica</h6>
            </div> 
                <?php
                    $selectGenero = "SELECT nome_genero, id_genero FROM genero";

                    $resultadoGenero = mysqli_query($conexao,$selectGenero);

                    if(empty($_POST)){
                        echo'
                            <form action="form_musica.php" method = "POST" name="cadastro_musica">    
                                <div class="form-group col-md-6 offset-md-3">
                                    <input type="text" name="nome_musica" placeholder = "Nome Música..." class="form-control"/>
                                </div>
                            <div class="form-row offset-md-3 justify-content-md-center ">
                                <div class="form-group col-md-3" style="padding-left: 1%;">
                                        <select name = "genero" id="genero" class="form-control">
                                            <option label="::SELECIONE UM GENERO::"> </option>
                            ';
                            while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                                echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                            }
                        echo'
                                </select>
                            </div>
                            <div class="form-group col-md-3" style="padding-right: 1%;" >
                                <select name="banda" id="banda" class="form-control" disabled>
                                    <option label="::SELECIONE UMA BANDA::"> </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 offset-md-3">
                             <textarea name="codigo_musica" class="form-control"> </textarea>
                        </div>
                        <div class="form-group col-md-6 offset-md-3">
                            <input class="btn btn-dark form-control " type="submit" value="Cadastrar"/>
                        </div>
                        </form>            
                        ';
                    }else{

                        $musica = $_POST["nome_musica"];
                        $codigo = $_POST["codigo_musica"];
                        $genero = $_POST["genero"];
                        $banda = $_POST["banda"];



                        $query = "INSERT into musica(nome_musica, cod_musica, cod_genero, cod_banda) values('$musica','$codigo','$genero','$banda')";

                        mysqli_query($conexao, $query) or die($query);

                        echo'<center><p> MÚSICA CADASTRADA! </p></center>
                        ';
                    }
                ?>       
        </div>
        
    </body>
</html>