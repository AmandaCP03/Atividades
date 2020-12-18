<?php
include "conf.php";
cabecalho();

if(!isset($_SESSION["usuario"])){
    echo"<script>location.href='index.php'</script>";
}
?>
        <div class="container-fluid">
            <center>
            <div class="d-flex justify-content-center">
                <h6 class="display-4">Estilos de Dança</h6>
            </div>  
            <div id="msg"></div>
    <?php

        include "conexao.php";

        echo '<ul class="list-group list-group-flush col-md-6 text-align: justify" id="lista">';
        $select = "SELECT nome_estilo, id_estilo FROM estilo ORDER BY nome_estilo";

        $resultado = mysqli_query($conexao,$select);
        while($linha = mysqli_fetch_assoc($resultado)){
                echo '<li class="list-group-item">'.$linha["nome_estilo"].'';
                        if($_SESSION["permissao"]=='1'){
                            echo'<button class="btn btn-outline-warning alterar_estilo" value='.$linha["id_estilo"].' style="margin-left:50px;" 
                            data-toggle="modal" data-target="#modal">Alterar</button>                        
                            <button class="btn btn-primary remover_estilo" value='.$linha["id_estilo"].'>Remover</button>';
                        }
                        echo'</li>';
        }

        echo "<hr/> </ul>";
         
       
    

$titulo = "Alterar Estilo";
$nome_form = "alterar_estilo.php";
$salvar="estilo";
include "modal.php";
include "scripts.php";

rodape();
?>
            </center>
        </div>
</body>
</html>