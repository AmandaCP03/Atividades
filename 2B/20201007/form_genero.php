<?php
    function select(){
        include "conexao.php";
        $select = "SELECT nome, id_familia FROM familia ORDER BY nome";
        $res = mysqli_query($con, $select);
        while ($linha = mysqli_fetch_assoc($res)){
            echo "<option value=".$linha["id_familia"].">".$linha["nome"]."</option>";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Genero</title>
</head>
<body>
    <?php include "cabecalho.php" ?>
    <form action="inserir_genero.php" method="post">
    <select name="familia">
        <option label="::FAMÍLIA::"></option>
        <?php select(); ?>
    </select>
    <input type="text" name="genero" placeholder="Nome Científico….">
    <button>Cadastrar</button>
    <hr />
    </form>
</body>
</html>