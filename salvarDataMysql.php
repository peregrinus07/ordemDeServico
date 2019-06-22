<?php

	$nome = $_POST['data'];
	$decimal = $_POST['decimal'];
	$teste1 = $_POST['teste1'];
	$teste2 = $_POST['teste2'];
	$hora = $_POST['hora'];


	$decimal2 = str_replace(',','.', $decimal);

	$decimal3  = str_replace(".","",$decimal);

	$decimalFiltro = str_replace(",", "", $decimal3);

	$decimalFiltro2 = number_format($decimalFiltro,2);

    $decimalTeste = str_replace(",", ".", $decimal3);
	 
      // Comparando as Datas 

    if (strtotime($teste1) > strtotime($teste2)) {
    	 echo 'A data 1 é maior que a data 2.';
    	 echo "<br>";
    }
	  if (strtotime($teste1) == strtotime($teste2)) {
    	 echo 'A data 1 é igual a data 2.';
    	 echo "<br>";
    } 

    if (strtotime($teste1) < strtotime($teste2)) {
    	 echo 'A data 1 é menor que a data 2.';
    	 echo "<br>";
    } 

	
    // converte as datas para o formato timestamp
	$d1 = strtotime($teste1); 
	$d2 = strtotime($teste2);

	// verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
	$dataFinal = ($d2 - $d1) /86400;

	// 19:38:20 - 19:37:00 = 00:01:20.

	/* Subtraindo Hora
	 $HoraIni=strtotime($hora_inicial);

	$HoraFim=strtotime($hora_fim);

	$result=($HoraFim-$HoraIni)/60;

	echo $result;

     */
	// caso a data 2 seja menor que a data 1
	if($dataFinal < 0)
	$dataFinal = $dataFinal * -1;
	echo "Entre as duas datas informadas, existem $dataFinal dias.";


	echo "<br>";
    echo "Diferença de dias Php";
    echo "<br>";
    echo "<br>";



    echo "teste Data: " .$teste1;
    echo "<br>";
    echo "teste Data2: " .$teste2;
    echo "<br>";
    echo "hora: " .$hora;
    echo "<br>";
	echo "teste: " .$nome;
	echo "<br>";
	echo "Decimal: " .$decimal;
	echo "<br>";
	echo "Decimal2: " .$decimal2;
	echo "<br>";
	echo "Decimal3: " .$decimal3;
	echo "<br>";
	echo "DecimalFiltro: " .$decimalFiltro;
	echo "<br>";
	echo "<br>";
	echo $decimalfiltro2 . "- Teste";
	echo "<br>";
	echo number_format($decimalFiltro,2);
	echo "<br>";
    echo "Decimal Teste: " .$decimalTeste;
	echo "<br>";
	echo "<br>";

	echo "Decimal Brasil: " . number_format($decimalTeste, 2, ',', '.'); // retorna R$100.000,50

	echo "<br>";
	echo "<br>";


	$T = number_format($decimalTeste, 2, ',', '.'); 

	 $data = str_replace("/", "-", $_POST['data']);
    echo date('Y-m-d H:i:s', strtotime($data));

$servername = "localhost";
$database = "teste";
$username = "root";
$password = "tibe";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "<br>Connected successfully";


  	 //$sql = "SELECT nome_cliente FROM cliente";

	$date = date('Y-m-d H:i:s');

	//$data = gmdate("d/m/Y H:i:s", $timestamp);

	//$datahora=date('Y-m-d h:i:s');
	$datahora=date('Y-m-d h:i:s');


$sql = "INSERT INTO tabela_data (data_cliente) values ('$datahora')";

	$sqlDecimal = "INSERT INTO tabela_decimal (decimal_teste) values ('$decimalTeste')";

 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
 $resultado1 = mysqli_query($conn,$sqlDecimal) or die("Erro ao retornar dados");

	mysqli_close($conn);

	$teste = DATE_FORMAT( $date,  "%M %d %Y" );

	echo "<br>";
	
	$teste = date_create($date);
	echo date_format($teste,"Y/m/d H:i:s");

?>


<?php

	echo "<br>";
	echo "<br>";
	echo "teste";

$servername = "localhost";
$database = "teste";
$username = "root";
$password = "tibe";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "<br>Connected successfully";


  	 $sql = "SELECT * FROM tabela_decimal";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
	mysqli_close($conn);
 
 
	 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome =  str_replace('.',',', $registro['decimal_teste']);     
   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> Decimal: ".$nome."</td>";
   echo "</tr>";
   echo "<br>";


     //$input = number_format($nome, 2, ',', '.'); // retorna R$100.000,50

      $input = $nome;

     //$T = number_format($decimalTeste, 2, ',', '.');  
 }
 mysqli_close($strcon);
 echo "</table>";
  


?>

<html>
<head>
	
<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./js/jquery.mask.js"></script>
		 <script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("input.data").mask("99/99/9999");
        $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');


         $("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

});


   $( "#decimal" ).load(function() {
   
   	alert("teste");

});
</script>

</head>

<?php
 


	echo "<h1>  id='decimal' type='text' value =$T name='decimal'  class='decimal'></h1>";

	echo  "<input  id='decimal' type='text' value =$T name='decimal'  class='decimal' />";

?>


</html>