<?php


	//echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';

  include_once("./funcoes/funcoes.php");

$id = teste($_POST["id"]); 
   
$estado = teste($_POST["estado"]);
 
$cidades = teste($_POST["cidades"]);
 
$bairro = teste($_POST["bairro"]);

$idBairro = teste($_POST["idBairro"]);
 
$endereco = teste($_POST["endereco"]);
  
$cep = teste($_POST["cep"]);
	/*
	$nome = teste($_POST["nomeCliente"]);
	$precoCompraProduto = teste($_POST["precoCompraProduto"]);
	$precoProdutoVenda = teste($_POST["precoProdutoVenda"]);
    $quantidade = teste($_POST["quantidade"]);
	$data = $_POST["data"];
	$descricaoProduto = teste($_POST["descricaoProduto"]);
*/
  /*

	$precoCompraProduto1 = str_replace('.', '',$precoCompraProduto);
	$valorCompraProduto = str_replace(',', '.',$precoCompraProduto1);

	$precoProdutoVenda1 = str_replace('.', '',$precoProdutoVenda);
	$valorVendaProduto = str_replace(',', '.',$precoProdutoVenda1);
 */

  /*

	$data2 = date("Y-m-d H:i:s");

*/
  echo "Id: " .$id;
  print_r("<br>");
	echo "Estado: " .$estado;
	echo "<br>";
	echo "Cidade: "   .$cidades;
	echo "<br>";
	echo "Bairro: " .$bairro;
	echo "<br>";
  print_r("Id Bairro: " .$idBairro ."<br>");
	echo "Rua : " .$endereco;
	echo "<br>";
	echo "Cep: " .$cep;
	echo "<br>";
	echo "Data: " .$data;
	echo "<br>";
	echo "Endereco: " .$endereco;
	echo "<br>";
	echo "Numero: " .$numero;
	echo "<br>";
	echo "Estado: " .$estado;
	echo "<br>";
	echo "Cidade: " .$cidade;
	echo "<br>";
	echo "Bairro: " .$bairro;
	echo "<br>";
	echo "Cep: " .$cep;
	echo "<br>";

	//echo "$nome";

	if ($estado =="") {
		echo "vazio: ";
		echo " $estado";
	}

	else {

		echo "Estado: " .$estado;


	}

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
	echo "<br>Connected successfully";


  	/* $sql = "INSERT INTO tabela_clientes (nome_cliente,cpf_cnpj_cliente,
e_mail_cliente, telefone_cliente) values ('$nome','$cpf','$email','$telefone')";
	 */
