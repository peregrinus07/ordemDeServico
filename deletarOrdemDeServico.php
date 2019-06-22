<?php


	$id = $_GET['usuario'];

	echo "Id: - " .$id;


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
   $sql = "DELETE FROM tabela_ordem_de_servico WHERE id_ordem_de_servico = '$id'";

   	// $sql = "SELECT nome_cliente FROM cliente";
   //$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

   // Executa o comando SQL
   $result = mysqli_query($conn,$sql);

    // Verifica se o comando foi executado com sucesso
  if(!$result)
	die("Falha ao executar o comando: " . mysqli_error());
  else
	echo "<span class='news2'><br>Dados excluídos com sucesso.</span>";
 	echo "<br> <a href='listarOrdemDeServico.php'>Voltar</a>";
/*
 $counter = mysql_num_rows (mysql_query($sql));

for ($i = 1;$i < $counter;$i++)

	*/

?>