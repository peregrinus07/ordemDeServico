$( document ).ready(function() {



	//alert("teste");
  


       //$("#statusOpscao").find('input').val('');
	var a = $("#status").val();


	$("#botao").on('click', function() {

	if(a=="Escolher..."){
		alert("Selecione um status");
		alert(a);
	return false;		
	$("#status").focus();
//$( "#statusOpscao" ).css(  "display", "inline" ).fadeOut( 1000 );
 
}//

	else{
	return true;
}
		

    }); // limpar campos



})