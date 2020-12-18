<?php
include "conf.php";

cabecalho();

if(!isset($_SESSION["usuario"])){
    echo"<script>location.href='index.php'</script>";
}
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
            var dancarino=$("select[name=dancarino]").val();
            var dia=$("input[name=dia]").val();
            var hora=$("input[name=hora]").val();
            $.get("salvar_apresentacao.php", {"dancarino": dancarino, "dia": dia, "hora": hora}, function(msg){
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
        $select="SELECT nome_dancarino, id_dancarino FROM dancarino";
        $resultado = mysqli_query($conexao,$select);
    ?>
    <h3 style="margin-left:100px; margin-top:30px;"> Cadastre o sua apresentação </h3>

    <div id="conteudo">
    </div>

    <div id="formulario" class="justify-content-center">  
            <div class="form-group row">
                <div class="col-auto col-lg-10" style="margin-left: 7%;">
                    <?php 
                    if($_SESSION["permissao"]=="1"){
                        echo'<select class="form-control" name="dancarino">
                            <option label ="::SELECIONE UM GRUPO::"></option>';
                                while($linha = mysqli_fetch_assoc($resultado)){
                                    echo '<option value='.$linha["id_dancarino"].'> '.$linha["nome_dancarino"].'</option>';
                                }
                            
                        echo'</select>';
                    }
                    ?>
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