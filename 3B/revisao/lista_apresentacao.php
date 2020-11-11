<?php
include "conf.php";

cabecalho();
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
                        texto+='<div class="card text-center col-lg-6">';
                        texto+='<h5 class="card-header" style="background-color:rgb(212, 212, 212)"><b>'+valor.nome_dancarino+'</b> - '+valor.nome_estilo+'</h5>';
                        texto+='<div class="card-body">';
                        texto+='<p><b>Dia: </b>'+valor.dia+' <b> às </b> '+valor.hora+'</p>';
                        texto+='</div> <button class="btn btn-outline-info remover" value='+valor.id_apresentacao+'>Remover</button>';
                        texto+='</div><br/>';
                        $("#conteudo").html(texto);
                    });
                    //$("#conteudo").html(texto);
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
        include "script_remover.php";
   
        $select = "SELECT apresentacao.id_apresentacao AS id_apresentacao,
                    apresentacao.dia AS dia,  
                    apresentacao.horario as hora,
                    dancarino.nome_dancarino AS nome_dancarino,
                    estilo.nome_estilo AS nome_estilo
                    FROM apresentacao 
                    INNER JOIN dancarino ON dancarino.id_dancarino=apresentacao.dancarino
                    INNER JOIN estilo ON estilo.id_estilo=dancarino.estilo";

        $resultado = mysqli_query($conexao,$select);


        echo'<div id="conteudo">';
        while($linha = mysqli_fetch_assoc($resultado)){
                echo '<div class="card text-center col-lg-6" style="margin-bottom:40px;">
                        <h5 class="card-header" style="background-color:rgb(212, 212, 212); "><b>'.$linha["nome_dancarino"].'</b> - '.$linha["nome_estilo"].'</h5>
                        <div class="card-body">
                            <p><b>Dia: </b>'.$linha["dia"].' <b> às </b> '.$linha["hora"].'</p>
                        </div>
                        <button class="btn btn-outline-info remover_apresentacao" value='.$linha["id_apresentacao"].'>Remover</button>
                    </div>';
        }
        echo'</div>';
         
       
    
rodape();

?>
    </center>
</body>
</html>