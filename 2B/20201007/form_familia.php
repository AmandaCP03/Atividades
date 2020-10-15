<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Familia</title>
</head>
<body>
    <?php include "cabecalho.php" ?>
    <form action="inserir_familia.php" method="post">
    <input type="text" name="nome_familia" placeholder="Nome Família…. ">
    <input type="text" name="nome_cientifico" placeholder="Nome Científico….">
    <button>Cadastrar</button>
    <hr />
    </form>
</body>
</html>