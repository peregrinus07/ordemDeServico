<?php
 
	//echo "Exercitando a programação em PHP"; 
  


$servername = "localhost";
$database = "teste";
$username = "root";
$password = "tibe";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "<br>Connected successfully";


  	 $sql = "SELECT * FROM cliente";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
	mysqli_close($conn);
 
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
  
  
<!-- Just an image -->
<nav class="navbar navbar-light bg-light" style="margin-top:10px;">
  <a class="navbar-brand" href="#">
    <img src="./img/tux.png" width="60" height="60" alt="">
  </a>

<ul class="nav nav-tabs" style="margin-right: 73%;">



  <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar</a>

    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php">Clientes</a>
      <a class="dropdown-item" href="cadastrarUsuario.php">Usuário</a>
      <a class="dropdown-item" href="cadastrarProduto.php">Produto</a>
      <a class="dropdown-item" href="cadastrarData.php">Cadastrar Data</a>
      <a class="dropdown-item" href="cadastrarEndereco.php">Cadastrar Endereço</a>
      <a class="dropdown-item" href="cadastrarEstado.php">Cadastrar Estado</a>
    </div> 
  </li>
  <li class="nav-item active">
        <a class="nav-link" href="paginaDeVendas.php">Venda <span class="sr-only">(current)</span></a>
      </li>
</ul>
   
</nav>
 
  <!-- Form Name -->
      <legend style="margin-left: 11px; margin-top: 20px;"><a href="index.php">Voltar</a></legend>
  
      <!-- 
  <h2><a href="index.php">Voltar</a></h2>
 -->

 <div id="botao" style="margin-top: -25px; float: left; margin-left: 510px; min-width: 100px;">
   <label   for="inputAddress"><button id="buscar" type="button" class="btn btn-outline-primary">Pesquisar</button></label>
 </div>

 <div style="float: right; margin-top: -25px; min-width: 500px;">
   
    <div class="form-group">
 
    <input type="text"  name="nomeCliente" class="form-control col-md-12" id="pesquisa" placeholder="">
    </div>
    <!--  <input type="text" name="" width="60"> -->
    
 </div> <!-- div formulario pesquisa -->


 <div id="dados">
   
 </div> <!-- div dados -->
 
 
 <script type="text/javascript">
   
  function buscar(variavel) {

    //alert("teste");

    var page = "pesquisaVenda.php";

    $.ajax ({

      type: 'POST',
      dataType: 'html',
      url: page,
      beforeSend: function () {


        $("#dados").html("Carregando...");
      },

      data: {variavel: variavel},
      success: function (msg) {

          $("#dados").html(msg);

      }


    });

  }


  $("#buscar").click(function () {

    

      buscar($("#pesquisa").val());


  });

 </script>


</body>
</html>