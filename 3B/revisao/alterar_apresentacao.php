<?php
//include "conf.php";

$select="SELECT nome_dancarino, id_dancarino FROM dancarino";
$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

?>
<form>
<div id="formulario" class="justify-content-center">
            <div class="form-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <input disabled type="id" name="id_apresentacao" placeholder="ID" class="input-control col-6" /><br/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <select class="form-control" name="dancarino">
                        <option label ="::SELECIONE UM GRUPO::"></option>
                        <?php
                            while($linha = mysqli_fetch_assoc($resultado)){
                                echo '<option value='.$linha["id_dancarino"].'> '.$linha["nome_dancarino"].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-auto col-lg-5" style="margin-left: 7%;">
                    <input type="date" name="dia" placeholder="Data Apresentação..." class="form-control">
                </div>
            
                <div class="col-auto col-lg-5">
                    <input type="text" name="hora" placeholder="Horário Apresentação..." class="form-control">
                </div>
            </div>
    </div>
</form>