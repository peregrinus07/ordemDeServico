function quantidadeProduto(id){
 
 
	event.preventDefault();

	//window.location.href = "http://pt.stackoverflow.com";

	//window.open("http://pt.stackoverflow.com");
	// Se quiser que o utilizador abra uma janela nova (sem perder a janela de origem), pode usar:
	//window.open("http://pt.stackoverflow.com");

	//$(location).attr('href', 'http://www.sitedesejado.com');

	//location.replace é otimo (prevenindo o history.back) para áreas com autenticação, prevenindo o usuário de voltar a tela de login sem desconectar. E também é muito útil em aplicativos que usam webViews (exemplo: ios, android)

	link = document.getElementById(id);

	link.disable=true;

 	 //event.preventDefault();

	 idProduto = id;

	 quantidadeProduto = document.getElementById(id).value;
 
	//alert("Id: "+idProduto+" "+"quantidadeProduto: "+quantidadeProduto);

 
	$.ajax({

		type: 'GET',
        dataType: 'html',
        url: 'index.php?acao=up',
        data: {quantidade: quantidadeProduto, id: idProduto},

		success: function(data){
        //alert(data);

        $("#carrinho").load(" #carrinho");

        }});

}