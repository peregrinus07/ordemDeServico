 <?php
 
	//echo "Exercitando a programação em PHP"; 
  

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

  */
      include_once("conexao.php");

  	 $sql = "SELECT nome_cliente FROM tabela_clientes";
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
  
 
  
   <!-- Latest compiled and minified CSS -->
   <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="./css/bootstrap.min.css">

 <link rel="stylesheet" href="./css/bootstrap.min.css">
 
 <script src="./js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="./js/jquery-ui.css">


<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   <script type="text/javascript" src="./js/maskMoney.min.js"></script>

<script src="./js/bootstrap.min.js"></script>


<script src="./js/bootstrap.min.js"></script>

<script src="./js/listarCidades.js"></script>   

<script>

   $( document ).ready(function() {


    $("#imgCidade").click(function(event){

      $("#cadastrarRua").hide("slow");
      $("#cadastrarCidade").show("slow");


    })// on



    $("#imgBairro").click(function(event){

      $("#cadastrarRua").hide("slow");
      $("#cadastrarCidade").hide("slow");
      $("#cadastrarbairro").show("slow");


    })// on





     // 


  $("input[name='cep'").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');

   });
 
 function onloadPagina(){
 
 $( ".img" ).show();
  
 }
   
</script>

</head>

<body >

  <div class="container">
  

 <?php include("menu.php") ?>

       <div id="cadastrarRua">
         <!-- cadastrar Rua -->

      <div id="formularioRua" style="float: left; margin-left: -15%; margin-top:-2%;">
  
      <form style="border:10px; margin-left: 400px; margin-top: 80px;" action="
      cadastrarEnderecoPhpMysql.php" method="POST">
   
      <legend style="">Cadastrar Endereço</legend>

      <!--
      <img class="img" onclick="modal(3);" style="width: 30px; height: 30px;" src="./img/adicionar.png">
       -->


 
       <div class="form-row" style="margin-top: 10%;">
      
         <div class="form-group col-md-4">
      <label for="inputEstado" >Estado <img class="img" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      <select  name="estado" id="estados" class="form-control">
       <!-- <option selected>Escolher...</option> -->
        <!-- <option>...</option> -->
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
    </div>


     <div class="form-group col-md-4">
      <label for="inputCity">Cidade <img id="imgCidade" class="img" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      <select id="cidades" name="cidades" class="form-control"></select>
    </div>

      <div class="form-group col-md-4">
      <label for="inputCity">Bairro <img class="img" id="imgBairro" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      <select id="bairro" name="bairro" class="form-control">
       
      </select>
      </div>


      </div><!-- linha -->
 
    <div class="form-row" style="margin-top:1%;">
    
    <div class="form-group col-md-12">
    <label for="inputAddress">Endereço</label>
   <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua dos Bobos, nº 0">
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

  <p><a href="listarClientes.php"></p>listar clientes<p></a></p>
  
  </div> <!-- linha -->
   
    </form>
 

    </div> <!-- formulario rua -->    
 
       </div><!-- cadastrar rua -->
 
 
       <div id="cadastrarCidade" style="display:none; float: left; margin-left: -3%; margin-top:-2%; ">
         <!-- cadastrar cidade -->

      <div id="formularioRua" style="">
  
      <form style="border:10px; margin-left: 400px; margin-top: 80px;" action="
      cadastrarEnderecoPhpMysql.php" method="POST">
   
      <legend style="">Cadastrar Cidade</legend>

      <!--
      <img class="img" onclick="modal(3);" style="width: 30px; height: 30px;" src="./img/adicionar.png">
       -->


       <div class="form-row" style="margin-top: 10%;">
      
         <div class="form-group col-md-6">
      <label for="inputEstado" >Estado  </label>
      <select  name="estado" id="estados" class="form-control">
       <!-- <option selected>Escolher...</option> -->
        <!-- <option>...</option> -->
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
    </div>

<div class="form-group col-md-6">
    <label for="inputAddress">Nome da Cidade</label>
   <input type="text" class="form-control" name="cidades" id="endereco" placeholder="Cidade">
  </div>
