$( document ).ready(function() {

	$("#nomeCliente").blur(function() {

 
	var  a = $("#nomeCliente").val().replace(/[^0-9]/g,'');

	if(a==""){

	
	a = $("#idCliente").val();

	}
 
// 	alert(a);

 	$("#teste").html(a);
	$("#idCliente").html("teste");
//  document.getElementById("teste").innerHTML = "ata";
//	$("#idCliente").load(" #idCliente");
	//b = "id: ";
	//a =  b + a;

$("#idCliente").val(a);
$("#teste").html(a);
//location.reload();



	});



});
