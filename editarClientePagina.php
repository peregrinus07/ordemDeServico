<?php

	$id = $_GET["id"];


	echo $id ."<br>";
 
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
     
  	 $sql = "SELECT * FROM tabela_clientes where id_cliente='$id'";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 	  while ($registro = mysqli_fetch_array($resultado))
   {

   		$idCliente = $registro["id_cliente"];
   		$nomeCliente = $registro["nome_cliente"];
		$cpfCnpjCliente = $registro["cpf_cnpj_cliente"];
		$emailCliente = $registro["e_mail_cliente"];
		$telefoneCliente = $registro["telefone_cliente"];
 
	//	echo "telefone cliente: " .$telefoneCliente;

   		//echo $idCliente ."<br>";
		//echo $nomeCliente ."<br>";

  
} // while


  $sql ="SELECT * from tabela_endereco_cliente
where fk_id_cliente ='$idCliente'
";

$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 while ($registro = mysqli_fetch_array($resultado))
   {
       $idRua = $registro["fk_id_rua"];
       $numero_endereco = $registro["numero_endereco_cliente"];
   }


$sql ="select * from tabela_clientes, tabela_endereco_cliente, tabela_descricao_rua,
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


$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 while ($registro = mysqli_fetch_array($resultado))
   {
       $rua = $registro["nome_da_rua"];
       $bairro = $registro["nome_bairro"];
       $cidade = $registro["nome_cidade"];
       $estado = $registro["nome_estado"];
       $siglaEstado = $registro["sigla_estado"];
       $cep = $registro["cep_rua"];
   }

  //print_r("id: ".$idCliente);

  //print_r("id da rua: ".$idRua." :".$rua." Bairro :".$bairro);


?>

<html>
<head>
	 
	 <link rel="stylesheet" href="./css/bootstrap.min.css">
 
 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">


<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   <script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script src="./js/bootstrap.min.js"></script>

  <script src="./js/listarCidades.js"></script>
  <script src="./js/mascaraEndereco.js"></script>
  <script src="./js/listarLogradouro.js"></script>
   
   <!-- Latest compiled and minified CSS -->
   <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->
   

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

 
   
   
<script>
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


    });  */

       
 

           /*
 
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
  

      $("#limparCampos").on('click', function() {

        //alert("teste");
  
      $("#formulario").find('input').val('');

    }); // limpar campos


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
      source: "buscar_endereco.php?teste=" + "aldeota" + "",

       });
 

      });


*/

});


</script>


</head>
<body>

	<div class=".container">

	<div class="row">
		<div class="col-lg-12">
		 
		 
      <form id="formulario" class="form-group" style="border:10px; margin-left: 50px; margin-top: 1px;" action="
      editarClienteMysql.php?id=<?php echo $idCliente; ?>" method="POST">
   
      <legend style="">Cadastrar Cliente</legend>

    <div class="form-group">
    <label for="inputAddress">Nome do Cliente:</label>
    <input type="text" value="<?php echo $nomeCliente; ?>" name="nomeCliente" class="form-control" id="inputAddress" placeholder="">
    </div>

    <div class="form-row">
<!--
       <div class="form-group col-md-4">
      <label for="inputPassword4">Cpf</label>
      <input type="text"  name="rg" class="form-control" id="cpf" placeholder="">
    </div>
-->
    <div class="form-group col-md-4">
      <label for="inputPassword4">Cpf</label>
      <input type="text" value="<?php echo $cpfCnpjCliente; ?>" name="cpf" class="form-control" id="cpf" placeholder="">
    </div>

    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" value="<?php echo $emailCliente; ?>" name="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Telefone</label>
      <input type="text" value="<?php echo $telefoneCliente; ?>" name="telefone" class="form-control" id="telefone" placeholder="">
    </div>
  

  </div> <!-- form - row -->
  
   <div class="form-row">
     
     <div class="form-group col-md-4">
      <label for="inputEstado">Estado</label>
      <select name="estado" id="estados" class="form-control">
         <option value="<?php print_r($siglaEstado) ?>"><?php print_r($estado) ?></option>
      </select>

</div> <!-- linha -->

      <div class="form-group col-md-4">
      <label for="inputCity">Cidade</label>
      <select id="cidades" name="cidades" class="form-control">
        <option value="<?php print_r($cidade) ?>"><?php print_r($cidade) ?></option>
      </select>
     </div>

      <div class="form-group col-md-4">
      <label for="inputCity">Bairro</label>
      <select id="bairro" name="bairro" class="form-control">
       <option value="<?php print_r($bairro) ?>"><?php print_r($bairro) ?></option>
      </select>
      </div>

<div class="form-group col-md-6">
    <label for="inputAddress">Endereço</label>
    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua dos Bobos, nº 0" value="<?php print_r($rua) ?>"> 
  </div>

  <div class="form-group col-md-2">
    <label for="inputAddress">Numero</label>
    <input type="text" class="form-control" name="numero" id="numero" placeholder="Nº" value="<?php print_r($numero_endereco) ?>">
  </div>
  
 <div class="form-group col-md-4">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" name="cep" id="cep" value="<?php print_r($cep) ?>">

      <input type="hidden" name="id" value="<php echo $idCliente; ?>" />

    </div>

   </div> <!-- form-row -->

<button type="submit" class="btn btn-primary">Cadastrar</button>
<button type="button" id="limparCampos" class="btn btn-danger">Limpar Campos</button>

      <p><a href="listarClientes.php"><p>Listar Clientes<p></a><p>

    </form> 

	
		</div><!-- coluna -->	
	</div><!-- linha -->

    </div> <!-- container -->

</body>
</html>
