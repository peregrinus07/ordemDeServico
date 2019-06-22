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
    echo "numero do cliente: " .$numero;
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

	$sql ="select * from tabela_bairro where nome_bairro='$bairro'";

	$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

	while ($registro = mysqli_fetch_array($resultado))
 	{
 			$idBairro = $registro["id_bairro"];

 			echo "Id bairro: " .$registro["id_bairro"];
 		}


   //$sql = "DELETE FROM cliente WHERE id_cliente = '$id'";

	$sql = "UPDATE tabela_clientes SET nome_cliente='$nome', cpf_cnpj_cliente='$cpf', e_mail_cliente='$email', telefone_cliente='$telefone' WHERE id_cliente='$id'";

   	// $sql = "SELECT nome_cliente FROM cliente";
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

   // Executa o comando SQL
 // $result = mysqli_query($conn,$sql);

     // Verifica se o comando foi executado com sucesso
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