/*
	$sql = "INSERT INTO tabela_produto (nome_produto,descricao_produto,preco_de_compra_produto,preco_de_venda_produto, quantidade_entrada_produto,data_entrada_produto

) values ('$nome','$descricaoProduto','$valorCompraProduto','$valorVendaProduto','$quantidade','$data')";

*/

    $endereco = utf8_decode($endereco);

    $sql ="UPDATE tabela_descricao_rua SET nome_da_rua = '$endereco' WHERE id_descricao_rua ='$id'";
 
    mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");

    $id =  mysqli_insert_id($conn);

    printf (" id: %d.\n", mysqli_insert_id($conn));
 

    
    $sql1 = "select * from tabela_produto where id_produto ='$idProduto'";
  
  $resultado1 = mysqli_query($conn,$sql1) or die("Erro ao retornar dados");


 
    $sql1 = "select * from tabela_produto where id_produto ='$idProduto'";
  
 	$resultado1 = mysqli_query($conn,$sql1) or die("Erro ao retornar dados");
 
 	 echo "<br>";
 	 echo "<br>";
 	 echo "teste";


	 // Obtendo os dados por meio de um loop while
 while ($registro1 = mysqli_fetch_array($resultado1))
 {
   $nomeProduto = $registro1['nome_produto'];
   $idProduto = $registro1['id_produto'];
   $descricaoProduto = $registro1['descricao_produto'];
   $precoDeCompraProduto = $registro1['preco_de_compra_produto'];
   $precoDeVenda = $registro1['preco_de_venda_produto'];
   $quantidadeDoProdutoEmEstoque = $registro1['quantidade_produto_estoque_produto'];

   $quantidadeMinimaDoProdutoEmEstoque = $registro1['quantidade_minima_estoque_produto'];

   $quantidadeDeEntradaDoProduto = $registro1['quantidade_entrada_produto'];

    $dataDeEntradaDoProduto = $registro1['data_entrada_produto'];

   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> id do produto: ".$idProduto."</td>";
   echo "<br>";
   echo "<td> nome do produto: ".$nomeProduto."</td>";
   echo "<br>";
   echo "<td> descricao do produto: ".$descricaoProduto."</td>";
   echo "<br>";
   echo "<td> preço de compra do produto: ".$precoDeCompraProduto."</td>";
   echo "<br>";
   echo "<td> preço de venda do produto: ".$precoDeVenda."</td>";
   echo "<br>";
   echo "<td> quantidade do produto em estoque: ".$quantidadeDoProdutoEmEstoque."</td>";
   echo "<br>";
   echo "<td> Quantidade minima do produto em estoque: ".$quantidadeMinimaDoProdutoEmEstoque."</td>";
   echo "<br>";
   echo "<td> Quantidade de entrada do produto: ".$quantidadeDeentradaDoProduto."</td>";
   echo "<br>";
   echo "<td> Data de entrada do produto: ".$dataDeEntradaDoProduto."</td>";
   echo "</tr>";
   echo "<br>";
 }
	 //$num_rows = mysql_num_rows($resultado1);
 	
 	echo "<br>Teste: " .$num_rows;

 
 	echo "<br>";
 	echo "<br>";
 	echo "Nova Consulta: " .$nome1;
 	echo  "<br>";

     //$variavel = mysqli_insert_id;
	mysqli_close($strcon);

  	 //mysqli_close($conn);

  	 echo "<br>";
  	 
   
  	 echo "<br>";
  	 echo "Nome: ".$nome;
  	 echo "<br>";
  	 echo "Cliente cadastrado com sucesso!<br>";
	 echo "<a href='index.php'>Clique aqui para realizar um novo cadastro</a><br>";
	 echo "<a href='index.php'>Clique aqui para realizar uma consulta</a><br>";


	 echo "teste: " .$teste2;
	 echo "Nome do Produto: " .$teste1;
	 echo "<br>";


?>

<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>

 <link rel="stylesheet" href="./css/bootstrap.min.css">
 
 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">


<script type="text/javascript" src="./js/jquery.mask.js"></script>   

<script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script src="./js/bootstrap.min.js"></script>
	


	<title>Cadastro de Produto</title>
  
	<script>
		

		$(document).ready(function(){


		//	alert("teste modal");
$("#modalExemplo").modal("show");
	
	$('#modalExemplo').trigger('focus')

		});


		$('#meuModal').on('shown.bs.modal', function () {
  $('#meuInput').trigger('focus')
});


		 function modal(){

		 	//alert("teste");

		 	$("#meuModal").modal('show');

		 }


	</script>
</head>
<body onload="">


   <!-- Botão para acionar modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
  Abrir modal de demonstração
</button>

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produto Cadastrado com Sucesso!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <table>
      	<tr>
      	<td style="font-weight:bold">Id do produto: &nbsp</td>
      	<td><?php echo $idProduto; ?></td>
      	</tr>
      	<tr>
      	<td style="font-weight:bold">Nome do produto: </td>
      	<td><?php echo "".$nomeProduto; ?></td>
        </tr>
        <tr>
        <td style="font-weight:bold">Descrição do Produto: </td>
    	</tr>
      </table>
 
        <?php 
  
         echo "<br ><div style='font-weight:bold'>Descrição produto:</div>" . "<div style='font-style:italic' class='text-justify'>".$descricaoProduto ."</div>";  
         echo "<br>Preco de compra do produto: " .$precoDeCompraProduto;  
         echo "<br>Preço de venda produto: " .$precoDeVenda;  
         echo "<br>Quantidade do produto em estoque: " .$quantidadeDoProdutoEmEstoque;  
         echo "<br>Quantidade minima do produto em estoque: " .$quantidadeMinimaDoProdutoEmEstoque;  
		echo "<br>Quantidade de entrada do produto: " .$quantidadeDeEntradaDoProduto;  
		echo "<br>Data de Entrada do Produto: " .$dataEntradaDoProduto;  


        ?>

        <br>
        ...


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>