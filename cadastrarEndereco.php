 <?php
 
	//echo "Exercitando a programação em PHP"; 
  

/*
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

  */
      include_once("conexao.php");

  	 $sql = "SELECT nome_cliente FROM tabela_clientes";
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

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="./css/bootstrap.min.css">

 <link rel="stylesheet" href="./css/bootstrap.min.css">
 
 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">


<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   <script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script src="./js/bootstrap.min.js"></script>


<script src="./js/bootstrap.min.js"></script>

<script src="./js/listarCidades.js"></script>   

<script>

  function getData(cont){

    if(cont==1){

      $(".conteudo").load('cadastrarRua.php');

    } // if

     if(cont==2){

      $(".conteudo").load('cadastrarCidade.php');
       
     } // if
    
}




   $( document ).ready(function() {





    $("#imgCidade").click(function(event){

      alert();
      $("#cadastrarRua").hide("slow");
      $("#cadastrarCidade").show("slow");


    })// on



    $("#imgBairro").click(function(event){

      alert();
      $("#cadastrarRua").hide("slow");
      $("#cadastrarCidade").hide("slow");
      $("#cadastrarbairro").show("slow");


    })// on

 
     // 


  $("input[name='cep'").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');

   });
 
 function onloadPagina(){
 
 $( ".img" ).show();
  
 }
   
</script>

</head>

<body onload="getData(1);" >

  <div class="container">
  
     
 <?php include("menu.php") ?>


<div  class="conteudo">
      

    </div><!-- conteudo -->


      
 </div> <!-- container -->
</body>
</html>