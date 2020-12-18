<?php
include "conf.php";

cabecalho();
include "modal_login.php";

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <script src="../../jquery-3.5.1.min.js"></script>
    <title>Exercício Compartilhado</title>

<script>
    $(document).ready(function(){
        $("#cadastrar").click(function(){
            var estilo=$("input[name=estilo]").val();
            $.get("salvar_estilo.php", {"estilo": estilo}, function(msg){
                $("#formulario").hide();
                $("#conteudo").html(msg);
            });
        });
            
    });
            
</script>
</head>
<body>

    <h3 style="margin-left:100px; margin-top:30px;"> Cadastre um Estilo de Dança </h3>

    <div id="conteudo">
    </div>

    <div id="formulario"> 
            <div class="form-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <input type="text" name="estilo" placeholder="Estilo de Dança..." class="form-control">
                </div>
            </div>
            <div class="from-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <button class="btn btn-secondary form-control" id="cadastrar">Cadastrar</button>
                </div>
            </div>
    </div>
<?php
    rodape();
?>
</body>
</html>