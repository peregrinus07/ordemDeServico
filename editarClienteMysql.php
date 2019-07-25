<?php

	include_once("./funcoes/funcoes.php");

	$nome = $_POST['nomeCliente'];
	$id = $_GET["id"];
	$cpf = $_POST["cpf"];
	$email = $_POST["email"]; 
	$telefone = $_POST["telefone"];
    $estadoSigla = $_POST["estado"];
    $cidade = $_POST["cidades"];
    $bairro = $_POST["bairro"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $numero = $_POST["numero"];
    
	echo "Id: " .$id ."<br>";
	echo "Nome do cliente: " .$nome;
	echo "<br>";
	echo "cpf do cliente: " .$cpf;
	echo "<br>";
	echo "email do cliente: " .$email;
	echo "<br>";
	echo "telefone do cliente: " .$telefone;
	echo "<br>";
    echo "estado do cliente: " .$estadoSigla;
	echo "<br>";
    echo "cidade do cliente: " .$cidade;
	echo "<br>";
    echo "bairro do cliente: " .$bairro;
	echo "<br>";
    echo "endereco do cliente: " .$endereco;
	echo "<br>";
    echo "cep do cliente: " .$cep;
	echo "<br>";
    echo "numero do endereco do cliente: " .$numero;
	echo "<br>";
    
	//echo "email: " .$email;

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
*/
	include_once("conexao.php");

	$sql ="select * from tabela_bairro, tabela_cidade, tabela_estado, tabela_descricao_rua
	where nome_bairro='$bairro'
	and 
	tabela_descricao_rua.id_bairro = tabela_bairro.id_bairro
	and
	tabela_descricao_rua.nome_da_rua ='$endereco'
	and
	tabela_cidade.nome_cidade='$cidade'
	and
	tabela_estado.sigla_estado ='$estadoSigla'
	ORDER BY tabela_bairro.id_bairro asc
	limit 1
  
";

	$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

	while ($registro = mysqli_fetch_array($resultado))
 	{
 			$idBairro = $registro["id_bairro"];
 			$idRua = $registro["id_descricao_rua"]; 
 			echo "Id bairro: " .$registro["id_bairro"];
 		}



  

 	print_r("<br>id da rua: ".$idRua."<br>");
 	print_r("id da bairro: ".$idBairro."<br>");

   //$sql = "DELETE FROM cliente WHERE id_cliente = '$id'";

	$sql = "UPDATE tabela_clientes SET nome_cliente='$nome', cpf_cnpj_cliente='$cpf', e_mail_cliente='$email', telefone_cliente='$telefone' WHERE id_cliente='$id'";

   	// $sql = "SELECT nome_cliente FROM cliente";
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

    $sql="select count(id_endereco_cliente) AS total from tabela_endereco_cliente where fk_id_cliente='$id'";

	$teste = mysqli_query($conn,$sql);
    $total = mysqli_fetch_assoc($teste);
    $num = "1";
    
    if($total['total'] == 1){

    	print_r("<br>");
    	print_r("<br>");
    	print_r("<br>Existe cliente cadastrado no endereco");

    	print_r("<br>");
 
    	print_r("total: ".$total['total']);    	

        print_r("<br>id da rua: ".$idRua);
		print_r("<br>id do cliente: ".$id);
	print_r("<br>numero endereco: ".$numero);
	   print_r("<br>");


    	$sql ="UPDATE  tabela_endereco_cliente
SET fk_id_cliente='$id', fk_id_rua='$idRua',numero_endereco_cliente='$numero'
WHERE fk_id_cliente='$id'
";    	

 	$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");	

    if($resultado){
    	print_r("<br>endereco atualizado");
    }
 
    } // if


    if($total['total']==0){

       print_r("total: ".$total['total']);
      print_r("<br>cliente não cadastraro endereço");

      print_r("<br>id rua: ".$idRua);

      $sql="insert into  tabela_endereco_cliente (fk_id_cliente,fk_id_rua,numero_endereco_cliente) values ('$id','$idRua','$numero')";

    } //if

    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");	
    
    if(!$resultado)
	die("Falha ao executar o comando: " . mysqli_error());
  else
	echo "<span class='news2'><br>Dados atualizados com sucesso.</span>";
 	echo "<br> <a href='listarClientes.php'>Voltar</a>";
/*
 $counter = mysql_num_rows (mysql_query($sql));

for ($i = 1;$i < $counter;$i++)

*/
?>
