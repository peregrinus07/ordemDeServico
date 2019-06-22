<?php

  $variavelAdd = $_GET["add"];

  $variavelId = $_GET["id"];

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
 
    //remove carrinho

      if($_GET["acao"] =="dell") {

        $id = $_GET["id"];

        if(isset($_SESSION["itens"][$id])) {

            unset($_SESSION["itens"][$id]);

              echo "removido";
        }


      }


  /* listar produtos */

    if(count($_SESSION["itens"]) == 0) {

      //$myJSON = json_encode("Nao ha produtos");
      echo 0;


    } else { 

 
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
         //echo "<br>Connected successfully";


            $sql = "SELECT * FROM tabela_produto where id_produto = '$id'";
   $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
       

        while ($registro = mysqli_fetch_array($resultado)) {
   $nome = $registro['nome_produto'];
   $valorDoProduto = $registro['preco_de_venda_produto'];

   $valor = $quantidade * $valorDoProduto;

   $quantidadeDeProdutos = $resistro["id_produto"];

   $quantidadeDeProdutos += $quantidade;

   $listaProdutos += $nome;

   $valorTotal += $valor; 

    
  } // while



      } // foreach
 
   } // else





   echo count($_SESSION["itens"]) // . "<div onclick='ava()' id='exibirCarrinho'><h4><i>"."Produtos"."</i></h4></div>";   

?>