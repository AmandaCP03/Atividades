<?php
    session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../../jquery-3.5.1.min.js"></script>
        <title>API Nomes</title>
    </head>
    <script>
         $(document).ready(function(){  
            $("input[name='nome']").focus();
            $("input[name='nome']").blur(function(){
                if($("input[name='nome']").val() == ""){
                    $("input[name='nome']").focus();
                }else{
                    //$("#data").change(function(){
                        var data = $("input[name='data']").val().replace(/\D/g, '');
                        var nome = $("input[name='nome']").val().toUpperCase();
                        console.log(nome);
                        if(data != ""){
                            $.getJSON("https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking/?decada="+data+"", function(resultado){
                                $("#table #tr").remove();
                                for(i=0; i<20; i++){
                                    AddTableRow(resultado[0].res[i], nome);
                                    
                                }
                            });
                        }else{
                            $("#data").val("1930");
                        }
                    //});     
                }
            });
            function AddTableRow(resultado, nome){
                var newRow = $("<tr id='tr'>");
                var cols = "";
                cols += '<td>'+(resultado.ranking)+'</td>';
                if(nome == resultado.nome){
                    cols += '<td style="color:green; font-weight:bold;">'+(resultado.nome)+'</td>';
                }else{
                    cols += '<td>'+(resultado.nome)+'</td>';
                }
                cols += '<td>'+(resultado.frequencia)+'</td>';
                newRow.append(cols);
                $("#table").append(newRow);
                return false;
            }

            $("#data").change(function(){
                var data = $("input[name='data']").val().replace(/\D/g, '');
                var nome = $("input[name='nome']").val().toUpperCase();
                console.log(nome);
                if(data != ""){
                    $.getJSON("https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking/?decada="+data+"", function(resultado){
                        $("#table #tr").remove();
                        for(i=0; i<20; i++){
                            AddTableRow(resultado[0].res[i], nome);
                            
                        }
                    });
                }else{
                    $("#data").val("1930");
                }
            }); 

        });
            
    </script>
    <body>
        <input id="nome" type="text" name="nome" placeholder="Digite um nome..." />
        <input id="data" type="number" name="data" min="1930" max="2010" step="10" value="1930"/>
        <hr>
        <table border="1px" id="table">
            <thead>   
                <tr>
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Frequência</th>
                </tr>
                <tr id="tr">
                    <td colspan="3">Preencha o nome e o ano para saber se este nome esta entre os 20 mais frequentes da década</td>
                </tr>
            </thead>
        </table>
    </body>
</html>