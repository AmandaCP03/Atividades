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
    <script src='js/cadastro.js'></script>
    <title>Exercício Compartilhado</title>

<script>
    $(document).ready(function(){
        $("select[name=filtro_estilo]").change(function(){
            var estilo = $("select[name=filtro_estilo]").val();
            if(estilo != ''){
                $.post("seleciona_estilo.php", {"estilo":estilo}, function(msg){
                    
                    texto='<ul class="list-group list-group-flush col-md-6 text-align: justify">';
                    $.each(msg, function(indice, valor){
                        texto+= '<li class="list-group-item"><b>'+valor.nome_dancarino+'</b> - '+valor.nome_estilo+'';
                        texto+= '<button class="btn btn-outline-info remover_dancarino" value='+valor.id_dancarino+' style="margin-left:50px;">Remover</button></li>';
                    });
                    texto+= '<hr/> </ul>';
                   
                    $("#conteudo").html(texto);
                });
            }else{
                document.location.reload(true);
            }
        });

        $("input[name='trocar_senha']").change(function(){
            if($("input[name='trocar_senha']:checked").val()=='1'){
                $("#trocar_senha").fadeIn();
            }
            else{
                $("input[name='senha_cadastro']").val("");
                $("input[name='confirma_senha']").val("");
                $("#trocar_senha").fadeOut();
            }
        }); 
    });
            
</script>
</head>
<body>
<?php
    include "conexao.php";
    $selectEstilo="SELECT id_estilo, nome_estilo FROM estilo";
    $resultadoEstilo = mysqli_query($conexao,$selectEstilo);
?>
        <div class="container-fluid">
            <center>
            <div class="d-flex justify-content-center">
                <h6 class="display-4">Grupos de Dança</h6>
            </div>
            <?php
                if($_SESSION["permissao"]=="1"){
                    echo'<form name="filtro">
                        <div class="form-group row">
                            <div class="col-auto col-lg-5" style="margin-left: 29%;">
                                <select class="form-control" name="filtro_estilo">
                                    <option label ="::SELECIONE UM ESTILO::"></option>';
                                        while($linhaEstilo = mysqli_fetch_assoc($resultadoEstilo)){
                                            echo '<option value='.$linhaEstilo["id_estilo"].'> '.$linhaEstilo["nome_estilo"].'</option>';
                                        }
                            echo' </select>
                            </div>
                        </div>
                    </form>';
                }
            ?>
            <div id="msg"> </div>
    <?php

        include "conexao.php";

        echo '<div id="conteudo">';
        echo '<ul class="list-group list-group-flush col-md-6 text-align:justify" id="lista">';

        $select = "SELECT dancarino.id_dancarino AS id_dancarino, 
                    dancarino.nome_dancarino AS nome_dancarino, 
                    dancarino.estilo as id_estilo,
                    dancarino.email AS email,
                    estilo.nome_estilo AS nome_estilo 
                    FROM dancarino 
                    INNER JOIN estilo ON dancarino.estilo=estilo.id_estilo";

        if($_SESSION["permissao"]=='2'){
            $select .= " WHERE id_dancarino='".$_SESSION["usuario"]."'";
        }

        $resultado = mysqli_query($conexao,$select);
        
        
        while($linha = mysqli_fetch_assoc($resultado)){
                echo '<li class="list-group-item">
                        <b>'.$linha["nome_dancarino"].'</b> - '.$linha["nome_estilo"].'<br/>
                        Email: '.$linha["email"].'
                        <button class="btn btn-outline-warning alterar_dancarino" value='.$linha["id_dancarino"].' " 
                        data-toggle="modal" data-target="#modal">Alterar</button>';
                        if($_SESSION["permissao"]=='1'){
                            echo'<button class="btn btn-primary remover_dancarino" value='.$linha["id_dancarino"].'>Remover</button>';
                        }
                        echo'</li>';
        }

        echo "<hr/> </ul> </div>";
         
       
$titulo = "Alterar Dançarinos";
$nome_form = "alterar_dancarino.php";
$salvar="dancarino";
include "modal.php";
include "scripts.php";
include "modal_login.php";
        
rodape();

?>
    </center>
</body>
</html>