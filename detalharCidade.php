<?php 

	include("conexao.php");

	include_once("./funcoes/funcoes.php");

	$idRua = teste($_GET["rua"]);

	 //print_r("id:  ava".$idRua);

  
//print_r("id:  ava".$idRua);
 ?>


<!DOCTYPE html>
<html>
<head>
  <title>Detalhar Cidades</title>
<meta charset="UTF-8">

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

 	<h3>Detalhar Cidade</h3>
 	<br>

 <div class="row">
   
  <div class="col-lg-12">
    


<table class="table table-striped">
  
  <thead>
      <tr>
        <th>Id Rua</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Bairro</th>
        <th>Rua</th>
        <th>Cep</th>
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

   //print_r($idRua);
$sql = "select * from tabela_descricao_rua,
tabela_bairro, tabela_cidade, tabela_estado 
WHERE 
tabela_descricao_rua.id_bairro = tabela_bairro.id_bairro 
AND 
tabela_bairro.id_cidade = tabela_cidade.id_cidade 
AND 
tabela_cidade.id_estado = tabela_estado.id_estado
AND
tabela_descricao_rua.id_descricao_rua ='$idRua'
;

";

$result_query = mysqli_query($conn,$sql ) or die(' Erro na query:');
  

//$cidade = mysqli_query($conn,$sql) or die("Erro ao retornar dados"); 
 

 while ($row = mysqli_fetch_array($result_query))
 { 
 
   $nome = $row['nome_estado'];
   //$idRua = $registro['id_descricao_rua'];
 

   
  $nomeTeste = $row['nome_da_rua'];

   $nome = $row['nome_da_rua'];

  $idRua = $row['id_descricao_rua'];	

  //print_r("Id: a ".$nome);

   //$cep = $registro['cep_rua'];
  

  $nome2 = $nomeTeste;
    // $cep ="0.0.0.0.0.0";

   
$sql3 ="select count(id_cep_rua) AS total from tabela_cep_rua where id_rua='$idRua';
";

  

   $ceprua = mysqli_query($conn,$sql3) or die("<br>Erro ao tentar cadastrar rua");


    $value = mysqli_fetch_assoc($ceprua); 

   $numRows = $value['total'];

   if($numRows == 1){

       $cep ="a";
          $sql ="select * from tabela_cep_rua
where
tabela_cep_rua.id_rua ='$idRua'
";


$ceps = mysqli_query($conn,$sql) or die("Erro ao retornar dados"); 
 
  while ($reg = mysqli_fetch_array($ceps))
 { 

    $idCepRua = $reg['id_rua'];
    $cep = $reg['cep_rua'];
  
 } // while
     
    } 
    else{
      $cep="-";
    }


   //$cep = cep($idRua);


 
   echo "<tr>";    
   echo "<td> ".$idRua."</td>";
   echo "<td> ".$row['nome_estado']."</td>";
   echo "<td> ".$row['nome_cidade'] ."</td>";
   echo "<td> ".$row['nome_bairro'] ."</td>";   
   echo "<td> ".$nome2 . "</td>";   
      
   echo "<td> ".$cep . "</td>";   
   
   /*echo "<td> 
   <a href='deletarRua.php?rua=$idRua'><button type='button' class='btn btn-primary'>Deletar</button></a>
   <a id='$idRua' onclick='modal(this.id);' href='#?usuario=$idRua&teste=$nome'> <button type='button' class='btn btn-success'>Editar</button></a>
   <a href='detalharCidade.php?rua=$idRua
   '><button type='button' class='btn btn-danger'>Detalhar</button></a>";
   echo "</td>";
   echo "</tr>";
 */

} // 

  
      // Obtendo os dados por meio de um loop while

?>
 

 </table>
  </div><!-- coluna -->

 </div><!-- linha -->

 <nav aria-label="Navegação de página exemplo">
    <ul class="pagination">
   <?php 
/*
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

*/
  ?>
</ul>
</nav>



</body>
</html>