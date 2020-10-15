<?php
    include "conexao.php";

    function select(){
        include "conexao.php";
        $select = "SELECT nome_cientifico, id_familia FROM familia ORDER BY nome_cientifico";
        $res = mysqli_query($con, $select);
        while($linha = mysqli_fetch_assoc($res)){
            echo "<option value=".$linha["id_familia"].">".$linha["nome_cientifico"]."</option>";
        };
    }

    function table(){
        include "conexao.php";
        $select="SELECT especie.nome AS nome_especie, especie.nome_cientifico AS nome_cientifico_especie, genero.nome_cientifico 
        as genero_especie, familia.nome_cientifico as familia_especie
        FROM especie INNER JOIN genero ON especie.cod_genero=genero.id_genero INNER JOIN familia ON genero.cod_familia=familia.id_familia";
        if($_POST){
            if($_POST["familia"]!= ""){
                if($_POST["genero"] != ""){
                    $select.= " and genero.id_genero = '".$_POST['genero']."'";
                }else{
                    $select.= " and familia.id_familia = '".$_POST['familia']."'";
                }
            }
            $select.=" WHERE especie.nome LIKE '%".$_POST['nome']."%' OR especie.nome_cientifico LIKE '%".$_POST['nome']."%'";
        }
        $select.=" ORDER BY nome_especie, nome_cientifico_especie, genero_especie, familia_especie";
        

        /*as nome_familia, 
            especie.nome_cientifico as nome_cientifico_especie, genero.nome_cientifico as genero_especie, 
            familia.nome_cientifico as familia_especie FROM especie 
            INNER JOIN genero ON especie.cod_genero=genero.id_genero 
            INNER JOIN familia ON genero.cod_familia=familia.id_familia 
            ORDER BY nome_especie, nome_cientifico_especie, genero_especie, familia_especie ";*/
        $res=mysqli_query($con, $select);
        while($linha=mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo"<td>".$linha["nome_especie"]."</td>"; 
            echo"<td>".$linha["nome_cientifico_especie"]."</td>"; 
            echo"<td>".$linha["genero_especie"]."</td>"; 
            echo"<td>".$linha["familia_especie"]."</td>"; 
            echo "</tr>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../../../jquery-3.5.1.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#familia").change(function(){
                    //PHP pra buscar
                    var id = $("#familia").val();
                    $.post("seleciona_genero.php", {"id":id}, function(msg){
                        option="<option label='SELECIONE O GENERO' />";
                        $.each(msg, function(indice, valor){
                            option+="<option value='"+valor.id_genero+"'> "+valor.nome_cientifico+" </option>";
                        });
                        $("#genero").html(option);
                    });
                });
            });
        </script>

    </head>
    <body>
        
        <h3>Filtrar por:</h3>
        <div>   
            <form action="especie.php" method="post">
            <select id="familia" name="familia">
                <option label="SELECIONE UMA FAMILIA" />
                <?php select(); ?>
            </select>
            <br><br>
            <select id="genero" name="genero">
                <option label="SELECIONE UM GENERO" />
            </select>
        
            <input type="text" name="nome" placeholder="Nome ou nome científico…."> 
            <button>Pesquisar</button><br /> <hr />
            </form>
        </div>
        <table border="1px">
            <tr >
                <th colspan="4">Especie</th>
            </tr>
            <tr>
                <td>Nome</td>
                <td>Nome Científico</td>
                <td>Gênero</td>
                <td>Família</td>
            </tr>
            <?php table(); ?>
        </table>
    </body>
</html>