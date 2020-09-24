<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exercício Compartilhado</title>

    <style>
        #quadrado{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        #quadrado2{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }

    </style>
    <script src="../../jquery-3.5.1.min.js"></script>
    <script>
        var testa_negrito=0, testa_italico=0, testa_sublinhado=0;
        $(function(){
            $("#campo").keyup(function(){
                $("#quadrado2").html($("#campo").val());
                //$("textarea#ExampleMessage").attr("value", result.exampleMessage);
            });

            $("#negrito").click(function(){
                if(testa_negrito==0){
                    $("#quadrado2").css("font-weight","Bold");
                    testa_negrito=1;
                }else{
                    $("#quadrado2").css("font-weight","normal");
                    testa_negrito=0;
                }
                
            });

            $("#italico").click(function(){
                if(testa_italico==0){
                    $("#quadrado2").css("font-style","italic");
                    testa_italico=1;
                }else{
                    $("#quadrado2").css("font-style","normal");
                    testa_italico=0;
                }
            });

            $("#sublinhado").click(function(){
                if(testa_sublinhado==0){
                    $("#quadrado2").css("text-decoration","underline");
                    testa_sublinhado=1;
                }else{
                    $("#quadrado2").css("text-decoration","none");
                    testa_sublinhado=0;
                }
            });
        });
		
    </script>
</head>
<body>
    <h3> Editor de Texto </h3>
        <!--<button id="botao_teste">Clique para escrever</button>-->
        <img src="negrito.png" id="negrito"/>
        <img src="italico.png" id="italico"/>
        <img src="sublinhado.png" id="sublinhado"/>

        <div style = "display: table">
            <div id="quadrado" style = "display: table-cell;">
                <textarea id="campo" name="campo" placeholder="Digite aqui"></textarea>
            </div>

            <div id="quadrado2" style = "display: table-cell;">  </div>
        </div>
</body>
</html>