<form>    
    <input disabled type="text" name="prontuario" placeholder="Prontuário..." class="input-control col-6" />
    <input type="text" name="nome" placeholder="Nome..." class="input-control col-6" />
    <input type="email" name="email" placeholder="Email..." class="input-control col-6" />
    <div>Data Nasc. <input type="date" name="data_nascimento" class="input-control col-5" /></div>
    Gênero: <input type="radio" name="sexo" value="m" /> Masc.
    <input type="radio" name="sexo" value="f" /> Fem.
    <input type="radio" name="sexo" value="o" /> Outro <br /> 
    <input type="checkbox" name="trocar_senha" value="1" /> Trocar Senha <br />
    <div id="trocar_senha" style="display:none;">      
        <input type="password" name="senha_cadastro" placeholder="Digite a senha..." class="input-control col-6" /> 
        <input type="password" name="confirma_senha" placeholder="Confirme a senha..." class="input-control col-6" /> 
    </div>
    <br />
        

</form>