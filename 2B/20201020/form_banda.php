<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Cadastro - Banda </title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <script src="jquery-3.5.1.min.js"></script>
    </head>
    <body>
    <?php include "menu.php";?>
    <div class="d-flex justify-content-center">
            <h6 class="display-4">Cadastre uma Banda</h6>
    </div> 
    <?php
        include "conexao.php";
        $selectGenero = "SELECT nome_genero, id_genero FROM genero";

        $resultadoGenero = mysqli_query($conexao,$selectGenero);

        if(empty($_POST)){
            echo'
                <form method = "POST" name="cadastro_banda" class="d-flex justify-content-center">
                <div class="form-group">
                    <select name = "genero" class="form-control">
                        <option value =""> ::SELECIONE UM GENERO::</option>
                ';
                while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                    echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                }
            echo'
            </select>
            </div>
                <div class="form-group">
                    <div class="col-auto">
                        <input type="text" name="nome_banda" placeholder = "Nome Banda..." class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input class="btn btn-dark form-control " type="submit" value="Cadastrar"></button>
                </div>
            </form>
            ';
        }else{

            $banda = $_POST["nome_banda"];
            $genero = $_POST["genero"];

            $query = "INSERT into banda(nome_banda, cod_genero) values('$banda','$genero')";

            mysqli_query($conexao, $query) or die($query);

            echo'<center><p> BANDA CADASTRADA! </p></center>
            ';
        }
    ?>    
       
    </body>
</html>