<!-- 
     <div class="form-group col-md-4">
      <label for="inputCity">Cidade <img id="imgCidade" class="img" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      -->
      <!-- 
      <select id="cidades" name="cidades" class="form-control"></select>
    -->
    <!-- 
    </div>
-->

      <div class="form-group col-md-4">

        <input type="hidden" name="cadastrarBairro" value="cadastrarCidade">
 <!-- 
      <label for="inputCity">Bairro <img class="img" onclick="modal(3);" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      -->
      <!-- 
      <select id="bairro" name="bairro" class="form-control">
       -->
      </select>
      </div>


      </div><!-- linha -->
 
    <div class="form-row" style="margin-top:1%;">
    
    
    
    <!-- 
      <div class="form-group col-md-6">
      <label for="inputCEP">CEP</label>
       <input type="text" class="form-control" name="cep" id="cep">
    </div>
    -->
  </div>
   


  <button type="submit" class="btn btn-primary">Cadastrar</button>

  <p><a href="listarClientes.php"></p>listar clientes<p></a></p>
  
  </div> <!-- linha -->
   
    </form>
 

    </div> <!-- formulario rua -->   
       </div><!-- cadastrar bairro -->
     

       <div id="cadastrarbairro" style="display:none; margin-left: -3%; margin-top:-2%;">
          
         <!-- cadastrar bairro -->

      <div id="formularioRua" style="float: left; ">
   
      <form style="border:10px; margin-left: 400px; margin-top: 80px;" action="
      cadastrarEnderecoPhpMysql.php" method="POST">
   
      <legend style="">Cadastrar Bairro</legend>

      <!--
      <img class="img" onclick="modal(3);" style="width: 30px; height: 30px;" src="./img/adicionar.png">
       -->


       <div class="form-row" style="margin-top: 10%;">
      
         <div class="form-group col-md-6">
      <label for="inputEstado" >Estado <img class="img" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      <select  name="estado" id="estados" class="estado form-control">
       <!-- <option selected>Escolher...</option> -->
        <!-- <option>...</option> -->
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
    </div>


     <div class="form-group col-md-6">
      <label for="inputCity">Cidade <img id="imgCidade" class="img" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
      <select id="cidades" name="cidades" class="cidades form-control"></select>
    </div>
  
 <div class="form-group col-md-6">
    <label for="inputAddress">Bairro</label>
   <input type="text" class="form-control" name="bairro" id="endereco" placeholder="Rua dos Bobos, nº 0">


   

    <input type="hidden" name="cadastrarBairro" value="cadastrarBairro">
  </div> 


<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Cadastrar</button>

  <p><a href="listarClientes.php"></p>listar clientes<p></a></p>
  </div>
<!--
      <div class="form-group col-md-4">
      <label for="inputCity">Bairro <img class="img" onclick="modal(3);" style="width: 30px; height: 30px;" src="./img/adicionar.png"></label>
-->
      <!-- 
      <select id="bairro" name="bairro" class="form-control">
       
      </select>
      -->
      </div>


      </div><!-- linha -->
 
    <div class="form-row" style="margin-top:1%;">
  

   <!--
    
      <div class="form-group col-md-6">
      <label for="inputCEP">CEP</label>
       <input type="text" class="form-control" name="cep" id="cep">
    </div>
  </div>
   
-->

  </div> <!-- linha -->
   
    </form>
 

    </div> <!-- formulario rua -->    
 

       </div><!-- cadastrar bairro -->
     

 <!--        <h4 style="margin-left: 425px; margin-top:80px;">@LinuxProCe - 2019</h4>
-->
    


    <!-- 
    <div class="col" style="background-color:orange;">.col</div>
    <div class="col" style="background-color:lavender;">.col</div>
    -->
   



<!-- modal editar cliente -->

<div id="modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="titulo"  class="modal-title">Cadastrar / Editar Bairro</h5>
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

          if(id == 2){

            $("#titulo").html("Cadastrar Cidade");

          }


          if(id == 3){

            $("#titulo").html("Cadastrar Bairro");

          }

          

 $("#modal").modal();

        var idProduto = id;

        url = "./telaCadastrarEndereco/cadastrarCidade.php?"+idProduto; 
 
        $.ajax({
                    url: url,
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
 </div> <!-- container -->
</body>
</html>