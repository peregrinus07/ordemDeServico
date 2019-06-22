
<?php session_start(); ?>
<?php 

	// se existir a session
	if(isset($_SESSION["venda"])){
 
	} else { 

		$_SESSION["venda"] = array();

	}
 

	// adicionar ao carrinho
	if(isset($_GET["par"]) && $_GET["add"]=="carrinho"){

		if(!isset($_SESSION['venda'][$_GET["par"]])){
 
			$_SESSION['venda'][$_GET["par"]] = 1;
			//header("location: paginaDeVendas.php");	 
		} else {

			$_SESSION["venda"][$_GET["par"]] += 1;


		}

	 	 
	}

	// deletar produto
	if(isset($_GET["del"])){

		$del = $_GET["del"];

		unset($_SESSION["venda"][$del]);

	};

	// alterar quantidade

	if($_GET["acao"] == "up"){
  
              $id =  intval($_GET["id"]);
              $quantidade = intval($_GET["quantidade"]); 

              // <> diferente de zero 0
            if(!empty($quantidade) || $quantidade <> 0) {

                $_SESSION["venda"][$id] = $quantidade;
				echo "id: "+$id. " Quantidade: " .$quantidade. " <br>";

              }
              else {

                unset($_SESSION["itens"][$id]);

              }

			
 
      } 


	print_r($_SESSION["venda"]);

    //session_destroy();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	 
  <style rel="stylesheet" type="text/css">
    .ui-autocomplete { z-index: 10000000; } 
  </style>


 <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
   
   <!-- Latest compiled and minified CSS -->
   <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->
   <link rel="stylesheet" href="./css/bootstrap.min.css">
 
 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">


<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   <script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script src="./js/bootstrap.min.js"></script>

<script type="text/javascript" src="./carrinho.js"></script>

</head>
<?php
	
	include_once("conexao.php");


?>

<body>

<h1>Carrinho de Compras</h1>


<div id="carrinho">
<ul>

	<?php
 
			$sql = "SELECT * FROM tabela_produto limit 10";
 
			$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
			
	
	 // Obtendo os dados por meio de um loop while
	 while ($registro = mysqli_fetch_array($resultado))
	 {
	$id = $registro['id_produto'];	 
	$nome = $registro['nome_produto'];
	$descricao = $registro['descricao_produto'];	
	$preco = $registro['preco_de_venda_produto'];		
	

	?>
	<li>
		<span><?php echo $nome; ?></span>
		<strong><a href="index.php?add=carrinho&par=<?php echo $id; ?>"> <?php echo "RS: ". number_format($preco,2,",","."); ?> </a></strong>
	</li>
 <?php  } ?>	


</ul>

<table width='700' border='1'>
 
 <tr>
		<td>Produto</td>
		<td>Valor</td>
		<td>Quantidade 1</td>
		<td>Ações</td>
 
</tr>		

<?php  

		foreach($_SESSION["venda"] as $prod => $quantidade) { 

			$sqlCarrinho = "SELECT * FROM tabela_produto where id_produto = '$prod'";	
			$resultado = mysqli_query($conn,$sqlCarrinho) or die("Erro ao retornar dados");
			
			
			while ($registro = mysqli_fetch_array($resultado)) {
			
		    $idProduto = $registro["id_produto"];

				echo "<tr>";

				echo "<td>".$registro["nome_produto"] ."</td>";
				echo "<td>". number_format($registro["preco_de_venda_produto"],2,",",".") ."</td>";
				echo "<td>". "<input id='$idProduto' type='text' value=$quantidade width='2' name='$idProduto' >" ."</td>";
				echo "<td>". "<a href='index.php?del=". $registro["id_produto"]. "'> X </a>". " " ."<a onclick='quantidadeProduto(this.id)' id='$idProduto' href='?acao=i'> Atualizar </a>" ."</td>";
			echo "</tr>";

					}
				}

?>

<tr>
		 
</tr>		
 
</table>
</div>


<body>
</body>
</html>