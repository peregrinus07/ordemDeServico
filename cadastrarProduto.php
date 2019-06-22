 <?php
 
	//echo "Exercitando a programação em PHP"; 
   include_once("conexao.php");

/*
$servername = "localhost";
$database = "teste";
$username = "root";
$password = "tibe";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "<br>Connected successfully";


  	 $sql = "SELECT nome_cliente FROM cliente";
 	 $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 
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

  <script type="text/javascript">
  
     function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }

    function alteraMaiusculo(letra){
  //var valor = document.getElementById("campo").texto;
  var valor = letra;

  var novoTexto = valor.value.toUpperCase();
  valor.value = novoTexto;
  }


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
         


         $("#precoProdutoCompra").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});


         $("#precoVendaProduto").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});


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

      $("#limparCampos").on('click', function() {

        //alert("teste");
  
      $("#formulario").find('input').val('');

    }); // limpar campos


      

});
 
</script>
  

</head>

<body>

  <div class="container">
   <div id="menu">
      <?php include("menu.php") ?>
   </div> <!-- menu -->
      <div id="formularioCliente" style="float: left; margin-left: 10%; margin-top:-20px;">
      
  
      <form id="formulario" class="form-group" style="border:10px; margin-left: 50px; margin-top: 75px;" action="
      cadastrarProdutoMysql.php" method="POST">
   
      <legend style="">Cadastrar Produto</legend>

    <div class="form-row">

      <div class="form-group col-md-4">
    <label for="inputAddress">Nome do Produto</label>
    <input type="text" onkeyup="alteraMaiusculo(this);" name="nomeCliente" class="form-control" id="inputAddress" placeholder="">
    </div>

<div class="form-group col-md-4">
      <label for="inputAddress">Preço do Produto Compra</label>
      <input type="text" name="precoCompraProduto" class="form-control" id="precoProdutoCompra" placeholder="00,00">
    </div>


<div class="form-group col-md-4">
      <label for="inputAddress">Preço do Produto Venda</label>
      <input type="text" name="precoProdutoVenda" class="form-control" id="precoVendaProduto" placeholder="00,00">
    </div>



     </div><!-- linha -->

    

    <div class="form-row">
    
    <div class="form-group col-md-2">
      <label for="inputPassword4">Quantidade
    </label>
      <input type="text" onkeyup="somenteNumeros(this);" name="quantidade" class="form-control" id="quantidade" placeholder="0">
    </div>
  
    <div class="form-group col-md-4">
      <label for="inputAddress">Data de Entrada do Produto</label>
      <input type="date" name="data" class="form-control" id="inputEmail4" placeholder="Venda">
    </div>



  </div> <!-- form - row -->
  
   <div class="form-row">
     
     <label for="exampleFormControlTextarea1 col-md-12">descricao do produto
</label>
    <textarea onkeyup="alteraMaiusculo(this);" name="descricaoProduto" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

 
    </div> <!-- linha -->

 
    <div style="margin-top:3%;" class="form-row">
      
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      <button style="margin-left: 2px;" type="button" id="limparCampos" class="btn btn-danger">Limpar Campos</button>
 
    </div> <!-- linha -->     
   
<p><a href="listarProdutos.php"><p>Listar Produtos<p></a><p>
   </div> <!-- form-row -->

    </form>

    </div> <!-- formulario cliente -->    

  
    </div> <!-- coluna -->     


    </div> <!-- linha -->


<!-- roda pe -->
<!-- linha -->
  <div class="row"> 

    <div class="col-md-12">
      <!-- 
        <h4  style="margin-right: 425px; margin-top:500px;">@LinuxProCe - 2019</h4>
-->
    </div> <!-- linha -->


    </div>
    <!-- coluna -->
       

      

    <!-- 
    <div class="col" style="background-color:orange;">.col</div>
    <div class="col" style="background-color:lavender;">.col</div>
    -->
  </div> <!-- linha -->


  


</div> <!-- container -->
</body>
</html>