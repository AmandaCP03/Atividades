$(function() {

    var apagar;

	$("#apagar1").click(function() {
        if($('#apagar1').is(':checked')){
            dados={"apagar":"email"};
            $.post("apagar_cookie.php", dados, function(retorno) {
                $('#a1').remove(); //removendo a linha da tebela automaticamente
		    });
        }
        
    });
    $("#apagar2").click(function() {
        if($('#apagar2').is(':checked')){
            dados={"apagar":"tipo"};
            $.post("apagar_cookie.php", dados, function(retorno) {
                $('#a2').remove();
		    });
        }
    });
    $("#apagar3").click(function() {
        if($('#apagar3').is(':checked')){
            dados={"apagar":"cpf"};
            $.post("apagar_cookie.php", dados, function(retorno) {
                $('#a3').remove();
		    });
        }
    });

});