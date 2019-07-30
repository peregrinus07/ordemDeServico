<?php

	$id = $_GET["id"];


	echo $id ."<br>";



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

<html>
<head>
	 
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
  width: 1250px;
  margin-left: -370px;
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

	<div class="row">
		<div class="col-lg-12">
		 
		 
      <form id="formulario" class="form-group" style="border:10px; margin-left: 50px; margin-top: 1px;" action="
      EditarOrdemDeServicoPhpMysql.php?id=<?php echo $idOrdemDeServico; ?>" method="POST">
   
      <legend style="">Editar Ordem de Serviço <?php 

      $data = date_create('2000-01-01');
      $dt = new DateTime($dataInicial); 
      $dt2 = new DateTime($dataFinal);
      $a = $dataInicial;
      $b = date_format($dt,'Y-m-d');
      $dt = date_format($dt2,'Y-m-d');

      echo "ava " .$b;  ?></legend>

      
    <div class="form-row" style="margin-top: 5%;">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Cliente <span id="validacao"></span></label>
      <input onkeyup="upCase(this);" id="nomeCliente"  type="text" name="nomecliente" value="<?php echo $nomeDocliente; ?>" class="form-control" id="inputEmail4" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Técnico Responsável</label>
      <input onkeyup='upCase(this)'type="text"  value="<?php echo $nomeFuncionario ?>" id="resopnsavelServico" name="resopnsavelServico" class="form-control decimal"   placeholder="Técnico">
    </div>
    </div><!-- div form-row-->



  <div class="form-row">
    
      <div class="form-group col-md-3">
      <label for="inputEmail4">Status <span id="validacao"></span></label>
      <!-- 
      <input onkeyup="upCase(this);"
        value="<?php echo $statusOrdemDeservico ?>"    type="text" name="status" class="form-control" id="inputEmail4" placeholder="status">
      -->
      <select name="status" id="status" class="form-control">
        <option id="statusOpscao" selected>Escolher...</option>
        <option value="orcamento">Orçamento</option>
        <option value="iniciado">Iniciado</option>
        <option value="emAndamento">Em andamento</option>
        <option value="finalizado">Finalizado</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4"> Data Inicial</label>
      <input type="date" value="<?php echo $b  ?>" name="dataInicial"  class="form-control decimal" id="telefone" placeholder="00,00">
    </div>
   
    <div class="form-group col-md-3">
      <label for="inputPassword4"> Data final</label>
      <input type="date" value="<?php echo $dt ?>" name="dataFinal" id="preco" class="form-control decimal" id="telefone" placeholder="00,00">
    </div>
   
   <div class="form-group col-md-3">
      <label for="inputPassword4"> Garantia</label>
      <input type="text" name="garantia" value="<?php echo $garantia ?>"  class="form-control decimal" id="telefone" placeholder="">
    </div>

     <div class="form-row">

<div class="form-group col-md-6">
 <label  for="inputAddress" style="margin-top: 3%;">Descrição</label>
 <textarea name="descricaoServic" id="descricao" rows="4" cols="60" ><?php echo $descricao ?></textarea> 
</div><!-- form-group -->


<div class="form-group col-md-6">
 <label  for="inputAddress" style="margin-top: 3%;">Defeito</label>
 <textarea name="defeito" id="defeito" rows="4" cols="60" >
  <?php echo $defeito ?>
  </textarea> 
</div><!-- form-group -->
 
     </div> <!-- div form-row -->

<div class="form-row">

<div class="form-group col-md-6">
 <label  for="inputAddress" style="margin-top: 3%;">Observação</label>
 <textarea name="observacao" id="observacao" rows="4" cols="60" >
   <?php echo $observacao ?>
  </textarea> 
</div><!-- form-group -->


<div class="form-group col-md-6">
 <label  for="inputAddress" style="margin-top: 3%;">Laudo Técnico</label>
 <textarea name="laudoTecnico" id="laudoTecnico"  rows="4" cols="60" >
  <?php echo $laudo ?>
  </textarea> 
</div><!-- form-group -->
 
     </div> <!-- div form-row -->


<div class="form-group col-md-4">
<button  type="submit" class="btn btn-primary">Cadastrar</button>
<button type="button" id="limparCampos" class="btn btn-danger">Limpar Campos</button>
</div>

<div class="form-group col-md-12" style="margin-top:-4%;">
      <p><br><a href="listarOrdemDeServico.php"><p>Listar Ordem de Servico<p></a><p>
</div>


  </div><!-- div row form -->



  </div><!-- div form -->

    
    </form> 

	
		</div><!-- coluna -->	
	</div><!-- linha -->

    </div> <!-- container -->

</body>
</html>
