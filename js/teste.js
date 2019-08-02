
$( document ).ready(function() {
//listar endereços

	alert();

$("#nomeCliente").keyup(function(){

 //alert();

var esportes = [
    "Natação",
    "Futebol",
    "Vôlei",
    "BASQUETE"
  ];

 $("#nomeCliente" ).autocomplete({
    source: esportes,
  });




	/*$("#nomeCliente").autocomplete({
  
      // fonte dos dados
//      source: "teste_cliente.php?cidade="+cidade+"",
        source: esportes,

       });
*/

});

}); // document
