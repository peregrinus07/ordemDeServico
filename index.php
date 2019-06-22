 <?php
 
    include_once("conexao.php");
  
 //echo "Exercitando a programação em PHP";
  
/*
$servername = "localhost";
$database = "teste";
$username = "root";insta
$password = "tibe";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "<br>Connected successfully";
*/ 
    
  	 //$sql = "SELECT nome_cliente FROM cliente";
 	    $sql ="select * from tabela_clientes";

   $resultado = mysqli_query($conn,$sql) or die("<br>Erro ao retornar dados");
 
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

<script src="./js/letrasMaiusculas.js"></script>

<script src="./js/listarCidades.js"></script>

<script src="./js/validarCampos.js"></script>

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
                    console.log("erro ao carregar cidades");  
                }

        }); // estados


    }); // estados



         $("input.data").mask("99/99/9999");
       // $("input.cpf").mask("999.999.999-99");
          $("#cpf").mask("999.999.999-99");  


        $("input[name='cep'").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');

         $("input[name='telefone']").mask("(99) 999.999-999");
         
 
         $("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});


}); // document
 
</script>
  

</head>

<body>

  <div class="container">
  
  <div> <!-- menu -->

  <?php
 
    include("template/menu.php");

    ?>   
  
</div> <!-- menu -->

      <div id="formularioCliente" style="float: left; margin-left: 10%; margin-top:-20px;">
      
  
      <form name="formulario"   id="formulario" class="form-group" style="border:10px; margin-left: 50px; margin-top: 75px;" action="cadastrarClienteMysql.php" method="POST">
   
      <legend style="">Cadastrar Cliente</legend>

    <div class="form-group">
    <label for="inputAddress">Nome:</label>
    <input id="nomeCliente" onkeyup="upCase(this);" type="text" name="nomeCliente" class="form-control" id="inputAddress" placeholder="">
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email <span id="validacao">*</span></label>
      <input onkeyup="IsEmail(this);" id="email"  type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Telefone</label>
      <input type="text" name="telefone" class="form-control" id="telefone" placeholder="">
    </div>
  <div class="form-group col-md-4">
      <label for="inputPassword4">Cpf:</label>
      <input type="text" name="cpf" class="form-control" id="cpf" placeholder="">
    </div>

  </div> <!-- form - row -->
  
   <div class="form-row">
     
     <div class="form-group col-md-4">
      <label for="inputEstado">Estado</label>
      <select name="estado" id="estados" class="form-control">
        <option id="estados2" selected>Escolher...</option>
        <option value="AC">Acre</option>
  <option value="AL">Alagoas</option>
  <option value="AP">Amapá</option>
  <option value="AM">Amazonas</option>
  <option value="BA">Bahia</option>
  <option value="CE">Ceará</option>
  <option value="DF">Distrito Federal</option>
  <option value="ES">Espírito Santo</option>
  <option value="GO">Goiás</option>
  <option value="MA">Maranhão</option>
  <option value="MT">Mato Grosso</option>
  <option value="MS">Mato Grosso do Sul</option>
  <option value="MG">Minas Gerais</option>
  <option value="PA">Pará</option>
  <option value="PB">Paraíba</option>
  <option value="PR">Paraná</option>
  <option value="PE">Pernambuco</option>
  <option value="PI">Piauí</option>
  <option value="RJ">Rio de Janeiro</option>
  <option value="RN">Rio Grande do Norte</option>
  <option value="RS">Rio Grande do Sul</option>
  <option value="RO">Rondônia</option>
  <option value="RR">Roraima</option>
  <option value="SC">Santa Catarina</option>
  <option value="SP">São Paulo</option>
  <option value="SE">Sergipe</option>
<option value="TO">Tocantins</option>
      </select>

</div> <!-- linha -->

      <div class="form-group col-md-4">
      <label for="inputCity">Cidade</label>
      <select id="cidades" name="cidades" class="form-control"></select>
     </div>

      <div class="form-group col-md-4">
      <label for="inputCity">Bairro</label>
      <select id="bairro" name="bairro" class="form-control">
       
      </select>
      </div>

<div class="form-group col-md-6">
    <label for="inputAddress">Endereço</label>
    <input onkeyup="upCase(this);" onblur="upCase(this)" type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua dos Bobos, nº 0">
  </div>

  <div class="form-group col-md-2">
    <label for="inputAddress">Numero</label>
    <input onkeyup="upCase(this);" type="text" class="form-control" name="numero" id="numero" placeholder="Nº">
  </div>
  
 <div class="form-group col-md-4">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" name="cep" id="cep">
    </div>

   </div> <!-- form-row -->

<button id="botao" onclick="validar();" type="submit" class="btn btn-primary" >Cadastrar</button>
<button type="button" id="limparCampos" class="btn btn-danger">Limpar Campos</button>

      <p><a href="listarClientes.php"><p>Listar Clientes<p></a><p>

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


  <script>
    
 $(document).ready(function(){

  //alert();



 })


  </script>


</div> <!-- container -->
</body>
</html>