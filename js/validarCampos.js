

function validar() {

 

	var nome = formulario.nomeCliente.value;

	var email = formulario.email.value;

	var telefone = formulario.telefone.value;

	var endereco = formulario.endereco.value;

	var rg = formulario.rg.value;

	if (nome == "") {

		alert("Nome Vazio");
		formulario.nomeCliente.focus();
		event.preventDefault();
		return false;
		    
	}

	if (email =="" || email.indexOf('@') == -1 ) {

		alert("Email vazio");
		formulario.email.focus();
		event.preventDefault();
		return false;
	}


		if (endereco =="" || endereco.length < 3 ) {

		alert("Endereço vazio " + endereco.length);
		formulario.endereco.focus();
		event.preventDefault();
		return false;
	}

		//var string = string.replace(/([a-z])/g, "");
		rg = rg.replace(/([a-z])/g, "");

		//alert("Rg "+rg)

		if (rg =="" || rg.length == 0 ) {

		alert("Rg Invalido " ) //+ rg.length);
		formulario.rg.focus();
		event.preventDefault();
		return false;
	}



 /*
	if (telefone =="" || telefone.length  < 3  ) {

		alert("Telefone vazio" + telefone.length);
		formulario.telefone.focus();
		return false;
	}

 */
 
		return true;
  
	

} // end function validar