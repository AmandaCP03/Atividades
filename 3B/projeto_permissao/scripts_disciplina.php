<script>

    $(function(){
       function define_alterar_remover(){ 
        $(".alterar").click(function(){
            i = $(this).val();            
            $.get("seleciona_disciplina.php?id="+i,function(r){
                a = r[0];                               
                $("input[name='id_disciplina']").val(i);
                $("input[name='nome']").val(a.nome);
                $("textarea[name='descricao']").val(a.descricao);                
            });
        });

        $(".remover").click(function(){
         
           i = $(this).val();
           c = "id_disciplina";
           t = "disciplina";
           p = {tabela: t, id:i, coluna:c}
           $.post("remover.php",p,function(r){
               
            if(r=='1'){                
                $("#msg").html("Disciplina removida com sucesso.");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
            else{
                $("#msg").html("Falha ao remover Disciplina.");                
            }
           });
       }); 

       }

       define_alterar_remover();

       $(".salvar").click(function(){ 
           p = {
                id_disciplina:$("input[name='id_disciplina']").val(),
                nome:$("input[name='nome']").val(),
                descricao:$("textarea[name='descricao']").val(),                
           };        
           
           $.post("atualizar_disciplina.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Disciplina alterada com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar disciplina.");                
            }
           });
       }); 

       function atualizar_tabela(){   
                
        $.get("seleciona_disciplina.php",function(r){
            t = "";
            $.each(r,function(i,v){                
                t += "<tr>";
                t +=    "<td>"+v.disciplina+"</td>";
                t +=    "<td>"+v.descricao+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+v.id_disciplina+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                t +=        " <button class='btn btn-danger remover' value='"+v.id_disciplina+"'>Remover</button>";
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_disciplina").html(t);
            
            define_alterar_remover();
        });
        }

    });

</script>




