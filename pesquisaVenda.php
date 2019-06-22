<?php
 
	//echo "Exercitando a programação em PHP"; 
  

  $busca = $_POST["variavel"];

  $categoria = $_POST["categoria"];

  //$busca ="linux";


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


  	// $sql = "SELECT * FROM tabela_produto WHERE nome_produto LIKE '%$busca%'";
 	 $sql ="SELECT * FROM tabela_produto INNER JOIN tabela_categoria_produto on tabela_produto.id_categoria_produto = tabela_categoria_produto.id_categoria_produto where tabela_produto.nome_produto like  '%$busca%'";

   $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
  // $total = mysql_num_rows($sql);

	mysqli_close($conn);
 
  echo "<br>";
  echo "<br>";
  //echo "teste numero de result " .$resultado->num_rows;

  //echo utf8_encode($exibe['recadao_mensagem']);

/*   update tabela_produto set id_categoria_produto = (select id_categoria_produto from tabela_categoria_produto  where id_categoria_produto ='1') where tabela_produto.nome_produto like '%a%';
/*

/*
	 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['nome_cliente'];
   
   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> nome do cliente: ".$nome."</td>";
   echo "</tr>";
   echo "<br>";
 }
 mysqli_close($strcon);
 echo "</table>";
  */

?>

<!DOCTYPE html>
<html>
<head>
  <title>Teste</title>

   <!-- Latest compiled and minified CSS -->
   <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->
<link rel="stylesheet" href="./css/bootstrap.min.css">

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>


<script src="./js/bootstrap.min.js"></script>

	 
</head>
<body>
<div class="container">
  <!-- Form Name -->
    
<!--
      <legend style="margin-left: 11px;"><a href="index.php">Voltar</a></legend>
  -->
      <!-- 
  <h2><a href="index.php">Voltar</a></h2>
 -->


<form>
<table id="tabela" class="table table-striped">
  
  <thead>
      <tr>
        <th>Categoria do Produto </th>
        <th>Nome do Produto</th>
        <th>Opsções</th>
      </tr>
    </thead>
<!-- 
  <tr>
    <td>Id do cliente</td>
    <td>Nome do cliente</td>
    <td>Opsções</td>
  </tr>
-->
<?php
     
      // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {


   $nomeProduto = $registro['nome_produto'];
   $idProduto = $registro['id_produto'];
 //utf8_encode($exibe['recadao_mensagem']);
   echo "<tr>";    
   echo "<td> ".utf8_encode($registro['nome_categoria_produto']) ."</td>";
   echo "<td> ".$registro['nome_produto'] ."</td>";   
   echo "<td> 
   <a href='#'><button id='$idProduto' type='button' onclick='adicionarCarrinho(this.id);' value='$nomeProduto' class='btn btn-primary'>Adicionar ao carrinho</button></a>
   <a href='editarCliente.php?usuario=$idCliente&teste=$nome'> <button type='button' class='btn btn-success'>Editar</button></a>
   <a href='deletarCliente.php'><button type='button' class='btn btn-danger'>Detalhar</button></a>";
   echo "</td>";
   echo "</tr>";

 }


?>
 
 

</body>
</html>