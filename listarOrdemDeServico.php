<?php
 
	//echo "Exercitando a programação em PHP"; 
  

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

  	 $sql = "select * from tabela_ordem_de_servico";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 

    //seleciona todos os itens da tabela 
    $cmd = "select * from tabela_ordem_de_servico inner JOIN tabela_clientes on tabela_clientes.id_cliente = tabela_ordem_de_servico.fk_id_cliente"; 
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
    $cmd = "select * from tabela_ordem_de_servico
inner JOIN tabela_clientes on tabela_clientes.id_cliente = tabela_ordem_de_servico.fk_id_cliente inner JOIN
tabela_usuario on tabela_usuario.id_usuario = tabela_ordem_de_servico.fk_id_funcionario limit $inicio,$registros"; 
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
	<title>Listar ordem de Servico</title>
 
 <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
 <link rel="stylesheet" href="./css/bootstrap.min.css">


 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">


<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   <script type="text/javascript" src="./js/maskMoney.min.js"></script>


<script src="./js/bootstrap.min.js"></script>

<script src="./js/letrasMaiusculas.js"></script>

<script src="./js/pesquisarCliente.js"></script>

<script src="./js/pesquisarCliente.js"></script>

<script src="./js/pesquisarUsuario.js"></script>



</head>
<body>

<div class="container">
	
	<div id="menu">
		<?php include("template/menu.php"); ?>
	</div><!-- menu -->

	 <div class="row">
	 	<div class="col-xs-12">
	 		

<table class="table table-striped">
  
  <thead>
      <tr>
        <th>Id Ordem de Serviço</th>
        <th>Nome do Cliente</th>
        <th>Nome do Funcionario</th>
        <th>Status</th>
        <th>Data Inicio</th>

        <th>Opsções</th>
      </tr>
    </thead>

<?php
     
      // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($produtos))
 {
   $idOrdemServico = $registro['id_ordem_de_servico'];
   $idCliente = $registro['id_ordem_de_servico'];
 
   echo "<tr>";    
   echo "<td> ".$registro['id_ordem_de_servico'] ."</td>";
   echo "<td> ".$registro['nome_cliente'] ."</td>";   
   echo "<td> ".$registro['nome_usuario'] ."</td>";   
   echo "<td> ". utf8_encode($registro['status_ordem_de_servico']) ."</td>";   
   echo "<td> ".$registro['data_inicial_ordem_de_servico'] ."</td>";   
       
   echo "<td> 
   <a href='deletarOrdemDeServico.php?usuario=$idCliente'><button type='button' class='btn btn-primary'>Deletar</button></a>

       <a id='<?php print_r($idCliente) ?>' onclick='modal(this.id);' href='#?usuario=$idCliente'>  <button type='button' class='btn btn-success'>Editar</button></a>

   <a href='detalharOrdemDeServico.php?id= $idCliente'><button type='button' class='btn btn-danger'>Detalhar</button></a>";
   echo "</td>";
   echo "</tr>";

 }


?>
<!-- &teste=$nome -->
 </table>	 		
	 	</div><!-- coluna -->
	 </div><!-- linha -->

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


<!-- modal editar cliente -->

<div id="modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Ordem de Serviço</h5>
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
  
  function modal(id){

         //alert(id);


        var idProduto = id;
        var a = id;

        var b = a.replace(/[^0-9]/g,'');

        //alert(b);

        url = "editarClientePagina.php?id"+idProduto; 

        $.ajax({
                    url: "editarOrdemDeServicoPagina.php?id=b",
                    type: "GET",
                    dataType: "html",
                    data: {id: b},
                    success: function(data) {
                    //called when successful

                    //console.log(data);

                    $("#modal").modal();
                     $("#conteudo").html(data);

                     

                   
                    },
                    error: function(e) {
                    //called when there is an error
                    //console.log(e.message);
                    alert();
                    }
              });
      
                 

     }



</script>




</div><!-- container -->

</body>
</html>