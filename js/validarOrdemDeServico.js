 

$( document ).ready(function() {


	$("#botao").on('click', function() {


	//alert("teste");
  


       //$("#statusOpscao").find('input').val('');
	var a = $("#status").val();

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

});
