<?php
    session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../../jquery-3.5.1.min.js"></script>
        <title>Lista de frutas</title>
    </head>
    <script>
        $(document).ready(function(){
            $("#salvar").click(function(){
                var fruta=$("input[name='fruta']").val();
                //console.log(fruta);
                $.get("salvar.php", {"fruta": fruta}, function(msg){                
                    $("#mensagem").html(msg);
                    $("#campo").val("");
                });
            });
                
        });
            
    </script>
    <body>
        <input id="campo" type="text" name="fruta" placeholder="Cadastre uma fruta..." />
        <button id="salvar">Cadastro assíncrono</button>
        <hr>
        <div id="mensagem" class="mensagem"></div>
        <a href="encerra.php">Finalizar</a>
    </body>
</html>