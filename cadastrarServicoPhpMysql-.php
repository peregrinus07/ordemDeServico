<?php


	//echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';

	
	$nome = $_POST["nomeCliente"];
	$email = $_POST["email"];
	$rg = $_POST["rg"];
	$telefone = $_POST["telefone"];
	$cpf = $_POST["cpf"];
	$endereco = $_POST["endereco"];
	$numero = $_POST["numero"];
	$estado = $_POST["estado"];
	$cidade = $_POST["cidades"];
	$bairro = $_POST["bairro"];
	$cep = $_POST["cep"];

	$data = date("Y-m-d H:i:s");


	echo "Nome: " .$nome;
	echo "<br>";
	echo "Rg: "   .$rg;
	echo "<br>";
	echo "Data: " .date("Y-m-d H:i:s");
	echo "<br>";
	echo "E-Mail: " .$email;
	echo "<br>";
	echo "Telefone: " .$telefone;
	echo "<br>";
	echo "Cpf: " .$cpf;
	echo "<br>";
	echo "Endereco: " .$endereco;
	echo "<br>";
	echo "Numero: " .$numero;
	echo "<br>";
	echo "Estado: " .$estado;
	echo "<br>";
	echo "Cidade: " .$cidade;
	echo "<br>";
	echo "Bairro: " .$bairro;
	echo "<br>";
	echo "Cep: " .$cep;
	echo "<br>";

	echo "$nome";

	if ($nome =="") {
		echo "vazio: ";
		echo " $nome";
	}

	else {

		echo "Nome: " .$nome;


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


  	/* $sql = "INSERT INTO tabela_clientes (nome_cliente,cpf_cnpj_cliente,
e_mail_cliente, telefone_cliente) values ('$nome','$cpf','$email','$telefone')";
	 */
	$sql = "INSERT INTO tabela_clientes (nome_cliente, cpf_cnpj_cliente,  e_mail_cliente, telefone_cliente) values ('$nome','$cpf','$email','$telefone')";

     mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");


   //printf (" id: %d.\n", mysqli_insert_id($conn));
     //$variavel = mysqli_insert_id;


  	 mysqli_close($conn);

  	 echo "<br>";
  	 
   
  	 echo "<br>";
  	 echo "Nome: ".$nome;
  	 echo "<br>";
  	 echo "Cliente cadastrado com sucesso!<br>";
	 echo "<a href='index.php'>Clique aqui para realizar um novo cadastro</a><br>";
	 echo "<a href='index.php'>Clique aqui para realizar uma consulta</a><br>";


?>