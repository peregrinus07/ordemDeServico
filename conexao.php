<?php
 
	//echo "Exercitando a programação em PHP"; 
    
    function conexao1(){

    $servername = "localhost";
    $database = "id9322616_sistemadevendas";
    $username = "id9322616_root";
    $password = "peregrinusfalco1712";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    return $conn;

    }// function 

    function conexao2(){

      //die("Connection failed: 1" . mysqli_connect_error());
      $servername = "localhost";
      $database = "sistemaDeVendas";
      $username = "root";
      $password = "tibe";
     
      $conn = mysqli_connect($servername, $username, $password, $database);
    
      return $conn;

      /*
        if (!$conn){

           die("Connection failed: " . mysqli_connect_error(
           ));

        }// if

        else {

          //echo "<br>Connected successfully";
        }
*/
    }// function

    $conn = conexao1();

    // Check connection
    if (!$conn) {
       
       $conn = conexao2();

       if($conn){
        //echo "conectado";
       }
       
    }

    else{
      echo "";
    }

mysqli_set_charset($conn, "utf8");
 
     // if
     //echo "<br>Connected successfully";
 
  // Exibe todos os erros PHP (see changelog)
  error_reporting(E_ALL);

 
  		function consulta(){
 
 	  $sql = "SELECT * FROM tabela_produto";
 	  $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
 	  //mysqli_close($conn);
 
 /*
   // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['nome_produto'];
   
   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> nome do cliente: ".$nome."</td>";
   echo "</tr>";
   echo "<br>";
 }
 */
  
 //echo "</table>";
  
 	return $resultado;

  }

?>