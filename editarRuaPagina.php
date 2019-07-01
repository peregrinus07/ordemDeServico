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
     

header('Content-Type: text/html; charset=utf-8');

//após a conexão com o BD
mysqli_query($conn,"SET NAMES 'utf8'");

mysqli_query($conn,'SET character_set_connection=utf8');

mysqli_query($conn,'SET character_set_client=utf8');

mysqli_query($conn,'SET character_set_results=utf8'); 



  	 $sql = "select * from tabela_descricao_rua, tabela_bairro, tabela_cidade, tabela_estado
WHERE id_descricao_rua = '$id'
AND tabela_descricao_rua.id_bairro = tabela_bairro.id_bairro AND tabela_bairro.id_cidade = tabela_cidade.id_cidade
AND tabela_cidade.id_estado = tabela_estado.id_estado
";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

 	  while ($registro = mysqli_fetch_array($resultado))
   {

      $estado = $registro["nome_estado"];

      $cidade = $registro["nome_cidade"];

   		$idCliente = $registro["id_descricao_rua"];
   		$nomeCliente = $registro["nome_da_rua"];
		$cpfCnpjCliente = $registro["cpf_cnpj_cliente"];
		$emailCliente = $registro["e_mail_cliente"];
		$telefoneCliente = $registro["telefone_cliente"];

	//	echo "telefone cliente: " .$telefoneCliente;

   		//echo $idCliente ."<br>";
		//echo $nomeCliente ."<br>";

}

?>

<html>
<head>
	 <meta charset="UTF-8">
	 <link rel="stylesheet" href="./css/bootstrap.min.css">
 
 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">


<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   <script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script src="./js/bootstrap.min.js"></script>

  <script src="./js/listarCidades.js"></script>
   
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

 
    <script src="./js/editarCidades.js"></script>
   
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

        $("input.data").mask("99/99/9999");
       // $("input.cpf").mask("999.999.999-99");
          $("#cpf").mask("999.999.999-99");  


        $("input[name='cep'").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');

         $("input[name='telefone']").mask("(99) 999.999-999");
         


         $("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});



          $("input[name='cep'").keypress(function(){
        
            $("input[name='cep'");
           
});


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
 
    <input type="hidden" value="<?php print_r($id) ?>" name="">

<div id="cadastrarRua">
         <!-- cadastrar Rua -->
       <div id="formularioRua" style="float: left; margin-left: -15%; margin-top:-2%;">
  
      <form style="border:10px; margin-left: 400px; margin-top: 80px;" action="
      cadastrarEnderecoPhpMysql.php" method="POST">
   
      <legend style="">Editar Endereço</legend>

      <!--
      <img class="img" onclick="modal(3);" style="width: 30px; height: 30px;" src="./img/adicionar.png">
       -->


 
       <div class="form-row" style="margin-top: 10%;">
      
         <div class="form-group col-md-4">
      <label for="inputEstado" >Estado <img class="img" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      <select  name="estado" id="estados" class="form-control">
       <!-- <option selected>Escolher...</option> -->
        <!-- <option>...</option> -->
        <option id="estados2" selected><?php print_r($estado) ?></option>
         
      </select>
    </div>


     <div class="form-group col-md-4">
      <label for="inputCity">Cidade <img id="imgCidade" class="img" style="width: 30px; height: 30px;" onclick="getData(2);" src="./img/adicionar.png"></label>
      <select id="cidades" name="cidades" class="form-control"><option><?php print_r($cidade) ?></option></select>
    </div>

      <div class="form-group col-md-4">
      <label for="inputCity">Bairro <img class="img" id="imgBairro" onclick="getData(3)" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      <select id="bairro" name="bairro" class="form-control">
       
      </select>
      </div>


      </div><!-- linha -->
 
    <div class="form-row" style="margin-top:1%;">
    
    <div class="form-group col-md-12">
    <label for="inputAddress">Endereço</label>
   <input type="text" class="form-control" name="endereco" id="endereco" value="<?php print_r($nomeCliente)?>" placeholder="Rua dos Bobos, nº 0">
  </div>
   

      <div class="form-group col-md-6">
      <label for="inputCEP">CEP</label>
       <input type="text" class="form-control" name="cep" id="cep">
    </div>
    
        <div class="form-group col-md-12"> 
        <input type="hidden" name="cadastrarBairro" value="cadastrarEndereco">
   </div>
  </div>
   


  <button type="submit" class="btn btn-primary">Cadastrar</button>

  <p><a href="listarCidades.php"></p>listar Cidades<p></a></p>
  
  </div> <!-- linha -->
   
    </form>
 

    </div> <!-- formulario rua -->    
 
       </div><!-- cadastrar rua -->

    </div> <!-- container -->

</body>
</html>
