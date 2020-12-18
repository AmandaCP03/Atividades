<?php
include "conf.php";

cabecalho();

if(!isset($_SESSION["permissao"])){
    echo "<script>location.href='index.php';</script>";
}
else if($_SESSION["permissao"]!="1"){
    echo "<script>location.href='index.php';</script>";
}


?>
<h4>Cadastro de Turma</h4>
<form method="post" action="insere_turma.php">    
    <input type="number" class="col-6" name="ano" 
    placeholder="Digite o ano da disciplina..." min="2015" />

    <select required name="cod_disciplina" class="select-control col-6" >
        <option label="::Disciplina::"></option>
        <?php
        $select = "SELECT id_disciplina,nome FROM disciplina ORDER BY nome";
        $resultado = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));
        while($l=mysqli_fetch_assoc($resultado)){
            $cod_disciplina = $l["id_disciplina"];
            $disciplina = $l["nome"];           
            echo "<option value='$cod_disciplina'>$disciplina</option>";
        }
        ?>
    </select><br />


    <select required name="cod_professor" class="select-control col-6" >
        <option label="::Professor::"></option>
        <?php
        $select = "SELECT prontuario,nome FROM professor ORDER BY nome";
        $resultado = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));
        while($l=mysqli_fetch_assoc($resultado)){
            $cod_professor = $l["prontuario"];            
            $professor = $l["nome"];
            echo "<option value='$cod_professor'>$professor</option>";
        }
        ?>
    </select><br />

    <div class="col-6">
    <?php

        $select = "SELECT prontuario, nome FROM aluno ORDER BY nome";
        $r = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));
        while($l = mysqli_fetch_assoc($r)){
            echo "<input class='input-control' type='checkbox' name='cod_aluno[]' 
                value='".$l["prontuario"]."' /> ".$l["nome"];
        }

    ?>
    </div>
    <?php

    ?>
    <button class="input-control col-6">Cadastrar</button>


</form>

<?php
rodape();

?>