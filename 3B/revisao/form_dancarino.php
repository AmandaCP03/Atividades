<?php
include "conf.php";

cabecalho();
include "modal_login.php";
if(isset($_SESSION["usuario"])){
    if($_SESSION["permissao"] == "2"){
        echo"<script>location.href='index.php'</script>";
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <script src="../../jquery-3.5.1.min.js"></script>
    <script src="js/md5.js"></script>
    <script src="bootstrap/js/validaform.min.js"></script>
    <title>Exercicio Pratico</title>
    
<script>
    $(document).ready(function(){
        $("#cadastrar").click(function(){
            var cad_senha = $.md5($("input[name='senha']").val());
            var conf_senha = $.md5($("input[name='conf_senha']").val());
            if(cad_senha==conf_senha){
                var estilo=$("select[name=estilo]").val();
                var dancarino=$("input[name=nome]").val();
                var email=$("input[name=email]").val();
                var senha = cad_senha;
                $.post("salvar_dancarino.php", {"estilo": estilo, "dancarino": dancarino, "email": email, "senha": senha}, function(msg){
                    // $(".formulario").hide();
                    $("#conteudo").html(msg);
                });
            }else{
                $("#conteudo").html("<br/><center><p> CONFIRMAÇÃO DE SENHA INCORRETA! </p></center>");
            }
            
        });
        
            
    });
            
</script>
</head>
<body>
    <?php
        include "conexao.php"; 
        $select="SELECT nome_estilo, id_estilo FROM estilo";
        $resultado = mysqli_query($conexao,$select);
    ?>
    <h3 style="margin-left:100px; margin-top:30px;"> Cadastre seu Grupo de Dança </h3>

    <div id="conteudo">
    </div>

    <form id="formulario" class="form formulario">  
            <div class="form-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <select class="form-control" name="estilo" required>
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
                    <input type="text" name="nome" placeholder="Nome..." class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <input type="email" name="email" placeholder="Email..." class="form-control email" required>
                </div>
            </div>
            <?php if(!isset($_SESSION["permissao"])){
                echo'<div class="form-group row">
                    <div class="col-auto col-lg-5" style="margin-left: 7%;">
                        <input type="password" name="senha" id="cad_senha" placeholder="Senha..." class="form-control input-control password" required="required">
                    </div>
                    <div class="col-auto col-lg-5" >
                        <input type="password" name="conf_senha" id="conf_senha" placeholder="Confirme a senha..." class="form-control input-control password" required="required">
                    </div>
                </div>';
            } else{ 
                echo'<input type="hidden" name="senha" id="cad_senha" value="123">';
            } ?>
            <div class="from-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%; margin-bottom: 7%;">
                    <button class="btn btn-secondary form-control" id="cadastrar">Cadastrar</button>
                </div>
            </div>
    </form>
<?php
    rodape();
?>
</body>
</html>