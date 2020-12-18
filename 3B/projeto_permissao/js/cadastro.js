$(function(){
    $(".cadastrar").click(function(){
        var senha=$("input[name='senha_cadastro']").val();
        senha = $.md5(senha);
        $("input[name='senha_cadastro']").val(senha);
        $("form[name='cadastro']").submit();
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