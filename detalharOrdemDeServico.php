<?php

	$id = $_GET["id"];


	echo $id ."<br>";

	include("conexao.php");


  	 $sql = "select * from tabela_ordem_de_servico inner JOIN tabela_clientes on tabela_clientes.id_cliente = tabela_ordem_de_servico.fk_id_cliente
inner JOIN tabela_usuario on tabela_usuario.id_usuario = tabela_ordem_de_servico.fk_id_funcionario
where id_ordem_de_servico='$id'";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 	  while ($registro = mysqli_fetch_array($resultado))
   {

   		$idOrdemDeServico = $registro["id_ordem_de_servico"];
   		$nomeDocliente = $registro["nome_cliente"];
		  $nomeFuncionario = $registro["nome_usuario"];
      $statusOrdemDeservico = utf8_encode($registro["status_ordem_de_servico"]);
      $dataInicial = $registro["data_inicial_ordem_de_servico"];

	  $dataFinal = $registro["data_final_ordem_de_servico"];


      $dataInit = date('y', strftime($dataInicial));

      $garantia = $registro["garantia_ordem_de_servico"];
      $descricao = $registro["descricao_produto_servico"];

      $defeito = $registro["defeito_ordem_de_servico"];
      
      $observacao = $registro["observacao_ordem_de_servico"];

      $laudo = $registro["laudo_tecnico_ordem_de_servico"];


      $cpfCnpjCliente = $registro["cpf_cnpj_cliente"];
		  $emailCliente = $registro["e_mail_cliente"];
		  $telefoneCliente = $registro["telefone_cliente"];

	//	echo "telefone cliente: " .$telefoneCliente;

   		//echo $idCliente ."<br>";
		//echo $nomeCliente ."<br>";

}




?>


<!DOCTYPE html>
<html>
<head>
  <title>Detalhar Cliente</title>
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

 	<h3>Detalhar Ordem de Servico</h3>
 	<br>

 <div class="row">
   
  <div class="col-lg-12">
    


<table class="table table-striped">
  
  <thead>
      <tr>
        <th>Id Ordem de Servico</th>
        <th>Nome Cliente</th>
        <th>Nome Funcionário</th>
        <th>Status</th>
        <th>Data inicial</th>
        <th>Data Final</th>
        <th>Garantia</th>	
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
$sql = "select * from tabela_clientes 
WHERE
tabela_clientes.id_cliente ='$id'
";

$result_query = mysqli_query($conn,$sql ) or die(' Erro na query:');
  

//$cidade = mysqli_query($conn,$sql) or die("Erro ao retornar dados"); 
 

  $sql_endereco ="  select * from tabela_clientes, tabela_endereco_cliente, tabela_descricao_rua,
  tabela_bairro, tabela_cidade, tabela_estado
  where tabela_clientes.id_cliente='$id'
  and
  tabela_clientes.id_cliente = tabela_endereco_cliente.fk_id_cliente
  and
  tabela_descricao_rua.id_descricao_rua = tabela_endereco_cliente.fk_id_rua
  and 
  tabela_descricao_rua.id_bairro = tabela_bairro.id_bairro
  and
  tabela_cidade.id_cidade = tabela_bairro.id_cidade
  and
  tabela_estado.id_estado = tabela_cidade.id_estado
  order by tabela_clientes.id_cliente asc limit 1
";

  
$result = mysqli_query($conn,$sql_endereco ) or die(' Erro na query:');
  

