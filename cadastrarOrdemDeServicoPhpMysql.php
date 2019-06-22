<?php

	 
	function teste($variavel){

		if (!isset($variavel) || empty($variavel)) {
			
			$var = " ";
		}
		  	else{
		  		$var = $variavel;
		  	}

		  	return $var;

	} // function


	$nomeCli = teste($_POST["nomecliente"]);

	$nomeResponsavel = teste($_POST["resopnsavelServico"]);

	$status = teste($_POST["status"]);

	$dataInicial = teste($_POST["dataInicial"]);

	$dataFinal = teste($_POST["dataFinal"]);

	$garantia = teste($_POST["garantia"]);

	$descricaoServico = teste($_POST["descricaoServic"]);

	$defeito = teste($_POST["defeito"]);

	$observacao = teste($_POST["observacao"]);

	$laudoTecnico = teste($_POST["laudoTecnico"]);


	echo "Nome Cliente: " .$nomeCli ."<br>";
	echo "Nome Responsavel: " .$nomeResponsavel ."<br>";
	echo "Status: " .$status ."<br>";
	echo "data Inicial: " .$dataInicial ."<br>";
	echo "data Final: " .$dataFinal ."<br>";
	echo "garantia: " .$garantia ."<br>";
	echo "Descrição: " .$descricaoServico ."<br>";
	echo "Defeito: " .$defeito ."<br>";
	echo "Observacao: " .$observacao ."<br>";
	echo "Laudo Técnico: " .$laudoTecnico ."<br>";

	if ($dataFinal==" ") {
		print("data nao registrada");
		$dataFinal ="data nao registrada";
	}


	if ($dataInicial==" ") {
		print("<br> data não registrada");
		$dataInicial ="data nao registrada";
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
 	include_once("conexao.php");	
 	$sql ="select * from tabela_clientes where nome_cliente='$nomeCli'";

 	$resultado = mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");

 	 // Obtendo os dados por meio de um loop while
 	while ($registro = mysqli_fetch_array($resultado))
 	{
   	$idCliente = $registro['id_cliente'];
   //$telefone = $registro['telefone_cliente'];
   
   //$data[] .= $nome ; 
   
 	}

 	$sql ="select * from tabela_usuario where nome_usuario='$nomeResponsavel';";

    $resultado = mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");
 
	while ($registro = mysqli_fetch_array($resultado))
 		{
   	$idUsuario = $registro['id_usuario'];
   	$ava = $registro['nome_usuario'];
   //$telefone = $registro['telefone_cliente'];
   
   //$data[] .= $nome ; 
   
 		} 

 		//echo "<br>ava: " .$idUsuario ." ".$ava;

 		$statusOrcamento = utf8_decode($status);



	$sql = "INSERT INTO tabela_ordem_de_servico (fk_id_cliente,fk_id_funcionario, status_ordem_de_servico,data_inicial_ordem_de_servico, data_final_ordem_de_servico,garantia_ordem_de_servico,descricao_produto_servico,defeito_ordem_de_servico,observacao_ordem_de_servico,laudo_tecnico_ordem_de_servico) values ('$idCliente','$idUsuario','$status','$dataInicial','$dataFinal','$garantia','$descricaoServico','$defeito','$observacao','$laudoTecnico')";

 //   mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");

 
if (mysqli_query($conn, $sql)) {
      echo "<br>New record created successfully";
} else {
      echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

   //printf (" id: %d.\n", mysqli_insert_id($conn));
     //$variavel = mysqli_insert_id;


  	 mysqli_close($conn);

  	 echo "<br>";
  	 
   
  	 echo "<br>";

  	  
  	 echo "Nome: ".$nomeCli;
  	 echo "<br>";
  	 echo "Servico cadastrado com sucesso!<br>";
	 echo "<a href='index.php'>Clique aqui para realizar um novo cadastro</a><br>";
	 echo "<a href='index.php'>Clique aqui para realizar uma consulta</a><br>";

?>