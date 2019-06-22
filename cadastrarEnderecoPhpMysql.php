<?php

    include_once("./funcoes/funcoes.php");

   $estado = teste($_POST["estado"]);
    
    
    if(!isset($_POST["cidades"]) || empty($_POST["cidades"])){

        $cidade = "vazia";

    }
      else{
        $cidade =  $_POST["cidades"];
      }


       
     
    if (!isset($_POST["bairro"]) || empty($_POST["bairro"])) {
       
       $bairro = "vazio";
    }
      else {
      $bairro = $_POST["bairro"];    
      }


    if (!isset($_POST["endereco"]) || empty($_POST["endereco"])) {
      
        $rua = "vazia";
    }
      else {
        $rua = $_POST["endereco"];
      }
 
    if (!isset($_POST["cep"]) || empty($_POST["cep"])) {
      
        $cep = "vazio";
    }
      else {
        $cep = $_POST["cep"];
      }


    $cidade = teste($_POST["cidades"]);  

    echo "Estado: " .$estado ."<br>";
    echo "Cidade: " .$cidade ."<br>";
    echo "Bairro: " .$bairro ."<br>";
    echo "Rua: " .$rua ."<br>";
    echo "Cep: " .$cep ."<br>";



    // salvar no banco com o ç
 //   $rua = utf8_decode($rua);
 
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

   //$cadastrar = teste($_POST["cadastrarBairro"]);


   if (empty($_POST["cadastrarBairro"])) {
      
   }
    else{
      $cadastrar = $_POST["cadastrarBairro"];
      echo "teste: <br>" ;

    }

   echo "<br>" .$cadastrar ."<br>";

   if ($cadastrar == "cadastrarEndereco") {
      
       //echo "<br> teste";
     $sql = "select * from tabela_bairro where nome_bairro ='$bairro'"; 

      $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");  


          // Obtendo os dados por meio de um loop while
       while ($registro = mysqli_fetch_array($resultado))
        {
              $idBairro = $registro['id_bairro'];      
        } // while
 
         //$idBairro = teste($idBairro);

              if (empty($idBairro)) {
                echo "<br>vazio";
              }
                else{
                   
                  echo "id do bairro: " .$idBairro;
                }

              $rua = teste($rua);

              //$idBairro ="";
              //$idBairro = teste($idBairro);

              echo "<br>id Bairro:" . $idBairro;
              echo "<br> Rua: " .$rua;


        $sql = "INSERT INTO tabela_descricao_rua ( id_bairro, nome_da_rua) values ('$idBairro','$rua')";

        echo "<br>Cep: " .$cep;
        echo "<br>Rua: " .$rua;

$teste = mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro ");

  if($teste){
     print_r("<br>Endereco cadastrado com sucesso");
     echo "<br>" .mysqli_error($conn);
  }
    else {
      print_r("Erro ao cadastrar endereco");

    }


        $sql ="select * from tabela_descricao_rua where nome_da_rua ='$rua'";

          $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");  

   // Obtendo os dados por meio de um loop while
       while ($registro = mysqli_fetch_array($resultado))
        {
              $idRua = $registro['id_descricao_rua'];      
        } // while
          
          echo "<br>Id da rua ava: " .$idRua;

          $sql = "INSERT INTO tabela_cep_rua
 (id_rua,cep_rua) values ('$idRua','$cep')";


$teste = mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");

  if(!$teste){

echo "mysqli: " .mysqli_error($conn);    
  }// cadastrar endereco


  } // cadastrar endereco


  //$teste = teste($_POST["cadastrarBairro"]);

  if ($cadastrar =="cadastrarCidade" ) {
     
     echo "Cadastrar Cidade: <br>";


    $sql = "select * from tabela_estado where sigla_estado = '$estado';"; 


    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");  

       // Obtendo os dados por meio de um loop while
       while ($registro = mysqli_fetch_array($resultado))
        {
              $idEstado = $registro['id_estado'];        
        } // while

        echo "Id estado - " .$idEstado ."<br>";

                $sql = "INSERT INTO tabela_cidade (id_estado,nome_cidade
) values ('$idEstado','$cidade')";


if (mysqli_query($conn, $sql)) {
      echo "<br>Cidade record created successfully";
} else {
      echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");
 
  } // cadastrar cidade


  if ($cadastrar=="cadastrarBairro") {
     echo "cadastrar";


        echo "<br> Cidade: " .$cidade;
 
    $sql = "select * from tabela_cidade where nome_cidade ='$cidade'"; 


    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");  


       // Obtendo os dados por meio de um loop while
       while ($registro = mysqli_fetch_array($resultado))
        {
              $idCidade = $registro['id_cidade'];        
        } // while


        echo "<br>Id da cidade: " .$idCidade;

         $sql = "INSERT INTO tabela_bairro (id_cidade,nome_bairro
) values ('$idCidade','$bairro')";


$teste = mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");

  if ($teste) {
     echo "<br> Cadastro realizado com sucesso cidade ";
  }
  else{
    echo "<br>Erro ao Cadastrar |realizado com sucesso cidade "; 
  }

    } // cadastrar cidade

 mysqli_close($conn);
?>