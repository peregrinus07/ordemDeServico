<?php
 
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

	
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 

    //seleciona todos os itens da tabela 
    $cmd = "select * from tabela_produto"; 
    $produtos = mysqli_query($conn,$cmd) or die("Erro ao retornar dados");

    //conta o total de itens 
    $total = $produtos->num_rows;  

    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 3; 
  
    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 

    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros;

    //seleciona os itens por página 
    $cmd = "select * from tabela_produto limit $inicio,$registros"; 
    $produtos = mysqli_query($conn,$cmd) or die("Erro ao retornar dados"); 
    $total = $produtos->num_rows;

    echo"<h1>Produtos</h1>";
    echo "<table class='table table-striped '>"; 
    echo  "<thead>";
    echo  "<tr>";
    echo  "<th scope='col'>Id</th>";
    echo  "<th scope='col'>Produto</th>";
    echo  "<th scope='col'>Descricao Produto</th>";
    echo  "<th scope='col'>Preço de compra produto</th>";
    echo  "</tr>";
    echo  "</thead>";
    echo  "<tbody>";
    while ($produto = mysqli_fetch_array($produtos)) {
          
           $idProduto = $produto["id_produto"];
           $nomeProduto = $produto["nome_produto"];
           $descricaoproduto = $produto["descricao_produto"];
           $precoDeCompraProduto = $produto["preco_de_compra_produto"];

           echo "<tr>";
           echo "<th>". $idProduto ."</th>";
           echo "<td>". $nomeProduto ."</td>";
           echo "<td>". $descricaoproduto ."</td>";
           echo "<td>". number_format($precoDeCompraProduto,2,',','.') ."</td>";
           echo "</tr>";
             
                 
    }
    echo "</tbody>";
    echo "<table>";
    $paginasPesquisa = ceil($total/$registros); 
    $registros = 2;

    $numLinks = ceil($total/$registros); 
 
 

    // paginação

     if($pagina>1){
 
        if($pagina==1) {

          $voltarPagina = $pagina -1;

          echo "<a href='?pagina=1'>"."<<"."</a> ";     

         }

        $voltarPagina = $pagina -1;

        echo "<a href='?pagina=$voltarPagina'>"." << "."</a> ";     

        }

 
          $proximaPagina1 = $pagina+1;     
          $proximaPagina2 = $pagina+2;     
           
          if($pagina==1){

             $PaginaAnterior1 = $pagina;     
        
           echo "<a href='?pagina=$PaginaAnterior1'>". " <<  " ."</a> ";  


          } else {

          $PaginaAnterior1 = $pagina-1;     
        
           echo "<a href='?pagina=$PaginaAnterior1'>". $PaginaAnterior1 ."</a> ";         
          }



           echo "<a href='?pagina=$pagina'>[". $pagina ."]</a> ";



          if($numPaginas ==$pagina) {

            echo "<a href='?pagina=$pagina'>". ">>" ."</a> "; 

          }

          else {
  

              if($proximaPagina2>$numPaginas){

                echo "<a href='?pagina=$proximaPagina1'>". $proximaPagina1 ."</a> ";
                echo "<a href='?pagina=$proximaPagina1'>". ">>" ."</a> ";

              }
                else{

                             echo "<a href='?pagina=$proximaPagina1'>". $proximaPagina1 ."</a> ";

          echo "<a href='?pagina=$proximaPagina2'>". $proximaPagina2 ."</a> ";     
          
          echo "<a href='?pagina=$proximaPagina1'>". " >> " ."</a> ";                
                }
   

          }  
        
   

         
    /*

     //exibe a paginação 
    for($i = 1; $i < $numLinks + 1; $i++) { 
 
        if($pagina ==$i) {

        echo "<a href='?pagina=$i'>".$i."</a> ";     

        } else {


          echo "<a href='?pagina=$i'>[".$i."]</a> ";     

        }
 
        if($numLinks == $i){
 
         $pagina += 1;

          echo "<a href='?pagina=$pagina'>". ">>" ."</a> ";     
            
        }

    } 

    */



	 	 //$sql = "SELECT * FROM tabela_produto WHERE nome_produto LIKE '%$busca%'";

   
  //echo "teste numero de result " .$resultado->num_rows;

  //echo utf8_encode($exibe['recadao_mensagem']);

/*   update tabela_produto set id_categoria_produto = (select id_categoria_produto from tabela_categoria_produto  where id_categoria_produto ='1') where tabela_produto.nome_produto like '%a%';
 
*/
 
	 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['nome_produto'];
   $id = $registro['id_produto'];
   echo "<br>";
   echo "<br>";
   echo "<tr>";
   echo "<td> nome do cliente: ".$id."</td>";
   echo "</tr>";
   echo "<br>";
 }
 mysqli_close($strcon);
 echo "</table>";
  
	  
?>



<?php

   
  

?>


<html>

  <head>
    
    <link rel="stylesheet" href="./css/bootstrap.min.css">

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>


<script src="./js/bootstrap.min.js"></script>
  </head>

	<div class="container-fluid">

	<div class="row">
	<div class="col-lg-4"> 
	
	<h1>Produtos</h1>
	
	</div> <!-- div coluna -->	
	</div>

	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Primeiro</th>
      <th scope="col">Último</th>
      <th scope="col">Nickname</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


	<nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
  </ul>
</nav>



<nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
  </ul>
</nav>


<nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Anterior">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Anterior</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Próximo">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Próximo</span>
      </a>
    </li>
  </ul>
</nav>

<br>
<br>
<h1>Imagem</h1>
<br>
<form method="post" action="recebeUpload.php" enctype="multipart/form-data">
   Selecione uma imagem: <input name="arquivo" type="file" />
   <br />
   <input type="submit" value="Salvar" />
</form>

<img src="" width="" height="">

</div> <!-- container -->

</html>
