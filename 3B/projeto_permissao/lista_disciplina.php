<?php
include "conf.php";
cabecalho();

$select = "SELECT id_disciplina, descricao, disciplina.nome as disciplina
                     FROM disciplina  ORDER BY disciplina";
$r = mysqli_query($conexao,$select)
    or die("Erro: " . mysqli_error($conexao));    

echo "
    <h3>Disciplinas</h3>
    <div id='msg'></div>
    <table>
        <thead>    
        <tr>            
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
        </thead>";
        $i=0;
        echo "<tbody id='tbody_disciplina'>";
        while($l = mysqli_fetch_assoc($r)){
            echo "<tr>
                    <td>".$l["disciplina"]."</td>
                    <td>".$l["descricao"]."</td>
                    <td>
                        <button class='btn btn-warning alterar' value='".$l["id_disciplina"]."' data-toggle='modal' 
                            data-target='#modal'>Alterar</button>                       
                        <button class='btn btn-danger remover' value='".$l["id_disciplina"]."'>Remover</button>                       
                    </td>
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

