<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../../jquery-3.5.1.min.js"></script>
        <title>Endereços</title>
    <script>
        $(document).ready(function(){             
            $("#cep").blur(function(){
                var cep = $("input[name='cep']").val().replace(/\D/g, '');
                if(cep !=""){
                    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(resultado){
                        $("#endereco").val(resultado.logradouro);
                        $("#bairro").val(resultado.bairro);
                        $("#cidade").val(resultado.localidade);
                        $("#estado").val(resultado.uf);
                        $("#numero").focus();
                    });
                }else{
                    $("#cep").val("");
                }
            });  
        });
            
    </script>
    </head>
    <body>
        <!--<form name="formulario">-->
            <h2>Endereço </h2>
                            
            <input type="text" id="cep" name="cep" placeholder="CEP" value="" maxlength="9"/><br/><br/>
            <input type="text" id="endereco" name="endereco" placeholder="Endereco"/><br/><br/>
            <input type="number" id="numero" name="numero" placeholder="Número"/><br/><br/>
            <input type="text" id="bairro" name="bairro" placeholder="Bairro"/><br/><br/>
            <input type="text" id="cidade" name="cidade" placeholder="Cidade"/><br/><br/>
            <input type="text" id="estado" name="estado" placeholder="Estado"/><br/><br/>
        <!--</form>-->
    </body>
</html>