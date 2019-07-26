
	function validarCidade(cidade){

		//alert(cidade);

		if(cidade =="" || cidade =="selecione uma cidade" || cidade =="registre uma cidade" || cidade == null){
			alert("cidade");
		} // if


		 //listar endereços
      $("#cep").keyup(function(){
       // alert("teste");
        // select cidade
        var cidade = $("#cidades option:selected").val();


        if(cidade =="" || cidade =="registre uma cidade" || cidade==null){

             alert("Selecione uma Cidade");

        }

        else {

         var bairro = $("#bairro option:selected").val();

         if(bairro =="" || bairro =="Selecione um bairro" || bairro==null){

             alert("Selecione um bairro");

         } // if


        }

        var rua = $("#endereco").val()
        var teste = $("#bairro option:selected").val();
        var cep = $("#cep").val();

 
         //alert(teste);

        //var QtdAcomodacaoD = $("#cidades option:selected").val();

       //var QtdAcomodacaoD = "CE";
      //  alert(QtdAcomodacaoD);

    //var nome = $("#test").val();

    //var nome =  $("#cidades").val();

    //alert("Value: " + nome);

    //alert("uia");    




    //console.log("bairro selecionado: "+teste);
   $("#cep").autocomplete({
    


     // fonte dos dados
     source: "buscar_cep_logradouro.php?rua="+rua+"&teste=" + teste +"&cep="+cep+ "",

      });

    //console.log("Cep: "+cep);
 
     }); // listar ruas
 
 

	} // function

$( document ).ready(function() {

	$("#cep").focusout(function() {

		var estado = $("#estados");
		var cidade = $("#cidades");
		var cep = $("#cep").val();

	//	validarCidade(cidade.val());

	//alert(cidade.val());
 
	}); // function cep


     $("#cep").keyup(function(){

     	var cidade = $("#cidades").val();

     	validarCidade(cidade);
     });
	
})
