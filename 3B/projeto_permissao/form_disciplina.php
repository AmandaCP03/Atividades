<?php
include "conf.php";

$select = "SELECT prontuario,nome FROM professor ORDER BY nome";
$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));
cabecalho();
?>
<h4>Cadastro de Disciplina</h4>
<form method="post" action="insere_disciplina.php">    
    <input type="text" name="nome" placeholder="Nome..." class="input-control col-6" />
    <textarea placeholder="Descrição da disciplina..." name="descricao" class="textarea-control col-6"></textarea>
    <select required name="cod_professor" class="select-control col-6" >
        <option label="::Professor::"></option>
        <?php
        while($l=mysqli_fetch_assoc($resultado)){
            $cod_professor = $l["prontuario"];
            $professor = $l["nome"];
            echo "<option value='$cod_professor'>$professor</option>";
        }
        ?>
    </select>

    <button class="input-control col-6">Cadastrar</button>


</form>

<?php
rodape();

?>