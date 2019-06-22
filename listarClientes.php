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

  	 $sql = "SELECT * FROM tabela_clientes";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 

    //seleciona todos os itens da tabela 
    $cmd = "select * from tabela_clientes"; 
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
    $cmd = "select * from tabela_clientes limit $inicio,$registros"; 
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

 <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
   
   <!-- Latest compiled and minified CSS -->
   <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->
   <link rel="stylesheet" href="./css/bootstrap.min.css">
 
 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   <script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script src="./js/bootstrap.min.js"></script>
 
  
  <style type="text/css">
    .ui-autocomplete{
   z-index: 1050 !important;
   font-family: "Times New Roman", Times, serif;
   
}
  </style>

  <script type="text/javascript">
  
    $( document ).ready(function() {
      
/*
      $("#estados").change(function() {
    //$('#pesquisaCliente').keyup(function(){
         
        // input[name='pesquisaCliente'
         var $nomeAluno = $("#estados");


          var $teste = $("#estados");
          //alert($teste.val());
          //alert ($nomeAluno.val());    

        $.ajax({

          url: 'bancoMysql.php',
          type: 'POST',
          data: {id: $nomeAluno.val()},

          beforeSend: function(){
          $("#cidades").css({'display':'block'});
            //$("body").html('<p>Carregando...</p>');
            $("#cidades").html('<p>Carregando</p>');

        },

          success: function(data)
                {
                  console.log(data);
                    $("#cidades").css({'display':'block'});
                    $("#cidades").html("");
                    $("#cidades").html(data);

                },

                 error: function(data)
                {
                    $("#cidades").css({'display':'block'});
                    $("#cidades").html("Houve um erro ao carregar");
                }

        }); 


    });
    */

        $("input.data").mask("99/99/9999");
       // $("input.cpf").mask("999.999.999-99");
          //$("#cpf").mask("999.999.999-99");  

          $("input[name='cpf']").mask("999.999.999-99");  

        $("input[name='cep'").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');

         $("input[name='telefone']").mask("(99) 999.999-999");
         


         $("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});



          $("input[name='cep'").keypress(function(){
        
            $("input[name='cep'");
           
});


            // campo endereco

           $("input[name='inputAddress']").keypress(function(){
   
        var teste = $("#cidades option:selected").val();

       // var QtdAcomodacaoD = $("#cidades option:selected").val();

        var QtdAcomodacaoD = "CE";
        // alert(teste);
 
         

        if(teste =="registre uma cidade" || teste == null) {

          console.log("teste"); 
        }

         else {

            console.log("perseverança\n");
            console.log("Cidade: "+teste);
 
           $("#inputAddress").autocomplete({
     
             // fonte dos dados
             source: "processar_pesquisa.php?teste=" + teste + "",

            });


        } // else
 
      }); // keypress

 
          // carregar bairros
     $("#cidades").change(function() {
    //$('#pesquisaCliente').keyup(function(){
         
        // input[name='pesquisaCliente'
         var $nomeAluno = $("#cidades");


          //var $teste = $("#estados");
          //alert($teste.val());
           //alert ($nomeAluno.val());    

        $.ajax({

          url: 'listar_bairros_jquery.php',
          type: 'POST',
          data: {id: $nomeAluno.val()},

          beforeSend: function(){
          $("#bairro").css({'display':'block'});
            //$("body").html('<p>Carregando...</p>');
            $("#bairro").html('<p>Carregando</p>');

        },

          success: function(data)
                {
                  console.log(data);
                    $("#bairro").css({'display':'block'});
                    $("#bairro").html("");
                    $("#bairro").html(data);

                },

                 error: function(data)
                {
                    $("#bairro").css({'display':'block'});
                    $("#bairro").html("Houve um erro ao carregar");
                }

        }); 


    });
 /*
        //listar endereços
      $("#endereco").keyup(function(){
   
         // select cidade
         var cidade = $("#cidades option:selected").val();


         if(cidade =="" || cidade =="registre uma cidade" || cidade==null){

              alert("Selecione uma Cidade");

         }

         else {

          var bairro = $("#bairro option:selected").val();

          if(bairro =="" || bairro =="Selecione um bairro" || bairro==null){

              alert("Selecione um bairro");

          } // if


         }


         var teste = $("#bairro option:selected").val();

          //alert(teste);

         //var QtdAcomodacaoD = $("#cidades option:selected").val();

        //var QtdAcomodacaoD = "CE";
       //  alert(QtdAcomodacaoD);
 
     //var nome = $("#test").val();

     //var nome =  $("#cidades").val();

     //alert("Value: " + nome);


     //console.log("bairro selecionado: "+teste);
    $("#endereco").autocomplete({
     
      // fonte dos dados
      source: "buscar_endereco.php?teste=" + teste + "",

       });
 

      });
*/
      $("#limparCampos").on('click', function() {

        //alert("teste");
  
      $("#formulario").find('input').val('');

    }); // limpar campos


});
 </script>


</head>
<body>
<div class="container">

   
    <?php include("menu.php"); ?>
   

  <!-- Form Name -->
      <legend style="margin-left: 11px; margin-top: 2%;"><a href="index.php">Voltar</a></legend>
  
      <!-- 
  <h2><a href="index.php">Voltar</a></h2>
 -->

 	<h3>Lista de clientes</h3>
 	<br>

 <div class="row">
   
  <div class="col-lg-12">
    


<table class="table table-striped">
  
  <thead>
      <tr>
        <th>Id do Cliente</th>
        <th>Nome do Cliente</th>
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
   $nome = $registro['nome_cliente'];
   $idCliente = $registro['id_cliente'];
 
   echo "<tr>";    
   echo "<td> ".$registro['id_cliente'] ."</td>";
   echo "<td> ".$registro['nome_cliente'] ."</td>";   
   echo "<td> 
   <a href='deletarCliente.php?usuario=$idCliente'><button type='button' class='btn btn-primary'>Deletar</button></a>
   <a id='$idCliente' onclick='modal(this.id);' href='#?usuario=$idCliente&teste=$nome'> <button type='button' class='btn btn-success'>Editar</button></a>
   <a href='deletarCliente.php'><button type='button' class='btn btn-danger'>Detalhar</button></a>";
   echo "</td>";
   echo "</tr>";

 }


?>
 

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
</ul>
</nav>



<!-- modal editar cliente -->

<div id="modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Cliente</h5>
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

        url = "editarClientePagina.php?id"+idProduto; 

        $.ajax({
                    url: "editarClientePagina.php?id",
                    type: "GET",
                    dataType: "html",
                    data: {id: idProduto},
                    success: function(data) {
                    //called when successful

                    //console.log(data);

                    $("#modal").modal();
                     $("#conteudo").html(data);

                     

                   
                    },
                    error: function(e) {
                    //called when there is an error
                    //console.log(e.message);
                    }
              });
      
                 

     }



</script>


</body>
</html>