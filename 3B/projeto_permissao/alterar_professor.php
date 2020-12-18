<form>
<input type="text" name="prontuario" disabled placeholder="Prontuário..." class="input-control col-12" />
    <input type="text" name="nome" placeholder="Nome..." class="input-control col-12" />
    <input type="email" name="email" placeholder="Email..." class="input-control col-12" />
    <select name="formacao" class="select-control col-12">
        <option label="::Formação Técnica::"></option>
        <option>Bacharel em Ciências da Computação</option>
        <option>Bacharel em Engenharia da Computação</option>
        <option>Bacharel em Sistemas de Informação</option>
        <option>Tecnologo em Análise e Desenvolvimento de Sistemas</option>
        <option>Tecnologo em Desenvolvimento de Sistemas Para Internet</option>
    </select>
    <input type="checkbox" name="trocar_senha" value="1" /> Trocar Senha <br />
    <div id="trocar_senha" style="display:none;">      
        <input type="password" name="senha_cadastro" placeholder="Digite a senha..." class="input-control col-6" /> 
        <input type="password" name="confirma_senha" placeholder="Confirme a senha..." class="input-control col-6" /> 
    </div>
</form>