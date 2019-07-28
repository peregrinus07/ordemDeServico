<?php


	//echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';

	include("funcoes/funcoes.php");

	include("conexao.php");

	$id = teste($_GET["id"]);
	$nome = teste($_POST["nomeServico"]);
	$preco = teste($_POST["precoServico"]);
	$descricao = teste($_POST["descricaoServico"]);
	 
	$data = date("Y-m-d H:i:s");

	 	   $valor = str_replace('.','', $preco);
           $valor1 = str_replace(',','.', $valor);
           $preco = $valor1;

    echo "Nome: " .$nome;
	echo "<br>";
	echo "Preco: " .$preco;
	echo "<br>";
	echo "descricao: " .$descricao;

       	echo "<br>$nome<br>";

	if ($nome =="") {
		echo "vazio: ";
		echo " $nome<br>";
	}

	else {

		echo "Nome: " .$nome;
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
	echo "<br>Connected successfully";
*/

  	/* $sql = "INSERT INTO tabela_clientes (nome_cliente,cpf_cnpj_cliente,
e_mail_cliente, telefone_cliente) values ('$nome','$cpf','$email','$telefone')";
	 */

/*

 	$sql = "UPDATE tabela_servico
SET nome_servico='$nome'
WHERE id_servico='$id'  ";
 
  


*/

 
		$sql = "UPDATE tabela_servico
SET nome_servico='$nome', preco_servico='$preco', descricao_servico='$descricao'
WHERE id_servico='$id'";
 
     $conexao = mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar rua");

/*
 if (mysqli_query($conn, $sql)) {
      echo "<br>New record created successfully";
} else {
      echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}
//mysqli_close($conn);
/*//*
     mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");
*/



   //printf (" id: %d.\n", mysqli_insert_id($conn));
     //$variavel = mysqli_insert_id;


  	 mysqli_close($conn);

  	 echo "<br>";
  	 
   
  	 echo "<br>";
  	 echo "Nome: ".$nome;
  	 echo "<br>";
  	 echo "Servico cadastrado com sucesso!<br>";
	 echo "<a href='index.php'>Clique aqui para realizar um novo cadastro</a><br>";
	 echo "<a href='index.php'>Clique aqui para realizar uma consulta</a><br>";





?>