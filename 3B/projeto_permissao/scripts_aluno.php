<script>

    $(function(){

       function define_alterar_remover(){ 
       
        $(".alterar").click(function(){

            i = $(this).val();
            
            $.get("seleciona_aluno.php?id="+i,function(r){
                a = r[0];                               
                $("input[name='prontuario']").val(a.prontuario);
                $("input[name='nome']").val(a.nome);
                $("input[name='email']").val(a.email);
                $("input[name='data_nascimento']").val(a.data_nascimento);
                $("input[name='sexo'][value='" + a.sexo + "']").attr("checked","true");

            });
        });

        $(".remover").click(function(){
         
           i = $(this).val();
           c = "prontuario";
           t = "aluno";
           p = {tabela: t, id:i, coluna:c}
           console.log(p);
           $.post("remover.php",p,function(r){
               
            if(r=='1'){                
                $("#msg").html("Aluno removido com sucesso.");
                $("button[value='"+ i +"']").closest("tr").remove();
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
                data_nascimento:$("input[name='data_nascimento']").val(),
                sexo:$("input[name='sexo']:checked").val(),
                senha_cadastro: senha
           };        

           $.post("atualizar_aluno.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Aluno alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar aluno.");
            }
           });
       }); 

       function atualizar_tabela(){           
        $.get("seleciona_aluno.php",function(r){
            t = "";
            $.each(r,function(i,a){
                d = moment(a.data_nascimento).format("DD/MM/YYYY");                 
                t += "<tr>";
                t +=    "<td>"+a.prontuario+"</td>";
                t +=    "<td>"+a.nome+"</td>";
                t +=    "<td>"+a.email+"</td>";
                t +=    "<td>"+d+"</td>";
                t +=    "<td>"+a.sexo+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+a.prontuario+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
    <?php if(isset($_SESSION["permissao"]) && $_SESSION["permissao"]=="1"){
            echo "t +=        \" <button class='btn btn-danger remover' value='\"+a.prontuario+\"'>Remover</button>\";";
        }
        ?>
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_aluno").html(t);
            define_alterar_remover();
        });
        }

    });

</script>




