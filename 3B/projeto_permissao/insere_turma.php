<?php

include "conf.php";

$cod_disciplina = $_POST["cod_disciplina"];
$cod_professor = $_POST["cod_professor"];
$cod_alunos = $_POST["cod_aluno"];
$ano = $_POST["ano"];



foreach($cod_alunos as $i=>$cod_aluno){

    $insert = "INSERT INTO turma
                VALUES (NULL,'$cod_aluno','$cod_professor','$cod_disciplina','$ano')";

    mysqli_query($conexao,$insert)
        or die("erro: ". mysqli_error($conexao));

}


cabecalho();

echo "Turma inserida com sucesso.";

rodape();

?>