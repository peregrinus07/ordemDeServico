
$( document ).ready(function() {
//listar endereços


    $("#descricao").keyup(function(){

        cidade = $("#descricao").val();
        //$("#observacao").append("ava");
        str = cidade;
        //console.log(cidade.length);

       
        //a = cidade.trim();
        
        b = cidade.replace("  ", " ");  
         document.getElementById("descricao").value=b;

         //alert(cidade.trim())
    }); 


    $("#defeito").keyup(function(){

        cidade = $("#defeito").val();
        //$("#observacao").append("ava");

        //a = cidade.trim();
        b = cidade.replace("  ", " ");  
         document.getElementById("defeito").value=b;

         //alert(cidade.trim())
    }); 

    $("#observacao").keyup(function(){

        cidade = $("#observacao").val();
        //$("#observacao").append("ava");
         
        a = cidade.replace("  "," ");
         document.getElementById("observacao").value=a;

        //alert(cidade.trim())
    }); 


    $("#laudoTecnico").keyup(function(){

        cidade = $("#laudoTecnico").val();
        //$("#observacao").append("ava");
         
        a = cidade.replace("  "," ");
         document.getElementById("laudoTecnico").value=a;

        //alert(cidade.trim())
    }); 


	 $("#resopnsavelServico").keyup(function(){

            cidade = $("#resopnsavelServico").val();
	 
	     //alert(cidade);

	 $("#resopnsavelServico").autocomplete({
     
	      // fonte dos dados
      source: "pesquisar_usuario.php?cidade="+cidade+"",

	   });
 

       

	}); // function resposavel servico



      $("#nomeCliente").keyup(function(){
   
	//alert();

         // select cidade
         //var cidade = $("#cidades option:selected").val();
		cidade = $("#nomeCliente").val();


	//alert(cidade);
         /*if(cidade =="" || cidade =="registre uma cidade" || cidade==null){

              alert("Selecione uma Cidade");

         }

         else {

          var bairro = $("#bairro option:selected").val();

          if(bairro =="" || bairro =="Selecione um bairro" || bairro==null){

              alert("Selecione um bairro");

          } // if


         }

*/
         //var teste = $("#bairro option:selected").val();

          //alert(teste);

         //var QtdAcomodacaoD = $("#cidades option:selected").val();

        //var QtdAcomodacaoD = "CE";
       //  alert(QtdAcomodacaoD);
 
     //var nome = $("#test").val();

     //var nome =  $("#cidades").val();

     //alert("Value: " + nome);

       // var rua = $("#endereco").val()
        //var teste = $("#bairro option:selected").val();
     //console.log("bairro selecionado: "+teste);

	//alert(cidade);
    $("#nomeCliente").autocomplete({
     
      // fonte dos dados
      source: "pesquisar_cliente.php?cidade="+cidade+"",

       });
 
 

      });

      $("#limparCampos").on('click', function() {

        //alert("teste");
  
      $("#formulario").find('input').val('');

    }); // limpar campos


}); // document
