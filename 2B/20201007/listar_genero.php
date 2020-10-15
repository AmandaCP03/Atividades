<?php
    function select(){
        include "conexao.php";
        $select = "SELECT nome_cientifico FROM familia ORDER BY nome_cientifico";
        $res = mysqli_query($con, $select);
        while($linha = mysqli_fetch_assoc($res)){
            echo "<option value=".$linha["nome_cientifico"].">".$linha["nome_cientifico"]."</option>";
        };
    }

    function table(){
        include "conexao.php";
        
        $select = "SELECT genero.nome_cientifico as nome_cientifico_genero, familia.nome_cientifico as nome_cientifico_familia FROM genero INNER JOIN familia ON genero.cod_familia=familia.id_familia ";

        if($_POST){
            $select .= "WHERE (1=1) ";
            if($_POST["nome_cientifico"]!=""){
                $nome = $_POST["nome_cientifico"];
                $select .= "AND genero.nome_cientifico like '%$nome%' ";
            }
            if($_POST["select"]!=""){
                $familia = $_POST["select"];
                $select .= "AND familia.nome_cientifico like '%$familia%' ";

                //SELECT genero.nome_cientifico as nome_cientifico_genero, familia.nome_cientifico as nome_cientifico_familia FROM genero INNER JOIN familia ON genero.cod_familia=familia.id_familia ORDER BY nome_cientifico_genero, nome_cientifico_familia 

            }
        }

        $select .= "ORDER BY nome_cientifico_genero, nome_cientifico_familia";

        $res=mysqli_query($con, $select) or die($select);
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

        <div>   
            <form action="genero.php" method="post">
            Filtrar por:<br />
            <select name="select" placeholder="::SELECIONE UMA FAMÍLIA::">
                <option value="">::SELECIONE UMA FAMÍLIA::</option>
                <?php select(); ?>
            </select>
            <br /><br />
            <input type="text" name="nome_cientifico" placeholder="Nome científico…."> 
            <button>Pesquisar</button><br /> <hr />
        </div>


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