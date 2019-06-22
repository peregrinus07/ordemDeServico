  <?php

  	//echo "Exercitando a programação em PHP";
     include_once("conexao.php");
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
   
    	 $sql = "SELECT * FROM tabela_produto";
   	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

  	mysqli_close($conn);

    $conn = mysqli_connect($servername, $username, $password, $database);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 

    //seleciona todos os itens da tabela 
    $cmd = "select * from tabela_produto"; 
    $produtos = mysqli_query($conn,$cmd) or die("Erro ao retornar dados");

    //conta o total de itens 
    $total = $produtos->num_rows; 

    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 5; 
  
    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 

    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros;

    //seleciona os itens por página 
    $cmd = "select * from tabela_produto limit $inicio,$registros"; 
    $produtos = mysqli_query($conn,$cmd) or die("Erro ao retornar dados"); 
    $total = $produtos->num_rows;

     
    mysqli_close($conn);

  /*
  	 // Obtendo os dados por meio de um loop while
   while ($registro = mysqli_fetch_array($resultado))
   {
     $nome = $registro['nome_cliente'];

     echo "<br>";
     echo "<br>";
     echo "<tr>";
     echo "<td> nome do cliente: ".$nome."</td>";
     echo "</tr>";
     echo "<br>";
   }
   mysqli_close($strcon);
   echo "</table>";
    */

  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Teste</title>

     <!-- Latest compiled and minified CSS -->
     <!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">

  <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>

 <script type="text/javascript" src="./js/maskMoney.min.js"></script>

  <script src="./js/bootstrap.min.js"></script>

<style>
   .modal-content{
  width: 1020px;
  margin-left: -250px;
}

#modal{

  margin: 0 auto;
  width: 100%;
}
</style>

  </head>
  <body>
  <div class="container">

  <div id="menu">
    <?php include("menu.php") ?>
   </div><!-- menu -->


    <!-- Form Name -->
        <legend style="margin-left: 11px;"><a href="index.php">Voltar</a></legend>

        <p>total de produtos <?php echo $total ?></p>

        <!--
    <h2><a href="index.php">Voltar</a></h2>
   -->

  <table class="table table-striped">

    <thead>
        <tr>
          <th>Id do Produto</th>
          <th>Nome do Produto</th>
          <th>Opsções</th>
        </tr>
      </thead>
  <!--
    <tr>
      <td>Id do cliente</td>
      <td>Nome do cliente</td>
      <td>Opsções</td>
    </tr>
  -->
  <?php

        // Obtendo os dados por meio de um loop while
   while ($registro = mysqli_fetch_array($produtos))
   {
     $nome = $registro['nome_produto'];
     $idproduto = $registro['id_produto'];
     //$a = 2;

     $a = $registro['id_produto'];
     echo "<tr>";
     echo "<td> ".$registro['id_produto'] ."</td>";
     echo "<td> ".$registro['nome_produto'] ."</td>";
     echo "<td>
     <a href='deletarCliente.php?usuario=$idCliente'><button   type='button' class='btn btn-primary'>Deletar</button></a>

      <!-- editarCliente.php -->
     <a href='#?usuario=$idCliente&teste=$nome'> <button id='botao' onclick='modal($a);' type='button' class='btn btn-success'>Editar</button></a>

     <a href='deletarCliente.php'><button type='button' class='btn btn-danger'>Detalhar</button></a>";
     echo "</td>";
     echo "</tr>";

   }

    echo "</tbody>";
    echo "<table>";

   ?>
   <nav aria-label="Navegação de página exemplo">
    <ul class="pagination">
   <?php 

    $paginasPesquisa = ceil($total/$registros); 
    $registros = 2;

    $numLinks = ceil($total/$registros); 
 
  

    // paginação

     if($pagina>1){
 
        if($pagina==1) {

          $voltarPagina = $pagina -1;

          echo " <li class='page-item'><a class='page-link' href='?pagina=1'>"."<<"."</a></li> ";     

         }

        $voltarPagina = $pagina -1;

        echo "<li class='page-item'><a class='page-link' href='?pagina=$voltarPagina'>"." << "."</a> ";     

        }

 
          $proximaPagina1 = $pagina+1;     
          $proximaPagina2 = $pagina+2;     
           
          if($pagina==1){

             $PaginaAnterior1 = $pagina;     
        
           echo "<li class='page-item'><a class='page-link' href='?pagina=$PaginaAnterior1'>". " <<  " ."</a></li> ";  


          } else {

          $PaginaAnterior1 = $pagina-1;     
        
           echo "<li class='page-item'><a class='page-link' href='?pagina=$PaginaAnterior1'>". $PaginaAnterior1 ."</a></li> ";         
          }



           echo "<li class='page-item'><a class='page-link' href='?pagina=$pagina'>[". $pagina ."]</a></li> ";



          if($numPaginas ==$pagina) {

            echo " <li class='page-item'><a class='page-link' href='?pagina=$pagina'>". ">>" ."</a></li> "; 

          }

          else {
  

              if($proximaPagina2>$numPaginas){

                echo " <li class='page-item'><a class='page-link' href='?pagina=$proximaPagina1'>". $proximaPagina1 ."</a></li> ";
                echo "<li class='page-item'> <a class='page-link' href='?pagina=$proximaPagina1'>". ">>" ."</a></li> ";

              }
                else{

                echo " <li class='page-item'><a class='page-link' href='?pagina=$proximaPagina1'>". $proximaPagina1 ."</a></li> ";

          echo "<li class='page-item'><a class='page-link' href='?pagina=$proximaPagina2'>". $proximaPagina2 ."</a></li> ";     
          
          echo "<li class='page-item'><a class='page-link' href='?pagina=$proximaPagina1'>". " >> " ."</a></li> ";                
                }
   

          } 


  ?>
