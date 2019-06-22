<?php


	//echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';
/* 
	
	$nome = $_POST["nomeCliente"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$cpf = $_POST["cpf"];
	$endereco = $_POST["endereco"];
	$numero = $_POST["numero"];
	$estado = $_POST["estado"];
	$cidade = $_POST["cidades"];
	$bairro = $_POST["bairro"];
	$cep = $_POST["cep"];

	echo "Nome: " .$nome;
	echo "<br>";
	echo "E-Mail: " .$email;
	echo "<br>";
	echo "Telefone: " .$telefone;
	echo "<br>";
	echo "Cpf: " .$cpf;
	echo "<br>";
	echo "Endereco: " .$endereco;
	echo "<br>";
	echo "Numero: " .$numero;
	echo "<br>";
	echo "Estado: " .$estado;
	echo "<br>";
	echo "Cidade: " .$cidade;
	echo "<br>";
	echo "Bairro: " .$bairro;
	echo "<br>";
	echo "Cep: " .$cep;

	echo "$nome";

	if ($nome =="") {
		echo "vazio: ";
		echo " $nome";
	}

	else {

		echo "Nome: " .$nome;


	}

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
	echo "<br>Connected successfully";


  	/* $sql = "INSERT INTO tabela_clientes (nome_cliente,cpf_cnpj_cliente,
e_mail_cliente, telefone_cliente) values ('$nome','$cpf','$email','$telefone')";
	 */
/*	$sql = "INSERT INTO tabela_clientes (nome_cliente, cpf_cnpj_cliente, e_mail_cliente, telefone_cliente) values ('$nome','$cpf','$email','$telefone')";

     mysqli_query($conn,$sql) or die("<br>Erro ao tentar cadastrar registro");

   printf ("New Record has id %d.\n", mysqli_insert_id($conn));
     //$variavel = mysqli_insert_id;


  	 mysqli_close($conn);

  	 echo "<br>";
  	 
   
  	 echo "<br>";
  	 echo "Nome: ".$nome;
  	 echo "<br>";
  	 echo "Cliente cadastrado com sucesso!<br>";
	 echo "<a href='index.php'>Clique aqui para realizar um novo cadastro</a><br>";
	 echo "<a href='index.php'>Clique aqui para realizar uma consulta</a><br>";

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
  
<!-- Just an image -->
<nav class="navbar navbar-light bg-light" style="margin-top:10px;">
  <a class="navbar-brand" href="#">
    <img src="./img/tux.png" width="60" height="60" alt="">
  </a>

<ul class="nav nav-tabs" style="margin-right: 80%;">
  <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Clientes</a>
      <a class="dropdown-item" href="cadastrarUsuario.php">Usuário</a>
      <a class="dropdown-item" href="cadastrarData.php">Cadastrar Data</a>
      <a class="dropdown-item" href="cadastrarEndereco.php">Cadastrar Endereço</a>
      <a class="dropdown-item" href="cadastrarEstado.php">Cadastrar Estado</a>
    </div>
  </li>
</ul>

</nav>
  
      <div id="formularioCliente" style="float: left; margin-left: 10%; margin-top:-20px;">
      
  
      <form id="formulario" class="form-group" style="border:10px; margin-left: 50px; margin-top: 75px;" action="
      cadastrarClienteMysql.php" method="POST">
   
      <legend style="">Cadastrar Cliente</legend>

    <div class="form-group">
    <label for="inputAddress">Nome do Cliente:</label>
    <input type="text" name="nomeCliente" class="form-control" id="inputAddress" placeholder="">
    </div>

    <div class="form-row">

       <div class="form-group col-md-4">
      <label for="inputPassword4">Rg</label>
      <input type="text" name="rg" class="form-control" id="cpf" placeholder="">
    </div>

    <div class="form-group col-md-4">
      <label for="inputPassword4">Cpf</label>
      <input type="text" name="cpf" class="form-control" id="cpf" placeholder="">
    </div>

    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Telefone</label>
      <input type="text" name="telefone" class="form-control" id="telefone" placeholder="">
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
    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua dos Bobos, nº 0">
  </div>

  <div class="form-group col-md-2">
    <label for="inputAddress">Numero</label>
    <input type="text" class="form-control" name="numero" id="numero" placeholder="Nº">
  </div>
  
 <div class="form-group col-md-4">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" name="cep" id="cep">
    </div>

   </div> <!-- form-row -->

<button type="submit" class="btn btn-primary">Cadastrar</button>
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


  


</div> <!-- container -->
</body>
</html>