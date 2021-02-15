
$(document).ready(function(){
        var sessao=$("#sessao").val();

        if(sessao==" "){
            if(localStorage.getItem("usuario")){
                if(sessionStorage.getItem("sessao")){
                    var url_atual=window.location.href;
                    if(sessionStorage.getItem("sessao")!=url_atual){
                        var url=window.location.href;
                        sessionStorage.setItem("sessao", url);
                        var usuario = JSON.parse(localStorage.getItem("usuario"));
                        var dataPrimeira = usuario.dataPrimeira;
                        var cont = usuario.contador;
                        let dataAtual = Date.now();
                        let tempoDecorrido =  dataAtual-dataPrimeira;
                
                        if(tempoDecorrido>2592000000 /*10000*/){
                            localStorage.removeItem("usuario");
                           
                        }
                        else{
                            if(cont<5){
                                cont++;
                                usuario = {"usuario":"cookie"+cont,"dataPrimeira":dataPrimeira, "data":Date.now(), "contador":cont };
                                localStorage.setItem("usuario", JSON.stringify(usuario));	
                                
                            }
                            else{
                                $(".modal").css("display", "block");
                            }
                           
                        }
                    }
                }
                else{
                    var url=window.location.href;
                    sessionStorage.setItem("sessao", url);
                    var usuario = JSON.parse(localStorage.getItem("usuario"));
                    var dataPrimeira = usuario.dataPrimeira;
                    var cont = usuario.contador;
                    let dataAtual = Date.now();
                    let tempoDecorrido =  dataAtual-dataPrimeira;
            
                    if(tempoDecorrido>2592000000 /*10000*/){
                        localStorage.removeItem("usuario");
                       
                    }
                    else{
                        if(cont<5){
                            cont++;
                            usuario = {"usuario":"cookie"+cont,"dataPrimeira":dataPrimeira, "data":Date.now(), "contador":cont };
                            localStorage.setItem("usuario", JSON.stringify(usuario));	
                            
                        }
                        else{
                            $(".modal").css("display", "block");
                        }
                       
            
                    }
                }
            }else{
                var url=window.location.href;
                var cont=0;
                let usuario = {"usuario":"cookie"+cont,"dataPrimeira":Date.now(), "contador":cont};
                localStorage.setItem("usuario", JSON.stringify(usuario));	
                sessionStorage.setItem("sessao", url);
            }
        }
        else{
            if(sessao!="pagina_errada"){
                if(localStorage.getItem("usuario")){
                    localStorage.removeItem("usuario"); 
                }
            }
        }

    $("form *").attr("required","required");
    
    $(".cad_assinante").click(function() {
        var senha=$("input[name='senha_cad']").val();
        var confirmacao_senha =$("input[name='confirmar_senha']").val();
        var cpf = $("input[name='cpf']").val();
        var nome =  $("input[name='nome_cad']").val();
        var email = $("input[name='email_cad']").val();

            if(cpf!=""&&nome!=""&&email!=""&&senha!=""&&confirmacao_senha!=""){
                if(senha==confirmacao_senha){
                    senha = $.md5(senha);
                    $.post("validar_cpf.php",{"cpf":cpf}, function(m){
                        if(m=="CPF valido"){
                            p = {
                                cpf:cpf,
                                nome: nome,
                                email: email,
                                data: $("input[name='data_cad']").val(),
                                senha_cod:senha
                            };
                            $.post("select.php",p, function(msg){
                                if(msg=="0"){
                                    texto ="<div class='alert alert-danger'role='alert'>CPF já cadastrado, digite outro</div>";
                                    $(".msg").html(texto);
                                }
                                else{
                                    if(msg=="1"){
                                        texto ="<div class='alert alert-danger'role='alert'>Email já Cadastrado, digite outro</div>";
                                        $(".msg").html(texto);
                                    }
                                    else{
                                        if(msg=="2"){
                                            $.post("insere.php",p, function(retorno){
                                                $(".msg").html(retorno);
                                            });
                                        }
                                    }
                                }
                            });
                        }
                        else{
                            texto ="<div class='alert alert-danger'role='alert'>CPF inválido, digite outro</div>";
                            $(".msg").html(texto);
                        }
                    });
                   
                    
                }else{
                    texto ="<div class='alert alert-danger'role='alert'>Confirmação de senha incorreta</div>";
                    $(".msg").html(texto);
                }
            }
            else{
                texto ="<div class='alert alert-danger'role='alert'>Preencha todos os campos</div>";
                $(".msg").html(texto);
            }
    });

    $("#autenticar").submit(function(evento) {
        var senha= $("input[name='senha']").val();      
        senha = $.md5(senha);
		$("input[name='senha']").val(senha);

		evento.preventDefault(); 

		var dados = {"email":$("input[name='email']").val(),
					"senha":$("input[name='senha']").val()
				};
                

			
		$.post("autenticacao.php", dados, function(retorno){
			if( retorno == "0"){
				window.location.href ="index.php";
			}
			else{
				$("#erro").html('<div id="erro" class="alert alert-danger col-6 text-center" role="alert">Credenciais Inválidas</div>');
				$("input[name='submeter']").val("Login...");
			}
		});	
		$("input[name='submeter']").val("Logando...");
	});
});