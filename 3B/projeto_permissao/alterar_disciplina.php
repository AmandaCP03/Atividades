<?php
//include "conf.php";

$select = "SELECT prontuario,nome FROM professor ORDER BY nome";
$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

?>
<h4>Alterar de Disciplina</h4>
<form method="post" action="insere_disciplina.php">    
    <input type="hidden" name="id_disciplina" />
    <input type="text" name="nome" placeholder="Nome..." class="input-control col-12" />
    <textarea placeholder="Descrição da disciplina..." name="descricao" class="textarea-control col-12"></textarea>
    
</form>