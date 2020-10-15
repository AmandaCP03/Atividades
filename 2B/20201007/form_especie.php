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

    <script src="../../../jquery-3.5.1.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#familia").change(function(){
                    //PHP pra buscar
                    var id = $("#familia").val();
                    $.post("seleciona_genero.php", {"id":id}, function(msg){
                        option="<option label='::::SELECIONE UM GENERO::::' />";
                        $.each(msg, function(indice, valor){
                            option+="<option value='"+valor.id_genero+"'> "+valor.nome_cientifico+" </option>";
                        });
                        $("#genero").html(option);
                    });
                });
            });
        </script>

    <title>Cadastro Especie</title>
</head>
<body>
    <?php include "cabecalho.php" ?>
    <form action="inserir_especie.php" method="post">
        <select name="familia" id="familia">
            <option label="::::SELECIONE UMA FAMÍLIA::::"></option>
            <?php select(); ?>
        </select>
        <select name="genero" id="genero">
            <option label='::::SELECIONE UM GENERO::::' >
        </select>
        <br>
        <input type="text" name="nome_especie" placeholder="Nome….">
        <input type="text" name="nome_cientifico_especie" placeholder="Nome Científico….">
        <button>Cadastrar</button>
        <hr />
    </form>
</body>
</html>