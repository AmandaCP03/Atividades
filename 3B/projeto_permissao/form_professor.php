<?php
include "conf.php";

cabecalho();
?>
<h4>Cadastro de Professor</h4>
<form name="cadastro" method="post" action="insere_professor.php">    
    <input type="text" name="nome" placeholder="Nome..." class="input-control col-6" />    
    <select name="formacao" class="select-control col-6">
        <option label="::Formação Técnica::"></option>
        <option>Bacharel em Ciências da Computação</option>
        <option>Bacharel em Engenharia da Computação</option>
        <option>Bacharel em Sistemas de Informação</option>
        <option>Tecnologo em Análise e Desenvolvimento de Sistemas</option>
        <option>Tecnologo em Desenvolvimento de Sistemas Para Internet</option>
    </select>
    <input type="email" name="email_cadastro" placeholder="Email..." class="input-control col-6" />
    <?php
    if(!isset($_SESSION["permissao"])){
    ?>
        <input type="password" name="senha_cadastro" placeholder="Digite a senha..." class="input-control col-6" /> 
        <input type="password" name="confirma_senha" placeholder="Confirme a senha..." class="input-control col-6" /> <br />
    <?php
    }else{?>
        <input type="hidden" name="senha_cadastro" value="12345" />
    <?php
    }
    ?>
    <button type="button" class="cadastrar input-control col-6">Cadastrar</button>


</form>

<?php
rodape();

?>