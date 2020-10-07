<?php
    function table(){
        include "conexao.php";
        $select="SELECT * FROM familia ";

        if($_POST){
            if($_POST["nome"]!=""){
                $nome = $_POST["nome"];
                $select .= "WHERE nome like '%$nome%' OR nome_cientifico like '%$nome%' ";
            }
        }

        $select .= "ORDER BY nome";

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
        <div>   
            <form action="familia.php" method="post">
            Filtrar por:<br />
            <input type="text" name="nome" placeholder="Nome ou nome científico…."> 
            <button>Pesquisar</button><br /> <hr />
        </div>
        

        
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