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
        $("select[name=dia]").change(function(){
            var dia = $("select[name=dia]").val();
            if(dia != ''){
                console.log(dia);
                $.post("seleciona_dia.php", {"dia":dia}, function(msg){
                    console.log(msg);
                    $.each(msg, function(indice, valor){
                        if(indice == 0){
                            texto="";
                        }
                        texto+='<div class="card text-center col-lg-6" style="margin-bottom:40px;">';
                        texto+='<h5 class="card-header" style="background-color:rgb(212, 212, 212);"><b>'+valor.nome_dancarino+'</b> - '+valor.nome_estilo+'</h5>';
                        texto+='<div class="card-body">';
                        texto+='<p><b>Dia: </b>'+valor.dia+' <b> às </b> '+valor.hora+'</p>';
                        texto+='<button class="btn btn-outline-warning alterar_apresentacao" value='+valor.id_apresentacao+' data-toggle="modal" data-target="#modal" style="margin-bottom:10px;" >Alterar</button>';
                        texto+='<button class="btn btn-primary remover_apresentacao" value='+valor.id_apresentacao+'>Remover</button>';
                        texto+='</div>';
                        $("#conteudo").html(texto);
                    });
                    
                });
            }else{
                document.location.reload(true);
            }
        });
    });
            
</script>
</head>
<body>
<?php
    include "conexao.php";
    $selectData="SELECT id_apresentacao, dia FROM apresentacao ORDER BY dia";
    $resultadoData = mysqli_query($conexao,$selectData);
?>
        <div class="container-fluid">
            <center>
            <div class="d-flex justify-content-center">
                <h6 class="display-4">Apresentações</h6>
            </div>
            <form name="filtro">
                <div class="form-group row">
                    <div class="col-auto col-lg-5" style="margin-left: 29%;">
                        <select class="form-control" name="dia">
                            <option label ="::SELECIONE UMA DATA::"></option>
                            <?php
                                $cont=0;
                                while($linhaData = mysqli_fetch_assoc($resultadoData)){
                                    if($cont == 0){
                                        $ultima = $linhaData["dia"];
                                        echo '<option value='.$linhaData["dia"].'> '.$linhaData["dia"].'</option>';
                                    }
                                    
                                    if($linhaData["dia"] != $ultima){
                                        echo '<option value='.$linhaData["dia"].'> '.$linhaData["dia"].'</option>';
                                        $ultima = $linhaData["dia"];
                                    }
                                    $cont++;
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
            <div id="msg"> </div>
    <?php

        echo'<div id="conteudo">';
        echo'<div id="lista">';
   
        $select = "SELECT apresentacao.id_apresentacao AS id_apresentacao,
                    apresentacao.dia AS dia,  
                    apresentacao.horario as hora,
                    apresentacao.dancarino as dancarino,
                    dancarino.nome_dancarino AS nome_dancarino,
                    estilo.nome_estilo AS nome_estilo
                    FROM apresentacao 
                    INNER JOIN dancarino ON dancarino.id_dancarino=apresentacao.dancarino
                    INNER JOIN estilo ON estilo.id_estilo=dancarino.estilo";

        $resultado = mysqli_query($conexao,$select);

        while($linha = mysqli_fetch_assoc($resultado)){
                echo '<div class="card text-center col-lg-6" style="margin-bottom:40px;">
                        <h5 class="card-header" style="background-color:rgb(212, 212, 212); "><b>'.$linha["nome_dancarino"].'</b> - '.$linha["nome_estilo"].'</h5>
                        <div class="card-body">
                            <p><b>Dia: </b>'.$linha["dia"].' <b> às </b> '.$linha["hora"].'</p>
                        </div>';
                        if($linha["dancarino"] == $_SESSION["usuario"]){
                            echo'<button class="btn btn-outline-warning alterar_apresentacao" value='.$linha["id_apresentacao"].' data-toggle="modal" data-target="#modal" style="margin-bottom:10px;" >Alterar</button>';
                        }
                        if($_SESSION["permissao"]=='1'){
                            echo'<button class="btn btn-primary remover_apresentacao" value='.$linha["id_apresentacao"].'>Remover</button>';
                        }
                    echo'</div>';
        }
        echo'</div></div>';
         
$titulo = "Alterar Apresentações";
$nome_form = "alterar_apresentacao.php";
$salvar="apresentacao";
include "modal.php";
include "scripts.php";    

rodape();

?>
    </center>
</body>
</html>