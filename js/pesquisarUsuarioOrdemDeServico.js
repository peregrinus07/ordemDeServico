
$( document ).ready(function() {
//listar endereços



	 $("#resopnsavelServico").keyup(function(){
 
            cidade = $("#resopnsavelServico").val();
//	var  a = $("#resopnsavelServico").val().replace(/[^0-9]/g,'');

	var a = $("#resopnsavelServico").val();

//	alert(a);

		 $("#resopnsavelServico").autocomplete({
     
	      // fonte dos dados
      source: "pesquisar_usuario_ordem_de_servico.php?cidade="+cidade+"",

	   });
 



}); // function

	$("#resopnsavelServico").blur(function() {

 var  a = $("#resopnsavelServico").val().replace(/[^0-9]/g,'');

	if(a==""){
 
	a = $("#idTecnico").val();
//alert(a);
	}

 	$("#usuario").html(a);
	$("#idTecnico").val(a);

});		
 
       

}); // document
