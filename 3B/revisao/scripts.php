
<script>

    $(function(){
        function define_alterar_remover(){
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

            ///////////////////////////////////////////////////////////

            $(".alterar_estilo").click(function(){
                i = $(this).val();
                $.get("selecionar_estilo.php?id="+i,function(r){
                    
                    a = r[0];                               
                    $("input[name='id_estilo']").val(a.id_estilo);
                    $("input[name='nome_estilo']").val(a.nome_estilo);

                });
            });

            $(".alterar_dancarino").click(function(){
                i = $(this).val();
                $.get("selecionar_dancarino.php?id="+i,function(r){
                    a = r[0];                           
                    $("input[name='id_dancarino']").val(a.id_dancarino);
                    $("input[name='nome_dancarino']").val(a.nome_dancarino);
                    $("select[name='estilo']").val(a.id_estilo);
                    $("input[name='email']").val(a.email);
                    $("input[name='senha']").val(a.senha);
                });
            });

            $(".alterar_apresentacao").click(function(){
                i = $(this).val();
                $.get("selecionar_apresentacao.php?id="+i,function(r){
                    a = r[0];     
                    $("input[name='id_apresentacao']").val(a.id_apresentacao); 
                    //$("input[name='nome_estilo']").val(a.nome_estilo);                     
                    $("select[name='dancarino']").val(a.id_dancarino);
                    $("input[name='dia']").val(a.dia);
                    $("input[name='hora']").val(a.hora);
                    console.log(a.dia);
                });
            });

            
        }

        define_alterar_remover();

        $(".salvar_estilo").click(function(){ 
           p = {
                id_estilo:$("input[name='id_estilo']").val(),
                nome_estilo:$("input[name='nome_estilo']").val()
           };        
           
           $.post("atualizar_estilo.php",p,function(r){
            if(r=='1'){
                $("#msg").html("<b>Estilo alterado com sucesso!</b>").css({color:"green"});
                $(".close").click();
                atualizar_estilo();                
            }else{
                $("#msg").html("<b>Falha ao atualizar estilo.</b>").css({color:"red"});
            }
           });
       });

       $(".salvar_dancarino").click(function(){ 
           var senha_cad = $("input[name='senha_cadastro']").val();
           if(senha_cad != ""){
            senha_cad = $.md5(senha_cad);
           }
           p = {
                id_dancarino:$("input[name='id_dancarino']").val(),
                nome_dancarino:$("input[name='nome_dancarino']").val(),
                id_estilo:$("select[name='estilo']").val(),
                email:$("input[name='email']").val(),
                senha:senha_cad
           };
           $.post("atualizar_dancarino.php",p,function(r){
            if(r=='1'){
                $("#msg").html("<b>Dançarino alterado com sucesso!</b>").css({color:"green"});
                $(".close").click();
                atualizar_dancarino();                
            }else{
                $("#msg").html("<b>Falha ao atualizar dançarino.</b>").css({color:"red"});
                $(".close").click();
            }
           });
       }); 

       $(".salvar_apresentacao").click(function(){ 
           p = {
                id_apresentacao:$("input[name='id_apresentacao']").val(),
                dancarino:$("select[name='dancarino']").val(),
                dia:$("input[name='dia']").val(),
                horario:$("input[name='hora']").val()
           }; 
           $.post("atualizar_apresentacao.php",p,function(r){
            if(r=='1'){
                $("#msg").html("<b>Apresentacao alterada com sucesso!</b>").css({color:"green"});
                $(".close").click();
                atualizar_apresentacao();                
            }else{
                $("#msg").html("<b>Falha ao atualizar apresentacao.</b>").css({color:"red"});
            }
           });
       }); 

       function atualizar_estilo(){           
        $.get("selecionar_estilo.php",function(r){
            t = "";
            $.each(r,function(i,a){    
                t += "<li class='list-group-item'>"+a.nome_estilo+"";
                t +=   "<button class='btn btn-outline-warning alterar_estilo' value='"+a.id_estilo+"' style='margin-left:50px;'  data-toggle='modal' data-target='#modal'>Alterar</button>";
                t +=   " <button class='btn btn-primary remover_estilo' value='"+a.id_estilo+"'>Remover</button>";
                t += "</li>";
            });            
            $("#lista").html(t);
            define_alterar_remover();
        });
        }

        function atualizar_dancarino(){           
        $.get("selecionar_dancarino.php",function(r){
            t = "";
            $.each(r,function(i,a){  
                
                t += "<li class='list-group-item'>";
                t +=   "<b>"+a.nome_dancarino+"</b> - "+a.nome_estilo;
                t +=    "<p>"+a.email+"</p>"
                t +=   "<button class='btn btn-outline-warning alterar_dancarino' value='"+a.id_dancarino+"' style='margin-left:50px;'  data-toggle='modal' data-target='#modal'>Alterar</button>";
                if($_SESSION["permissao"]=='1'){
                    t +=   " <button class='btn btn-primary remover_dancarino' value='"+a.id_dancarino+"'>Remover</button>";
                }
                t += "</li>";
            });            
            
            $("#lista").html(t);
            define_alterar_remover();
        });
        }

        function atualizar_apresentacao(){           
        $.get("selecionar_apresentacao.php",function(r){
            t = "";
            $.each(r,function(i,a){  
                t += "<div class='card text-center col-lg-6' style='margin-bottom:40px;'>";
                t += "  <h5 class='card-header' style='background-color:rgb(212, 212, 212); '>";
                t += "      <b>"+a.nome_dancarino+"</b> - "+a.nome_estilo+"</h5>";
                t += "  <div class='card-body'>";
                t += "      <p><b>Dia: </b>"+a.dia+" <b> às </b> "+a.hora+"</p>";
                t += "  </div>";
                t += "<button class='btn btn-outline-warning alterar_apresentacao' value='+a.id_apresentacao+' data-toggle='modal' data-target='#modal' style='margin-bottom:10px;' >Alterar</button>";
                t += "<button class='btn btn-primary remover_apresentacao' value='+a.id_apresentacao+'>Remover</button>";
                t += "</div>";
            });            
            
            $("#lista").html(t);
            define_alterar_remover();
        });
        }

    });

</script>

