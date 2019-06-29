<?php

	//echo "banco de dados:";

	include_once("conexao.php");

    //$estado = var_dump($_POST['id']);

    $estado = $_POST['id'];

    $cidades = "Ceara";
   
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

	 
	//$sql = "select * from tabela_estado where sigla_estado ='$estado'";

	*/

    $sql = "SELECT * FROM tabela_estado";

	$sql1 = "SELECT COUNT(*) FROM tabela_estado";
	//$pegarCidades = $conn->prepare($sql); 
	  
	//$pegarCidades->execute(); 

	$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
    $total = mysqli_query($conn,$sql1) or die("Erro ao retornar dados");

	 
    $contador = 1;
	
	  $cont = 1;
	// Obtendo os dados por meio de um loop while
	 while ($registro = mysqli_fetch_array($resultado))
 	{

 				
 				if($cont==1){

 				echo "<option> ". "selecione um estado" . "</option>"; 
 				$cont++;
 				}
   
 				$nome = $registro['nome_estado'];
   
  	 			echo "<option> ". $nome . "</option>";   
 
  	 			 $contador = $contador + 1;	

 	}
 				mysqli_close($strcon);

    
    		if ($contador == 1 )  {

 				echo "<option> ". "registre uma Estado " . "</option>";  
 			}

 			
    	
	// echo "<option> ". "1" . "</option>";  
 

	 // $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");	

 	 //$resultado =  or die("Erro ao retornar dados");
 	 //$resultado = mysqli_query($conn,$sql)
 
 
 
//	 echo "<option> ". "1" . "</option>";




?>