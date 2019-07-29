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
     
  	 $sql = "SELECT * FROM tabela_servico where id_servico='$id'";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 	  while ($registro = mysqli_fetch_array($resultado))
   {

   		$idServico = $registro["id_servico"];
   		$nomeServico = $registro["nome_servico"];
		$precoServico = $registro["preco_servico"];
		$descricaoServico = $registro["descricao_servico"];
		$telefoneCliente = $registro["telefone_cliente"];
 
	//	echo "telefone cliente: " .$telefoneCliente;

   		//echo $idCliente ."<br>";
		//echo $nomeCliente ."<br>";

  
} // while


      //$valor = str_replace('.',',', $precoServico);

      //$precoServico = $valor;

  $sql ="SELECT * from tabela_servico
where id_servico ='$idCliente'
";

$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 while ($registro = mysqli_fetch_array($resultado))
   {
       $idRua = $registro["fk_id_rua"];
       $numero_endereco = $registro["numero_endereco_cliente"];
   }


$sql ="select * from tabela_servico";


$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 while ($registro = mysqli_fetch_array($resultado))
   {
       $rua = $registro["nome_da_rua"];
       $bairro = $registro["nome_bairro"];
       $cidade = $registro["nome_cidade"];
       $estado = $registro["nome_estado"];
       $siglaEstado = $registro["sigla_estado"];
       $cep = $registro["cep_endereco_cliente"];
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
  <script src="./js/listarCep.js"></script>
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
  
      var preco = $("#preco").val();

 
    a = preco.toString().replace(".", ",");
 
      //alert(a);

      $("#preco").html(a);
      $("#preco").load(" #preco");
 
var x = document.getElementById("preco");
    x.focus();
    $("#nome").focus();
    $("#nome").blur();
         $("#preco").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

/*x.addEventListener('focus', (event) => {
  event.target.style.background = 'pink';    
});
*/

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
		 
		 <?php print_r("teste".$id); ?>
      <form id="formulario" class="form-group" style="border:10px; margin-left: 50px; margin-top: 1px;" action="
      atualizarServicoPhpMysql.php?id=<?php echo $id; ?>" method="POST">
   
      <legend style="">Editar Servico</legend>

        <div class="form-row" style="margin-top: 5%;">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome <span id="validacao"></span></label>
      <input onkeyup="upCase(this);" id="nome"  type="te
      xt" value="<?php print_r($nomeServico) ?>"name="nomeServico" class="form-control" id="inputEmail4" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Preço</label>
      <input type="text" name="precoServico" id="preco" value="<?php print_r($precoServico)?>" class="form-control decimal" id="telefone" placeholder="00,00">
    </div>
  
 <label  for="inputAddress" style="margin-top: 3%;">Descrição</label>
  </div> <!-- form - row -->
 <div class="form-group">
   
     <textarea  name="descricaoServico" rows="4" cols="60" >
  <?php print_r($descricaoServico)?>
  </textarea> 
    </div><!-- form-group -->



<button type="submit" class="btn btn-primary">Cadastrar</button>
<button type="button" id="limparCampos" class="btn btn-danger">Limpar Campos</button>

      <p><a href="listarClientes.php"><p>Listar Clientes<p></a><p>

    </form> 

	
		</div><!-- coluna -->	
	</div><!-- linha -->

    </div> <!-- container -->

</body>
</html>