</ul>
</nav>

  <div id="modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="conteudo">
            
              <p> </p>

          </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>


    
  <script>

    
/*
    $("#botao" ).click(function(){
     // alert("I want this to appear after the modal has opened!");
      //  alert();
    
      a = $(".modal").trigger('focus'); 

       $("#modal").modal();

     //alert(a); 
    //$(".modal").trigger('focus');
  });

  */

    function modal(id){

        //alert(id);


        var idProduto = id;

        url = "editarProduto.php?id"+idProduto; 

        $.ajax({
                    url: "editarProduto.php?",
                    type: "GET",
                    dataType: "html",
                    data: {id: idProduto},
                    success: function(data) {
                    //called when successful

                    //console.log(data);

                    $("#modal").modal();
                     $("#conteudo").html(data);

                     a = $("#exampleFormControlTextarea1").val();

                     a.trim();

                     $("#exampleFormControlTextarea1").val(a.trim());
                     
                      $("#precoProdutoCompra").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
 
                      $("#precoVendaProduto").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});


                    },
                    error: function(e) {
                    //called when there is an error
                    //console.log(e.message);
                    }
              });
      
                 $("#precoProdutoCompra").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
 
                      $("#precoVendaProduto").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

     }


     function alteraMaiusculo(){
  var valor = document.getElementById("exampleFormControlTextarea1").value;
  //alert(valor);

 var novoTexto = valor.toUpperCase();
 document.getElementById("exampleFormControlTextarea1").value = novoTexto;
  }
     
     function alteraMaiusculo1(){
      //alert("ava")


  var valor = document.getElementById("inputAddress").value;
  //alert(valor);



 var novoTexto = valor.toUpperCase();
 document.getElementById("inputAddress").value = novoTexto;



  }

  function numeros(valor)
{
 
   $("#precoVendaProduto").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
 

   $("#precoProdutoCompra").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
 
    //alert(valor.id);
 
 }    

function numeros1(campo)
{

 // alert(campo.id)
    a = document.getElementById(campo.id).value;

    if ( isNaN(a) ) {
        b = a.substr( 0 , a.length - 1 );
      document.getElementById(campo.id).value = b;
}

  

}﻿
    $( document ).ready(function() { 

 $("#precoVendaProduto").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
 

   $("#precoProdutoCompra").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});


});


   
  </script>


  </body>
  </html>
