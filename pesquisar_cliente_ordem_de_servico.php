<?php

	

	if (!isset($_GET["cidade"]) || empty($_GET["cidade"])) {
		 $cliente = "a";	 
	}
		else{
			$cliente = $_GET["cidade"];
		}

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
*/
   //printf (" id: %d.\n", mysqli_insert_id($conn));
     //$variavel = mysqli_insert_id;

	include_once("conexao.php");

	//nomecliente

   $sql = "select * from tabela_clientes where nome_cliente like '%$cliente%';";

   $resultado = mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");
  	



//$data[];

   $data[0]="";
   // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['nome_cliente']; // ." " .$registro['telefone_cliente'];
   //$telefone = $registro['telefone_cliente'];
   $id = $registro['id_cliente']; // ." " .$registr   


   $data[] .= $nome ." - id: ".$id ; 
   
    
 }

		 $data[] .= "janete";


 			echo json_encode($data);


?>
