<?php
    include "conexao.php";
    function table(){
        include "conexao.php";
        $select="SELECT especie.nome as nome_especie, especie.nome_cientifico as nome_cientifico_especie, genero.nome_cientifico as genero_especie, familia.nome_cientifico as familia_especie FROM especie INNER JOIN genero ON especie.cod_genero=genero.id_genero INNER JOIN familia ON genero.cod_familia=familia.id_familia ORDER BY nome_especie, nome_cientifico_especie, genero_especie, familia_especie ";
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
    </head>
    <body>
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