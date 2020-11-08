<?php
include "conf.php";

cabecalho();
?>
        <div class="container-fluid">
            <center>
            <div class="d-flex justify-content-center">
                <h6 class="display-4">Estilos de Dança</h6>
            </div>

    <?php

        include "conexao.php";

        $select = "SELECT nome_estilo FROM estilo ORDER BY nome_estilo";

        $resultado = mysqli_query($conexao,$select);

        echo '<ul class="list-group list-group-flush col-md-6 text-align: justify">';
        while($linha = mysqli_fetch_assoc($resultado)){
                echo '<li class="list-group-item">'.$linha["nome_estilo"].'</li>';
        }

        echo "<hr/> </ul>";
         
       
    
rodape();

?>
    </center>
</body>
</html>