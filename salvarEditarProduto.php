<?php 

	$nomeProduto = $_POST["nomeProduto"];
	$precoCompraProduto = $_POST["precoCompraProduto"];
	$precoProdutoVenda = $_POST["precoProdutoVenda"];
	$quantidade = $_POST["quantidade"];
	$data = $_POST["data"];
    $descricaoProduto = $_POST["descricaoProduto"];
    $id = $_POST["id"];

	$quantidadeEmEstoque = $_POST["quantidadeEmEstoque"];
	$quantidadeMinimaEstoque = $_POST["quantidadeMinimaEmEstoque"];


	echo "Produto: " .$nomeProduto;
	echo "Preço produto compra: " .$precoCompraProduto;
	echo "Preço produto venda: " .$precoProdutoVenda;
	echo "quantidade entrada produto: " .$quantidade ."<br>";
	echo "quantidade em estoque: " .$quantidadeEmEstoque ."<br>";
	echo "quantidade minima em estoque: " .$quantidadeMinimaEstoque ."<br>";
	echo "data: " .$data;
	echo "descricao produto: " .$descricaoProduto;
	echo "Id: " .$id;


  $servername = "localhost";
  $database = "sistemaDeVendas";
  $username = "root";
  $password = "tibe";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //echo "<br>Connected successfully";

/*
	$up = mysql_query("UPDATE tabela_produto SET nome_produto='$nomeProduto', descricao_produto='$descricaoProduto', preco_de_compra_produto='$precoCompraProduto', preco_de_venda_produto='$precoProdutoVenda' quantidade_entrada_produto='$quantidade', data_entrada_produto='$data',id_categoria_produto='1' WHERE id_produto = '$id'");	
*/

	 	  $valor = str_replace('.','', $precoCompraProduto);
          $valorPrecoCompra = str_replace(',','.', $valor);

	 	  $valor1 = str_replace('.','', $precoProdutoVenda);
          $valorPrecoVenda = str_replace(',','.', $valor1);



	$sql = "UPDATE tabela_produto set nome_produto ='$nomeProduto', descricao_produto='$descricaoProduto', preco_de_compra_produto='$valorPrecoCompra', preco_de_venda_produto='$valorPrecoVenda',quantidade_minima_estoque_produto='$quantidadeMinimaEstoque' , quantidade_produto_estoque_produto='$quantidadeEmEstoque' , quantidade_entrada_produto='$quantidade',   data_entrada_produto='$data'  where id_produto = '$id'";

 
   	$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

	echo "<br>". $sql ."AVA";	


	$sql ="select quantidade_entrada_produto, quantidade_produto_estoque_produto from tabela_produto where id_produto ='$id'";

		$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

	while ($registro = mysqli_fetch_array($resultado))
   { 
   		$quantidadeEntradaProduto = $registro["quantidade_entrada_produto"];
   		$quantidadeEstoqueProduto = $registro["quantidade_produto_estoque_produto"];

   		echo "<br><br>" ."Quantidade entrada produto: " .$quantidadeEntradaProduto;

   		echo "<br><br>" ."Quantidade em estoque do produto: " .$quantidadeEstoqueProduto;


   		$estoque = $quantidadeEntradaProduto + $quantidadeEstoqueProduto;

   		echo "<br><br>" ."Estoque: " .$estoque;

   		$sql ="update tabela_produto set quantidade_produto_estoque_produto='$estoque' where id_produto='$id'";

		$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");


 
   }


  	mysqli_close($conn);

?>
