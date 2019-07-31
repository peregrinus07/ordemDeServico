<?php 

	$nomeCliente = $_POST["nomecliente"];
	$nomeFuncionario = $_POST["resopnsavelServico"];
	$status = $_POST["status"];
	$dataInicial = $_POST["dataInicial"];
	$dataFinal = $_POST["dataFinal"];
	$garantia = $_POST["garantia"];
	$descricao = $_POST["descricaoServic"];
	$defeito = $_POST["defeito"];
    $observacao = $_POST["observacao"];


    $id = $_POST["id"];
    $id1 = $_GET["id"];

	$laudo = $_POST["laudoTecnico"];
	$quantidadeMinimaEstoque = $_POST["quantidadeMinimaEmEstoque"];


	echo "Id: " .$id1 ."<br>";
	echo "Cliente: " .$nomeCliente ."<br>";
	echo "Funcionario: " .$nomeFuncionario ."<br>";
	echo "Status: " .$status ."<br>";
	
	/*echo "Preço produto compra: " .$precoCompraProduto;
	echo "Preço produto venda: " .$precoProdutoVenda;
	echo "quantidade entrada produto: " .$quantidade ."<br>";
	echo "quantidade em estoque: " .$quantidadeEmEstoque ."<br>";
	echo "quantidade minima em estoque: " .$quantidadeMinimaEstoque ."<br>";
	*/
	echo "data inicial: " .$dataInicial;
	echo "<br>data Final: " .$dataFinal;
	echo "<br>garantia: " .$garantia;
	echo "<br>descricao: " .$descricao;
	echo "<br>defeito: " .$defeito;
	echo "<br>observação: " .$observacao;
	echo "<br>laudo: " .$laudo."<br>";

/*
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

/*	 	  $valor = str_replace('.','', $precoCompraProduto);
          $valorPrecoCompra = str_replace(',','.', $valor);

	 	  $valor1 = str_replace('.','', $precoProdutoVenda);
          $valorPrecoVenda = str_replace(',','.', $valor1);


*/
	$sql = "UPDATE ";
 
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
