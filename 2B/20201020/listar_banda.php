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
            <div class="d-flex justify-content-center">
                <h6 class="display-4">Bandas</h6>
            </div>
            <?php  
                include "conexao.php";
                $selectGenero = "SELECT nome_genero FROM Genero";

                $resultadoGenero = mysqli_query($conexao,$selectGenero);
            ?>
            <form method = "POST" name="filtro">
                <div class="form-group  col-md-6 offset-md-3">
                    <select name = "genero" class="form-control">
                        <option value =""> ::SELECIONE O GENERO DA BANDA::</option>
                        <?php
                            while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                                echo '<option value='.$linhaGenero["nome_genero"].'> '.$linhaGenero["nome_genero"].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-row offset-md-3 justify-content-md-center ">
                    <div class="form-group col-md-3" style="margin-left: 2%;">
                        <div class="col-auto">
                            <input type="text" name="nome_banda" placeholder = "Nome Banda..." class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-3" style="margin-right: 3%;">
                        <input class="btn btn-dark form-control " type="submit" value="Pesquisar"></button>
                    </div>
                </div>
            </form>
            <?php
                $select = "SELECT banda.nome_banda, genero.nome_genero  FROM banda INNER JOIN genero ON banda.cod_genero = genero.id_genero";
                
                if(!empty($_POST)){
                    $select .= " WHERE (1=1) ";
                
                    if($_POST["genero"]!=""){
                        $nome_genero = $_POST["genero"];

                        $select .= " AND genero.nome_genero like '%$nome_genero%'";
                    }

                    if($_POST["nome_banda"]!=""){
                        $banda = $_POST["nome_banda"];

                        $select .= " AND banda.nome_banda like '%$banda%'";
                    }
                }

                $resultado = mysqli_query($conexao,$select);

                echo '<ul class="list-group list-group-flush col-md-6 offset-md-3 text-align: justify">';

                while($linha = mysqli_fetch_assoc($resultado)){
                    echo '<li  class="list-group-item">'.$linha["nome_banda"].'(<b>'.$linha["nome_genero"].'</b>)</li>';
                }

                echo "<hr/> </ul>";
            ?>
        </div>
    
    </body>
</html>