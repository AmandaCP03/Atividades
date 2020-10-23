<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Lista - Genero </title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <script src="jquery-3.5.1.min.js"></script>
    </head>
    <body>
        <?php  include "menu.php";?>
        <div class="container-fluid">
            <center>
            <div class="d-flex justify-content-center">
                <h6 class="display-4">Generos</h6>
            </div>
            <form method = "POST" name="filtro" class="d-flex justify-content-center">
                <div class="form-group col-md-3" style="margin-left: 2%;">
                    <input type="text" name="nome_genero" placeholder = "Nome genero..." class="form-control">
                </div>
                <div class="from-group col-md-3 " style="margin-right: 3%;">
                    <input class="btn btn-dark form-control " type="submit" value="Filtrar"></button>
                </div>
            </form>
        </form>

    <?php

        include "conexao.php";

        $select = "SELECT * FROM genero ";

        if(!empty($_POST)){
            $select .= " WHERE (1=1) ";
        
            if($_POST["nome_genero"]!=""){
                $nome_genero = $_POST["nome_genero"];

                $select .= " AND nome_genero like '%$nome_genero%'";
            }
        }

        $resultado = mysqli_query($conexao,$select);

        echo '<ul class="list-group list-group-flush col-md-6 text-align: justify">';
        while($linha = mysqli_fetch_assoc($resultado)){
                echo '<li class="list-group-item">'.$linha["nome_genero"].'</li>';
        }

        echo "<hr/> </ul>";
    ?>      
       
    </body>
</html>