<?php
//include "conf.php";

$select="SELECT nome_estilo, id_estilo FROM estilo";
$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

?>
<form>
    <div class="form-group row">
        <div class="col-autoo col-lg-10" style="margin-left: 7%;">
            <input disabled type="id" name="id_dancarino" placeholder="ID" class="input-control col-6" /><br/>
        </div>
    </div>    
    
    
    <div class="form-group row">
        <div class="col-autoo col-lg-10" style="margin-left: 7%;">
            <input type="text" name="nome_dancarino" placeholder="Nome do grupo de dança..." class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-autoo col-lg-10" style="margin-left: 7%;">
            <input type="email" name="email" placeholder="Email..." class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-auto col-lg-10" style="margin-left: 7%;">
            <select class="form-control" name="estilo">
                <option label ="::SELECIONE UM ESTILO::"></option>
                <?php
                    while($linha = mysqli_fetch_assoc($resultado)){
                        echo '<option value='.$linha["id_estilo"].'> '.$linha["nome_estilo"].'</option>';
                    }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-auto col-lg-10" style="margin-left: 7%;">
            <input type="checkbox" name="trocar_senha" value="1" /> Trocar Senha <br />
        </div>

        <div class="col-auto col-lg-10" style="margin-left: 7%;">
            <div id="trocar_senha" style="display:none;">      
                <input type="password" name="senha_cadastro" placeholder="Digite a senha..." class="form-control input-control col-6" /> 
                <!-- <input type="password" name="senha_cadastro" placeholder="Digite a senha..." class="form-control input-control col-6" />  -->
            </div>
        </div>
    </div>

</form>