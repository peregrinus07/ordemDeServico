<?php

	$id = $_GET["id"];

	echo "Id: ".$id;

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


  	/* $sql = "INSERT INTO tabela_clientes (nome_cliente,cpf_cnpj_cliente,
e_mail_cliente, telefone_cliente) values ('$nome','$cpf','$email','$telefone')";
	 */
	$sql = "select * from tabela_produto where id_produto = '$id'";

     $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

  // printf ("New Record has id %d.\n", mysqli_insert_id($conn));
     //$variavel = mysqli_insert_id;
 
  	 mysqli_close($conn);

	 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $idProduto = $registro["id_produto"];	 
   $nomeProduto = $registro["nome_produto"];
   $precoDeCompraProduto = $registro["preco_de_compra_produto"];
   $precoDeVendaProduto = $registro["preco_de_venda_produto"];
   $quantidadeDoProduto = $registro["quantidade_entrada_produto"];
   $quantidadeEmEstoque = $registro["quantidade_produto_estoque_produto"];
   $quantidadeMinimaEstoque = $registro["quantidade_minima_estoque_produto"];
   
   $dataEntradaProduto = $registro["data_entrada_produto"];
   $descricaoProduto = $registro["descricao_produto"];
   
   //$data = $dataEntradaProduto;
   
   $ano = date('Y', strtotime($dataEntradaProduto));
   $mes = date('m', strtotime($dataEntradaProduto));
   $dia = date('d', strtotime($dataEntradaProduto));
   
   $data1 = $ano . "-" . $mes . "-" . $dia;
   /*
   echo "<br>". $data1 . "<br>";
   echo "Data: ".$data1;
   
   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> nome do produto: ".$nomeProduto."</td>";
   echo "<td> preço produto compra: ".$precoDeCompraProduto."</td>";
   echo "<td> preço produto venda: ".$precoDeVendaProduto."</td>";
   echo "<td> quantidade do produto: ".$quantidadeDoProduto."</td>";
   echo "<td> data entrada produto: ".$dataEntradaProduto."</td>";
   echo "<td> descrição produto: ".$descricaoProduto."</td>";
   echo "</tr>";
   echo "<br>";
   */
 }
  
 echo "</table>";




?>

<html>
<head>
</head>

<body>
	 
	
	<form id="formulario" class="form-group"action="salvarEditarProduto.php" method="POST">
   
		 <!-- <legend style="">Editar Produto</legend> -->
		 
		  
    <div class="form-row">

      <div class="form-group col-md-4">
    <label for="inputAddress">Nome do Produto</label>
    <input   onkeyup="alteraMaiusculo1();" type="text" value="<?php echo $nomeProduto; ?>" onkeyup="alteraMaiusculo(this);" name="nomeProduto" class="form-control" id="inputAddress" placeholder="">
    </div>

<div class="form-group col-md-4">
      <label for="inputAddress">Preço do Produto Compra</label>
      <input  onkeyup="numeros(this);"  value="<?php echo number_format($precoDeCompraProduto,2,',','.') ?>" type="text" name="precoCompraProduto" class="form-control" id="precoProdutoCompra" placeholder="00,00">
    </div>


<div class="form-group col-md-4">
      <label for="inputAddress">Preço do Produto Venda</label>
      <input onkeyup="numeros(this);" value="<?php echo number_format($precoDeVendaProduto,2,',','.') ?>" type="text" name="precoProdutoVenda" class="form-control" id="precoVendaProduto" placeholder="00,00">
    </div>

	


 
     </div><!-- linha -->

    

    <div class="form-row">
    
    <div class="form-group col-md-2">
      <label for="inputPassword4">Quantidade
    </label>
      <input value="<?php echo $quantidadeDoProduto ?>" type="text" onkeyup="numeros1(this);" name="quantidade" class="form-control" id="quantidade" placeholder="0">
    </div>
  
    <div class="form-group col-md-4">
      <label for="inputAddress">Data de Entrada do Produto</label>
      <input value = "<?php echo $data1; ?>" type="date" name="data" class="form-control" id="inputEmail4" placeholder="Venda">
    </div>

 
  </div> <!-- form - row -->
  
  <div class="form-row">
  
	<div class="form-group col-md-4">
      <label for="inputPassword4">Quantidade do Produto em Estoque
    </label>
      <input value="<?php echo $quantidadeEmEstoque ?>" type="text" onkeyup="numeros1(this);" name="quantidadeEmEstoque" class="form-control" id="quantidade" placeholder="0">
    </div>

	<div class="form-group col-md-4">
      <label for="inputPassword4">Quantidade Minima do Estoque
    </label>
      <input value="<?php echo $quantidadeMinimaEstoque ?>" type="text" onkeyup="numeros1(this);" name="quantidadeMinimaEmEstoque" class="form-control" id="quantidade" placeholder="0">
    </div>

  
  
  
  </div> <!-- form - row -->
  
  
  
  
   <div class="form-row">
     
     <label for="exampleFormControlTextarea1 col-md-12">descricao do produto
	</label>
    <textarea   onkeyup="alteraMaiusculo();" name="descricaoProduto" class="form-control" id="exampleFormControlTextarea1" rows="3">
    
		<?php echo $descricaoProduto;  ?>
		
    </textarea>

 
    </div> <!-- linha -->

 
    <div style="margin-top:3%;" class="form-row">
      
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      <button style="margin-left: 2px;" type="button" id="limparCampos" class="btn btn-danger">Limpar Campos</button>
 
    </div> <!-- linha -->     
   
   <input type="hidden" name="id" value="<?php echo $idProduto;  ?>" />
   
<p><a href="cadastrarProduto.php"><p>Cadastrar Produto<p></a><p>
   </div> <!-- form-row -->

		 
	</form>
	
</body>

</html>
