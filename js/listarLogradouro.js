
	function carregarEstados(){

		var estado = $("#estados").val();

	if(estado ==""){

		//alert("vazio");

		$("#estados").load("listaEstados.html");

	}

	if(estado !=""){

	//alert(estado)		
	}

	

	} // func

$( document ).ready(function() {

	carregarEstados();
	
})