<?php

	//echo "banco de dados:";

	 include_once("conexao.php");

	 include_once("./funcoes/funcoes.php");

    //$cidade = var_dump($_POST['id']);
	$cidade = teste($_POST['id']);
   
 	 /*
 	 $servername = "localhost";
	 $database = "sistemaDeVendas";
	 $username = "root";
	 $password = "tibe";
 */
	 $estado ="CE";

/*
	 // Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	//echo "<br>Connected successfully";

*/
	$sql = "select * from tabela_cidade inner join tabela_bairro on tabela_cidade.id_cidade = tabela_bairro.id_cidade where tabela_cidade.nome_cidade ='$cidade'";



	//$sql1 = "SELECT COUNT(*) FROM tabela_estado";
	//$pegarCidades = $conn->prepare($sql); 
	  
	//$pegarCidades->execute(); 


	$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
    //$total = mysqli_query($conn,$sql1) or die("Erro ao retornar dados");

     $contador = 1;
	 
	 // Obtendo os dados por meio de um loop while
	 while ($registro = mysqli_fetch_array($resultado))
 	{
 			$data = $registro['nome_bairro'];			
 
    	 		echo "<option> ". $data . "</option>";   
    			$contador = $contador + 1;	

 	}

 			  
 


 				mysqli_close($conn);

    		if ($contador == 1 )  {

 				echo "<option> ". "registre uma cidade " . "</option>";  
 				 
 			}


	
    	
	// echo "<option> ". "1" . "</option>";  
 

	 // $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");	

 	 //$resultado =  or die("Erro ao retornar dados");
 	 //$resultado = mysqli_query($conn,$sql)
 		
 		//$teste = $cidade;
 
 
	 //echo "<option> ". $cidade.  . "</option>";




?>