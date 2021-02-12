$(document).ready(function(){

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
      
    
    
});