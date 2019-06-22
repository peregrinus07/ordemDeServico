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


  	$sql = "INSERT INTO tabela_estado (nome_estado) values ('teste')";
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
<html lang="pt-br">

<head>
	 
    
   <!-- Latest compiled and minified CSS -->
   <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->
<link rel="stylesheet" href="./css/bootstrap.min.css">

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
   

<script src="./js/bootstrap.min.js"></script>

<script type="text/javascript">

  $( "#singlebutton" ).click(function() {
  alert( "Handler for .click() called." );
});




  jQuery(document).ready(function(){
    jQuery('#formulario').submit(function(){
      var dados = jQuery( this ).serialize();

        alert(teste)
;
      jQuery.ajax({
        type: "POST",
        url: "processa.php",
        data: dados,
        success: function( data )
        {
          alert( data );
        }
      });
      
      return false;
    });
  });
  </script>  




</head>

<body>

  <div class="container">
  
<!-- Just an image -->
<nav class="navbar navbar-light bg-light" style="margin-top:10px;">
  <a class="navbar-brand" href="#">
    <img src="./img/tux.png" width="60" height="60" alt="">
  </a>

<ul class="nav nav-tabs" style="margin-right: 80%;">
  <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Cliente</a>
      <a class="dropdown-item" href="#">Produto</a>
      <a class="dropdown-item" href="cadastrarData.php">Cadastrar Data</a>
      <a class="dropdown-item" href="cadastrarEndereco.php">Cadastrar Endereço</a>
    </div>
  </li>
</ul>

</nav>
  
    <div id="formulario" style="float: left; margin-left: -4%; margin-top:-3%;">
 
    <form style="border:10px; margin-left: 400px; margin-top: 80px;" action="
      salvarEstadoMysql.php" method="POST">
   
      <legend style="">Cadastrar Estado</legend>

    <div class="form-group">
    <label for="inputAddress">Estado:</label>
    <input type="text" name="estado" class="form-control" id="inputAddress" placeholder="">
    </div>
 
   


  <button  id="singlebutton" name="singlebutton" class="btn btn-primary">Cadastrar</button>

      <p><a href="listarClientes.php"><p>listar clientes<p></a><p>

    </form>

    </div> <!-- formulario cliente -->    

  
    </div> <!-- coluna -->     


    </div> <!-- linha -->


<!-- roda pe -->
<!-- linha -->
  <div class="row"> 

    <!-- coluna -->
  <div id="rodaPe" style="float: left; margin-top: 80%; min-width: 100%; margin-left: 0px; padding: 0px;">
   
   

        <h4 style="margin-left: -42%; margin-top:0%;">@LinuxProCe - 2019</h4>

    </div> <!-- linha -->

 


  


</div> <!-- container -->
</body>
</html>