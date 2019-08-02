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

  	



//$data[];

    //$data[0]="";
   // Obtendo os dados por meio de um loop while
		 $data[] .= "janete uia";
		 $data[] .= "janete";
		 $data[] .= "teste";


 			echo json_encode($data);


?>
