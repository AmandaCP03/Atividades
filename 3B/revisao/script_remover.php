<script>

    $(function(){
       $(".remover_apresentacao").click(function(){
           i = $(this).val();
           c = "id_apresentacao";
           t = "apresentacao";
           p = {tabela: t, id:i, coluna:c}
           $.post("remover.php",p,function(r){
            if(r=='1'){                
                $("#msg").html("<b>Apresentação removida com sucesso.</b>").css({color:"green"});
                $("button[value='"+ i +"']").closest("div.card").remove();
            }else{
                $("#msg").html("<b>Esta ação não pode ser concluída</b>").css({color:"red"});
            }
           });
       }); 

       $(".remover_dancarino").click(function(){
           i = $(this).val();
           c = "id_dancarino";
           t = "dancarino";
           p = {tabela: t, id:i, coluna:c}
           $.post("remover.php",p,function(r){
            if(r=='1'){                
                $("#msg").html("<b>Dancarino removido com sucesso.</b>").css({color:"green"});
                $("button[value='"+ i +"']").closest("li").remove();
            }else{
                $("#msg").html("<b>Esta ação não pode ser concluída</b>").css({color:"red"});
            }
           });
       });

       $(".remover_estilo").click(function(){
           i = $(this).val();
           c = "id_estilo";
           t = "estilo";
           p = {tabela: t, id:i, coluna:c}
           $.post("remover.php",p,function(r){
            if(r=='1'){                
                $("#msg").html("<b>Estilo removido com sucesso.</b>").css({color:"green"});
                $("button[value='"+ i +"']").closest("li").remove();
            }else{
                $("#msg").html("<b>Esta ação não pode ser concluída</b>").css({color:"red"});
            }
           });
       });
    });

</script>

