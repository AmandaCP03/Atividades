<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Cadastro - Genero </title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <script src="jquery-3.5.1.min.js"></script>
    </head>
    <body>
        <?php include "menu.php"; ?>
        <div class="d-flex justify-content-center">
            <h6 class="display-4">Cadastre um Genero</h6>
        </div> 
    <?php     

        if(empty($_POST)){
            echo'
            <form method = "POST" name="form_genero" class="d-flex justify-content-center">
                <div class="form-group">
                    <div class="col-auto">
                        <input type="text" name="genero" placeholder = "Nome Genero..." class="form-control">
                    </div>
                </div>
                <div class="from-group">
                    <div class="col-auto">
                        <input class="btn btn-dark form-control " type="submit" value="Cadastrar"></button>
                    </div>
                </div>
            </form>
            ';
        }else{
            include "conexao.php";

            $genero = $_POST["genero"];

            $query = "INSERT into genero(nome_genero) values('$genero')";

            mysqli_query($conexao, $query) or die($query);

            echo'<center><p> GENERO CADASTRADO! </p></center>
            ';
        }
    ?>     
      
    </body>
</html>