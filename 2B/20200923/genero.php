<?php
    function table(){
        include "conexao.php";
        $select="SELECT genero.nome_cientifico as nome_cientifico_genero, familia.nome_cientifico as nome_cientifico_familia FROM genero INNER JOIN familia ON genero.cod_familia=familia.id_familia ORDER BY nome_cientifico_genero, nome_cientifico_familia ";
        $res=mysqli_query($con, $select);
        while($linha=mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo"<td>".$linha["nome_cientifico_genero"]."</td>"; // Nome cientifico
            echo"<td>".$linha["nome_cientifico_familia"]."</td>"; // Nome cientifico familia
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
                <th colspan="2">Genero</th>
            </tr>
            <tr>
                <td>nome_cientifico</td>
                <td>Familia</td>
            </tr>
            <?php table(); ?>
        </table>
    </body>
</html>