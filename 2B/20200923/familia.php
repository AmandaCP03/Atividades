<?php
    function table(){
        include "conexao.php";
        $select="SELECT * FROM familia ORDER BY nome";
        $res=mysqli_query($con, $select);
        while($linha=mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo"<td>".$linha["nome"]."</td>";
            echo"<td>".$linha["nome_cientifico"]."</td>";
            echo "</tr>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
    </head>
    <body>
        <table border="1px">
            <tr >
                <th colspan="2">Familia</th>
            </tr>
            <tr>
                <td>Nome</td>
                <td>Nome Científico</td>
            </tr>
            <?php table(); ?>
        </table>
    </body>
</html>