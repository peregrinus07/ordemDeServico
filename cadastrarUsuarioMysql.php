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
	

	if ( !isset($_POST["cidades"] ) || empty($_POST["cidades"] ) ) {
	$erro = 'Nada foi postado.';
	$cidade="vazia";
} else{

	$cidade = $_POST["cidades"];
}
 

	

	if ( !isset($_POST["bairro"] ) || empty($_POST["bairro"] ) ) {
	$erro = 'Nada foi postado.';
	$bairro="vazio";
}	
	else{
		$bairro = $_POST["bairro"];
	}

	$cep = $_POST["cep"];

	$data = date("Y-m-d H:i:s");


	echo "<h3>Cadastro de Usuário</h3><br>";
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

	include_once("conexao.php");

	$sql = "INSERT INTO tabela_usuario (nome_usuario, rg_usuario, cpf_usuario, e_mail_usuario, telefone_usuario,data_cadastro_usuario) values ('$nome','$rg','$cpf','$email','$telefone', '$data')";

if (mysqli_query($conn, $sql)) {
      echo "<br>New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


	   $idCliente =mysqli_insert_id($conn);

     print_r("<br>id do usuario: ".$idCliente);

     $sql ="select * from tabela_descricao_rua, tabela_bairro, tabela_cidade, tabela_estado 
where
tabela_descricao_rua.id_bairro = tabela_bairro.id_bairro
AND
tabela_bairro.id_cidade = tabela_cidade.id_cidade
AND
tabela_estado.id_estado = tabela_cidade.id_estado
AND
tabela_descricao_rua.nome_da_rua='$endereco'
and
tabela_bairro.nome_bairro='$bairro'
and
tabela_cidade.nome_cidade='$cidade'
order by tabela_descricao_rua.id_descricao_rua ASC  
limit 1
";				
	$resultado  = mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");


	while ($registro = mysqli_fetch_array($resultado))
   {
   	   $idRua = $registro["id_descricao_rua"];
       $rua = $registro["nome_da_rua"];
       $bairro = $registro["nome_bairro"];
       $cidade = $registro["nome_cidade"];
       $estado = $registro["nome_estado"];
       $siglaEstado = $registro["sigla_estado"];
       $cep1 = $registro["cep_rua"];
   }("rua: ".$rua);

  	   print_r("<br>Id da rua: ".$idRua); 
   	   print_r("<br>rua: ".$rua);
   	   print_r("<br>Bairro: ".$bairro);
   	   $sql="INSERT INTO tabela_endereco_usuario
 (fk_id_rua, fk_id_usuario,numero_endereco_usuario,cep_endereco_usuario
) values ('$idRua','$idCliente','$numero','$cep')";

	print_r("<br>Teste ".$cep);
	print_r("<br>Teste ".$idCliente);

 	   mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar endereco usuario");



 echo "<br>";
  	 
   
  	 echo "<br>";
  	 echo "Nome: ".$nome;
  	 echo "<br>";
  	 echo "Cliente cadastrado com sucesso!<br>";
	 echo "<a href='index.php'>Clique aqui para realizar um novo cadastro</a><br>";
	 echo "<a href='cadastrarUsuario.php'>Clique aqui para realizar uma consulta</a><br>";


/*
	$sql = "INSERT INTO tabela_usuario (nome_usuario) values ('$nome')";

     mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");

*/
     mysqli_close($conn);

?>