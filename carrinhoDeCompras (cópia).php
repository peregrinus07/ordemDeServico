<?php
 
	//echo "Exercitando a programação em PHP"; 
   
  
  session_start();



  if(!isset($_SESSION["itens"])) {

    $_SESSION["itens"] = array();

  }



if(isset($_GET["add"]) && $_GET["add"] == "carrinho") {

     /* adiciona ao carrinho */
    $idProduto  = $_GET["id"];  

    if(!isset($_SESSION['itens'][$idProduto])){
        


        $_SESSION['itens'][$idProduto] = 1;

        //header("location: paginaDeVendas.php");


    }else{

        $_SESSION['itens'][$idProduto] += 1;

        //header("location: paginaDeVendas.php");
    }

  }

  //remove carrinho

      if($_GET["acao"] =="dell") {

        $id = $_GET["id"];

        if(isset($_SESSION["itens"][$id])) {

            unset($_SESSION["itens"][$id]);

              echo "removido";
        }


      }

  // alterar quantidade

      if($_GET["acao"] == "up"){

       
        if(is_array($_POST["prod"])) {

            foreach ($_POST["prod"] as $id => $quantidade) {
              
              $id = intval($id);
              $quantidade = intval($quantidade);

              // <> diferente de zero 0
            if(!empty($quantidade) || $quantidade <> 0) {

                $_SESSION["itens"][$id] = $quantidade;

              }
              else {

                unset($_SESSION["itens"][$id]);

              }
            
            }


        }




      }



  /* listar produtos */

    if(count($_SESSION["itens"]) == 0) {

      echo "<tr><td colspan='5'>Não há produto no carrinho</td></tr>";


    } else {

      //echo "<tr><td colspan='5'>Não há produto no carrinho</td></tr>";

        foreach ($_SESSION["itens"] as $id => $quantidade) {
           


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


   $sql = "SELECT * FROM tabela_produto where id_produto = '$id'";
   $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 

    echo "<form action=?acao=up method='post'>";
   while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['nome_produto'];
   $valorDoProduto = $registro['preco_de_venda_produto'];

   $valor = $quantidade * $valorDoProduto;

   $valorTotal += $valor; 

   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> nome do produto: ".$nome."</td>";
   echo "<td> Valor do produto: " .number_format($valor,2,',','.') ."</td>";
   echo "<td> Quantidade: ".$quantidade ." </td>";
   echo "<td><input type='text' name='prod[".$id."]' value='".$quantidade."' size='2'/></td>";
   echo "</tr>";
   echo "<tr>";
   echo "<td> <a href='?acao=dell&id=" .$id ."'>Remover</a></td>";
   echo "</tr>";
   echo "<br>";
 }

 echo "<button name='button'>Atualizar Carrinho</button>";
 echo "</form>";


        }
        echo "<br>";
        echo "valorTotal : " .$valorTotal;
        echo "<br>";

    }

    //print_r($_SESSION["itens"]);



     /* exibe o carrinho */

  //echo "Id do produto: " .$idProduto;

  if(count($_SESSION["itens"]) == 0) {

      echo "Carrinho vazio<br><a href=paginaDeVendas.php>Adicionar Itens</a>";
  }

else {


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


  echo count($_SESSION["itens"]);

  for($i=0; $i <= count($_SESSION['itens']); $i++){

      

      $id = $_SESSION[0 ]["itens"];

    
   $sql = "SELECT * FROM tabela_produto where id_produto = '$id'";
   $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
   while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['nome_produto'];
   
   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> nome do produto: ".$nome."</td>";
   echo "</tr>";
   echo "<br>";
 }


    }

    echo "<br>". count($_SESSION["itens"]) ."<br>";

  // $sql = "SELECT * FROM tabela_produto where id_produto =? ";
   //$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 




  //echo "teste";

}

  mysqli_close($conn);


   
  

?>
 