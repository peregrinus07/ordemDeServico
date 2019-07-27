 
$( document ).ready(function() {

	$("input.data").mask("99/99/9999");
       // $("input.cpf").mask("999.999.999-99");
 
        $("input[name='rg'").mask("999.999.999-99"); 

        $("input[name='cpf'").mask("999.999.999-99");

        $("input[name='cep'").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');

         $("input[name='telefone']").mask("(99) 999.999-999");
  
         $("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

 
          $("input[name='cep'").keypress(function(){
        
            $("input[name='cep'");
         });


});
	 


