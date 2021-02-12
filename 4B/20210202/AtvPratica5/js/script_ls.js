$(function() {

	$(".modalbtn").click(function() {
        $(".modal").css("display", "block");
    });

	$(".close").click(function() {
        $(".modal").css("display", "none");
    });

	$(".cancelbtn").click(function() {
        $(".modal").css("display", "none");
    });
	
	$(window).click(function(event) {
		//var target = event.target;
		//if (target.className=="modal") {
			//$(".modal").css("display", "none");
		//}
		var target = $(event.target);
		if(target.is($(".modal"))) {
			$(".modal").css("display", "none");
		}
	});

	$("#submeter").click(function(){
		if($("#lembrete").is(":checked")){
			let email64 = btoa($("#email").val()); //criptografando para base64
			
			//colocando data e email juntos p/ ficar mais fácil
			let usuario = {"email":email64, "data":Date.now()};

			//não pode gravar obj no localstorage então tranfomamos o json em uma string
			localStorage.setItem("usuario", JSON.stringify(usuario));

			//localStorage.setItem("email", email64); // chave e valor
			//Date.now();
			//localStorage.setItem("data", Date.now());
		}else{
			if(localStorage.getItem("usuario")){
				localStorage.remove("usuario");	
			}
		}
	});

	getItemLocalStorange();
	/*localStorage - só pode ser acessado do lado cliente; não tem validade*/

});
 function getItemLocalStorange(){
	
	var usuario = JSON.parse(localStorage.getItem("usuario")); // convertendo p/ obj
	var email = atob(usuario.email);
	var data = usuario.data;
	 if(localStorage.getItem("usuario")){

		
		let dataAtual = Date.now();
		// 1 dia tem 86400000 milissegundos
		if((dataAtual - data) <= (86400000*2)){
			//let email = atob(localStorage.getItem("usuario"));
			$("#email").val(email);
		}else{
			localStorage.remove("usuario");
		}
	 }
 }