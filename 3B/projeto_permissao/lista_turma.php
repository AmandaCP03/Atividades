<?php
include "conf.php";
cabecalho();

if(!isset($_SESSION["usuario"])){
    echo "<script>location.href='index.php'</script>";
}


$select = "SELECT ano, disciplina.nome as disciplina, professor.nome as professor,
 GROUP_CONCAT(aluno.nome) as alunos FROM turma 
        INNER JOIN disciplina ON turma.cod_disciplina=disciplina.id_disciplina
        INNER JOIN aluno ON turma.cod_aluno = aluno.prontuario
        INNER JOIN professor ON turma.cod_professor = professor.prontuario";

if($_SESSION["permissao"]=="3"){
    $select .= " AND aluno.prontuario='".$_SESSION["usuario"]."'";
}

if($_SESSION["permissao"]=="2"){
    $select .= " AND professor.prontuario='".$_SESSION["usuario"]."'";
}


$select.= 	
    " GROUP BY ano, disciplina,professor
    ORDER BY ano, disciplina, professor";
$r = mysqli_query($conexao,$select)
    or die("Erro: " . mysqli_error($conexao));    

echo "
    <h3>Disciplinas</h3>
    <div id='msg'></div>
    <table class='col-12'>
        <thead>    
        <tr>            
            <th>Ano</th>
            <th>Disciplina</th>
            <th>Professor</th>
            <th>Aluno(s)</th>
        </tr>
        </thead>";
        $i=0;
        echo "<tbody id='tbody_disciplina'>";
        while($l = mysqli_fetch_assoc($r)){
            echo "<tr>
                    <td>".$l["ano"]."</td>
                    <td>".$l["disciplina"]."</td>
                    <td>".$l["professor"]."</td>
                    <td>".$l["alunos"]."</td>
                  </tr>";
                $i++;
        }
        if($i==0){
            echo "<tr><td colspan='4'>Não há disciplinas cadastradas</td></tr>";
        }
        echo "</tbody>";
echo "</table>";
//variaveis $t e $c serão utilizadas no script_remover.php
$titulo = "Alterar Disciplina";
$nome_form = "alterar_disciplina.php";
include "modal.php";

include "scripts_disciplina.php";
rodape();

?>

