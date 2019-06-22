<?php
 
 
	 //$conn = mysqli_connect("localhost", "root", "tibe", "sistemaDeVendas") or die(mysqli_error());
	  
	 
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

 
	function conexaoOff(){
	
	mysqli_close($conn);	
	
	} 
 
 
?>
 