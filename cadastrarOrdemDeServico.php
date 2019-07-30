<!DOCTYPE html>
<html lang="pt-br">

<head>
	 
  <style rel="stylesheet" type="text/css">
    .ui-autocomplete { z-index: 10000000; } 
  </style>


 <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
   
   <!-- Latest compiled and minified CSS -->
   <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->
   <link rel="stylesheet" href="./css/bootstrap.min.css">
 
 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">


<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   <script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script src="./js/bootstrap.min.js"></script>

<script src="./js/letrasMaiusculas.js"></script>

<script src="./js/pesquisarCliente.js"></script>

<script src="./js/pesquisarUsuario.js"></script>

  <script type="text/javascript">
  
    $( document ).ready(function() {
      

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

        $("input.data").mask("99/99/9999");
       // $("input.cpf").mask("999.999.999-99");
          $("#cpf").mask("999.999.999-99");  


        $("input[name='cep'").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');

         $("input[name='telefone']").mask("(99) 999.999-999");
         


         //$("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});



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
 
        


});
 
</script>
  

</head>

<body>

<div class="container">

 
    <?php include("menu.php") ?>
 
    <div class="row">

      <div class="col-xs-12">
             <form   id="formulario" class="form-group" style="border:10px; margin-left: 50px; margin-top: 75px;" action="cadastrarOrdemDeServicoPhpMysql.php" method="POST">
 

      <legend style="">Cadastrar Servico</legend>


    <div class="form-row" style="margin-top: 5%;">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Cliente <span id="validacao"></span></label>
      <input onkeyup="upCase(this);" id="nomeCliente"  type="text" name="nomecliente" class="form-control" id="inputEmail4" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Técnico Responsável</label>
      <input type="text" id="resopnsavelServico" name="resopnsavelServico" class="form-control decimal"   placeholder="Técnico">
    </div>
    </div><!-- div form-row-->



  <div class="form-row">
    
      <div class="form-group col-md-3">
      <label for="inputEmail4">Status <span id="validacao"></span></label>
      <input onkeyup="upCase(this);"    type="text" name="status" class="form-control" id="inputEmail4" placeholder="status">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4"> Data Inicial</label>
      <input type="date" name="dataInicial"  class="form-control decimal" id="telefone" placeholder="00,00">
    </div>
   
    <div class="form-group col-md-3">
      <label for="inputPassword4"> Data final</label>
      <input type="date" name="dataFinal" id="preco" class="form-control decimal" id="telefone" placeholder="00,00">
    </div>
   
   <div class="form-group col-md-3">
      <label for="inputPassword4"> Garantia</label>
      <input type="text" name="garantia"  class="form-control decimal" id="telefone" placeholder="">
    </div>

     <div class="form-row">

<div class="form-group col-md-6">
 <label  for="inputAddress" style="margin-top: 3%;">Descrição</label>
 <textarea name="descricaoServic" id="descricao" rows="4" cols="60" >
  
  </textarea> 
</div><!-- form-group -->


<div class="form-group col-md-6">
 <label  for="inputAddress" style="margin-top: 3%;">Defeito</label>
 <textarea name="defeito" id="defeito" rows="4" cols="60" >
  
  </textarea> 
</div><!-- form-group -->
 
     </div> <!-- div form-row -->

<div class="form-row">

<div class="form-group col-md-6">
 <label  for="inputAddress" style="margin-top: 3%;">Observação</label>
 <textarea name="observacao" id="observacao" rows="4" cols="60" >
  
  </textarea> 
</div><!-- form-group -->


<div class="form-group col-md-6">
 <label  for="inputAddress" style="margin-top: 3%;">Laudo Técnico</label>
 <textarea name="laudoTecnico" id="laudoTecnico"  rows="4" cols="60" >
  
  </textarea> 
</div><!-- form-group -->
 
     </div> <!-- div form-row -->


  </div>
<button id="botao" onclick="validar();" type="submit" class="btn btn-primary" >Cadastrar</button>
<button type="button" id="limparCampos" class="btn btn-danger">Limpar Campos</button>

      <p><a href="listarOrdemDeServico.php"><p>Listar Clientes<p></a><p>

<div class="form-group col-md-12" style="margin-top:-4%;">
      <p><br><a href="listarOrdemDeServico.php"><p>Listar Ordem de Servico<p></a><p>
</div>


  </div><!-- div row form -->



  </div><!-- div form -->


</form>
    </div><!-- formulario -->
      

    </div><!-- linha -->

</div> <!-- container -->

</body>
</html>