while ($row = mysqli_fetch_array($result))
 {


  $fk_id_cliente = $row['fk_id_cliente'];

   $fk_rua = $row['fk_id_rua'];

   $cepCliente = $row["cep_endereco_cliente"];

   if ($cepCliente =="") {
      $cepCliente ="vazio";
   }

   $estado = $row['nome_estado'];

  $idRua = $row['id_descricao_rua'];  
 
 } // while


 //print_r("cliente ".$cepCliente);


 while ($row = mysqli_fetch_array($result_query))
 { 
 
   $nome = $row['nome_cliente'];
   //$idRua = $registro['id_descricao_rua'];
 
   $idCliente = $row['id_cliente'];
  
    //print_r("Id rua: ".$fk_rua);

   //$cep = $registro['cep_rua'];
  

  $nome2 = $nomeTeste;
    // $cep ="0.0.0.0.0.0";

   
$sql3 ="select count(id_endereco_cliente) AS total from tabela_endereco_cliente where fk_id_cliente='1'
";
 
  

   $endereco = mysqli_query($conn,$sql3) or die("<br>Erro ao tentar cadastrar rua");


    $value = mysqli_fetch_assoc($endereco); 

   $numRows = $value['total'];

   if($numRows == 1){

       $cep ="vazio";
       $estado="vazio";
       $sigla_estado="vazio";
       $cidade="vazio";
       $bairro="vazio";
       $rua="vazio";
       $numeroDarua="vazio";

          $sql ="select * from tabela_ordem_de_servico where
	id_ordem_de_servico =$id";

  $sql_query =" select * from tabela_clientes, tabela_endereco_cliente, tabela_descricao_rua,
  tabela_bairro, tabela_cidade, tabela_estado
  where tabela_clientes.id_cliente='$id'
  and
  tabela_clientes.id_cliente = tabela_endereco_cliente.fk_id_cliente
  and
  tabela_descricao_rua.id_descricao_rua = tabela_endereco_cliente.fk_id_rua
  and 
  tabela_descricao_rua.id_bairro = tabela_bairro.id_bairro
  and
  tabela_cidade.id_cidade = tabela_bairro.id_cidade
  and
  tabela_estado.id_estado = tabela_cidade.id_estado
  order by tabela_clientes.id_cliente asc limit 1";

$ceps = mysqli_query($conn,$sql) or die("Erro ao retornar dados"); 
 
  while ($reg = mysqli_fetch_array($ceps))
 { 

    $teste = $reg['laudo_tecnico_ordem_de_servico'];
    $sigla_estado = $reg['sigla_estado'];
    $cidade = $reg['nome_cidade'];
    $bairro = $reg['nome_bairro'];
    $rua = $reg['nome_da_rua'];
    $numeroDarua = $reg['numero_endereco_cliente'];
    $cep = $reg['cep_rua'];
  
 } // while
     
    } 
    else{
      $cep="-";
    }


   //$cep = cep($idRua);


 
   echo "<tr>";    
   echo "<td> ".$idOrdemDeServico."</td>";
   echo "<td> ".$nomeDocliente."</td>";
   echo "<td> ".$nomeFuncionario ."</td>";
   echo "<td> ".$statusOrdemDeservico ."</td>";   
   echo "<td> ".$dataInicial . "</td>";   
      
   echo "<td> ".$dataFinal. "</td>";   
   echo "<td> ".$garantia. "</td>";   
   
   /*echo "<td> 
   <a href='deletarRua.php?rua=$idRua'><button type='button' class='btn btn-primary'>Deletar</button></a>
   <a id='$idRua' onclick='modal(this.id);' href='#?usuario=$idRua&teste=$nome'> <button type='button' class='btn btn-success'>Editar</button></a>
   <a href='detalharCidade.php?rua=$idRua
   '><button type='button' class='btn btn-danger'>Detalhar</button></a>";
   echo "</td>";
   echo "</tr>";
 */

} // while

  
      // Obtendo os dados por meio de um loop while

?>
 
<thead style="margin-top:5%;">
      <tr>
        <th>Descrição</th>
        <th>Defeito</th>
        <th>Observação</th>
        <th>Laudo</th>

      </tr>
      <tr>
      	<td><?php print_r($descricao) ?></td>
      	<td><?php print_r($defeito) ?></td>
      	<td><?php print_r($observacao) ?></td>
      	<td><?php print_r($laudo) ?></td>
      	
      </tr>
</thead>


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