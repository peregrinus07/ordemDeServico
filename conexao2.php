<?php
 
	//echo "Exercitando a programação em PHP"; 
  

  // Exibe todos os erros PHP (see changelog)
  error_reporting(E_ALL);


  		 
 
		$servername = "localhost";
		$database = "sistemaDeVendas";
		$username = "root";
		$password = "tibe;
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);
		// Check connection
		if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
		}
		//echo "<br>Connected successfully";



/* 
 	  $sql = "SELECT * FROM tabela_produto";
 	  $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
 	  mysqli_close($conn);
 
 /*
   // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['nome_produto'];
   
   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> nome do cliente: ".$nome."</td>";
   echo "</tr>";
   echo "<br>";
 }
 */
  
 //echo "</table>";
  
 	//return $resultado; */

  

?>