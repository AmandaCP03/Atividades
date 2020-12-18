<script>

    $(function(){
       function define_alterar_remover(){ 
        $(".alterar").click(function(){
            i = $(this).val();
            console.log(i);
            $.get("seleciona_professor.php?id="+i,function(r){
                a = r[0];                               
                $("input[name='prontuario']").val(a.prontuario);
                $("input[name='nome']").val(a.nome);
                $("input[name='email']").val(a.email);
                $("select[name='formacao']").val(a.formacao);
            });
        });


        $(".remover").click(function(){
         
           i = $(this).val();
           c = "prontuario";
           t = "professor";
           p = {tabela: t, id:i, coluna:c}
           console.log(p);
           $.post("remover.php",p,function(r){
               
            if(r=='1'){                
                $("#msg").html("Professor removido com sucesso.");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
            else{
                $("#msg").html("Falha ao remover professor. Este professor está vinculado a uma disciplina.");
                console.log(r);
            }
           });
       }); 

       }

       define_alterar_remover();

       $(".salvar").click(function(){ 
        var senha = $("input[name='senha_cadastro']").val();
           if(senha!=""){
               senha = $.md5(senha);
           }
           p = {
                prontuario:$("input[name='prontuario']").val(),
                nome:$("input[name='nome']").val(),
                email:$("input[name='email']").val(),
                formacao:$("select[name='formacao']").val(),
                senha_cadastro:senha
           };        
           
           $.post("atualizar_professor.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Professor alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar professor.");
                console.log(r);
            }
           });
       }); 

       function atualizar_tabela(){           
        $.get("seleciona_professor.php",function(r){
            t = "";
            $.each(r,function(i,v){                
                t += "<tr>";
                t +=    "<td>"+v.prontuario+"</td>";
                t +=    "<td>"+v.nome+"</td>";
                t +=    "<td>"+v.email+"</td>";
                t +=    "<td>"+v.formacao+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+v.prontuario+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
        <?php 
        if(isset($_SESSION["permissao"]) && $_SESSION["permissao"]=="1"){
            echo "t +=        \" <button class='btn btn-danger remover' value='\"+v.prontuario+\"'>Remover</button>\";";
        }
        ?>
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_professor").html(t);
            define_alterar_remover();
        });
        }

    });

</script>




