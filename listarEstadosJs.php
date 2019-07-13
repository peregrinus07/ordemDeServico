<?php

	//echo "banco de dados:";

	include_once("conexao.php");


header('Content-Type: text/html; charset=utf-8');

//após a conexão com o BD
mysqli_query($conn,"SET NAMES 'utf8'");

mysqli_query($conn,'SET character_set_connection=utf8');

mysqli_query($conn,'SET character_set_client=utf8');

mysqli_query($conn,'SET character_set_results=utf8'); 

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


 				if ($cont==1) {
 					//
 					//echo "<option> ". "estado" . "</option>"; 
 					$cont++;
 				}
 				 
 				 if($cont==2){

 				echo "<option> ". "selecione um estado" . "</option>"; 
 				$cont++;
 				}
 				
	// Obtendo os dados por meio de um loop while
	 while ($registro = mysqli_fetch_array($resultado))
 	{


 				

 
$nome = $registro['nome_estado'];
$sigla = $registro['sigla_estado'];   
   

  	 			echo "<option value=" .$sigla . ">".$nome."</option>";   
 


  	 			 $contador = $contador + 1;	
 				 
   
 				

 	} // while
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