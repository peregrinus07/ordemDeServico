<?php
    //$estado = $_POST['id'];

	 include_once("conexao.php");
	
	$cidades = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);
     

	$bairroSelecionado = $_GET["teste"];
	//$rua = utf8_decode($_GET["rua"]);
	$rua = $_GET["rua"];

	$cep = $_GET["cep"];

/*
	 $servername = "localhost";
	 $database = "sistemaDeVendas";
	 $username = "root";
	 $password = "tibe";
 
	 $estado ="CE";


	 // Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	//echo "<br>Connected successfully";
*/
 	/*$sql = "select * from tabela_bairro inner join 
tabela_descricao_rua on tabela_bairro.id_bairro = tabela_descricao_rua.id_bairro where tabela_descricao_rua.nome_da_rua like'%$rua%' and tabela_bairro.nome_bairro like '%$bairroSelecionado%'";
 
	/*$sql ="	select * from tabela_estado, tabela_cidade, tabela_bairro,
	tabela_descricao_rua, tabela_cep_rua
	where
	tabela_estado.id_estado = tabela_cidade.id_cidade
	and
	tabela_cidade.id_cidade = tabela_bairro.id_cidade
	and
	tabela_descricao_rua.id_bairro = tabela_bairro.id_bairro
	and
	tabela_descricao_rua.id_descricao_rua = tabela_cep_rua.id_rua
	order by tabela_descricao_rua.nome_da_rua asc";
*/

	//$sql1 = "SELECT COUNT(*) FROM tabela_estado";
	//$pegarCidades = $conn->prepare($sql); 
	  
	//$pegarCidades->execute(); 

	//$sql ="select * from tabela_descricao_rua";

	$sql ="select * from tabela_bairro, tabela_descricao_rua, tabela_cep_rua
 	WHERE
 	tabela_bairro.id_bairro = tabela_descricao_rua.id_bairro
 	and
 	tabela_cep_rua.id_rua = tabela_descricao_rua.id_descricao_rua
 	and
 	tabela_bairro.nome_bairro like '%$bairroSelecionado%'
 	and
 	tabela_descricao_rua.nome_da_rua like '%$rua%'
	and
	tabela_cep_rua.cep_rua like '%$cep%'
	order by tabela_descricao_rua.nome_da_rua asc";

	$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
    //$total = mysqli_query($conn,$sql1) or die("Erro ao retornar dados");

	$contador = 1;
	 
	 // Obtendo os dados por meio de um loop while
	 while ($registro = mysqli_fetch_array($resultado))
 	{
 			//$rua = utf8_encode($registro['nome_da_rua']);


		$rua = $registro['cep_rua'];


 			$data[] .= $rua; 	

 				/*
 				$nome = $registro['nome_cidade'];
   
  	 			echo "<option> ". $nome . "</option>";   
 				*/
  	 			 $contador = $contador + 1;	

 	}


 				echo json_encode($data);

 				mysqli_close($strcon);

    		if ($contador == 1 )  {

 				//echo "<option> ". "registre uma cidade " . "</option>";  
 				$data[] = "nenhuma cidade encontrada";

 				echo json_encode($data);
 			}

 
 			//$data[] = $cidadeSelecionada . "teste";


 			//echo json_encode($data);

?>
