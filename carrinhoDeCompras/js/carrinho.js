function carregar(id) {

	 
	   // x =  document.getElementById('id');
  //var x = document.getElementsByName("uia").id;

	  var a = "formulario";
	  var b = id;
	  var c = a.concat(b);
 
	var formData = $("formulario").serialize();
	 
	quantidade = $("#quantidade").val();

   a = produto = $("#quantidade").attr("name");
 
//	alert("Quantidade: "+quantidade);
	
	 
 	 
	 $.ajax ({

      type: 'POST',
      dataType: 'html',
      url: 'carrinhoDeCompras.php?acao=up&id=',
      beforeSend: function () {


        //$("#dados").html("Carregando...");
      },

 
 		

      data: formData,
      success: function (msg) {
 
		//alert(msg); 
		
		//$('#atualizar').reload();
			
			//a = $("#atualizar");
		
		
			 alert(msg);
			
		// console.log(msg[1]);			
			
		 $("#atualizar").load(" #atualizar"); 
 
	}         
 
      });


    	
	 

 
}
 