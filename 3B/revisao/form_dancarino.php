<?php
include "conf.php";

cabecalho();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <script src="../../jquery-3.5.1.min.js"></script>
    <script src="js/md5.js"></script>
    <title>Exercicio Pratico</title>
    
<script>
    $(document).ready(function(){
        $("#cadastrar").click(function(){
            var estilo=$("select[name=estilo]").val();
            var dancarino=$("input[name=nome]").val();
            var email=$("input[name=email]").val();
            var  senha = $.md5($("input[name='senha']").val());
            $.get("salvar_dancarino.php", {"estilo": estilo, "dancarino": dancarino, "email": email, "senha": senha}, function(msg){
                $("#formulario").hide();
                $("#conteudo").html(msg);
            });
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

    <div id="formulario">  
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
                    <input type="text" name="nome" placeholder="Nome..." class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <input type="email" name="email" placeholder="Email..." class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <input type="password" name="senha" placeholder="Senha..." class="form-control">
                </div>
            </div>
            <div class="from-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%; margin-bottom: 7%;">
                    <button class="btn btn-secondary form-control" id="cadastrar">Cadastrar</button>
                </div>
            </div>
    </div>
<?php
    rodape();
?>
</body>
</html>