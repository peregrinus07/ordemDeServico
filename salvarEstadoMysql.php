<?php


	$estado = $_POST['estado'];


	echo "Estado: " .$estado;
	echo "<br>";

	if ($estado =="") {
		echo "vazio: ";
		echo " $nome";
	}

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
	echo "<br>Connected successfully";


  	 $sql = "INSERT INTO tabela_estado (nome_estado) values ('$estado')";
	 
     mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");


  	 mysqli_close($conn);


  	 echo "Cliente cadastrado com sucesso!<br>";
	 echo "<a href='index.php'>Clique aqui para realizar um novo cadastro</a><br>";
	 echo "<a href='index.php'>Clique aqui para realizar uma consulta</a><br>";


?>