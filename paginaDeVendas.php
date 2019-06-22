
 
<!DOCTYPE html>
<html>
<head>
  <title>Teste</title>

   <!-- Latest compiled and minified CSS -->
   <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->
<link rel="stylesheet" href="./css/bootstrap.min.css">

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>


<script src="./js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/carrinho.js"></script>

<script type="text/javascript">
 
	function ava() {
		
		$('#exampleModal').modal('show');
		
 
	}

</script>


</head>
<body onload="">
<div class="container">
  
  
<!-- Just an image -->
<nav class="navbar navbar-light bg-light" style="margin-top:10px;">
  <a class="navbar-brand" href="#">
    <img src="./img/tux.png" width="60" height="60" alt="">
  </a>

<ul class="nav nav-tabs" style="margin-right: 73%;">



  <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar</a>

    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php">Clientes</a>
      <a class="dropdown-item" href="cadastrarUsuario.php">Usuário</a>
      <a class="dropdown-item" href="cadastrarProduto.php">Produto</a>
      <a class="dropdown-item" href="cadastrarData.php">Cadastrar Data</a>
      <a class="dropdown-item" href="cadastrarEndereco.php">Cadastrar Endereço</a>
      <a class="dropdown-item" href="cadastrarEstado.php">Cadastrar Estado</a>
    </div> 
  </li>
  <li class="nav-item active">
        <a class="nav-link" href="paginaDeVendas.php">Venda <span class="sr-only">(current)</span></a>
      </li>
</ul>
   
</nav>
 
  <!-- Form Name -->
      <legend style="margin-left: 11px; margin-top: 20px;"><a href="index.php">Voltar</a></legend>
  
      <!-- 
  <h2><a href="index.php">Voltar</a></h2>
 -->

<select id="categoria" class="selectpicker" style="float: left; margin-left: 1%;">
  <option>Pesquisar por Categoria</option>
  <option>Produtos</option>   
  <option>Produtos2</option>  
</select>


 <div id="botao" style="margin-top: -25px; float: left; margin-left: 279px; min-width: 100px;">
   <label   for="inputAddress"><button id="buscar" type="button" class="btn btn-outline-primary">Pesquisar</button></label>
    
 </div>

 <div style="float: right; margin-top: -25px; min-width: 500px;">
   
    <div class="form-group">
 
    <input type="text"  name="nomeCliente" class="form-control col-md-12" id="pesquisa" placeholder="">
    </div>
    <!--  <input type="text" name="" width="60"> -->
    
   </div> <!-- div formulario pesquisa -->


   <div style="float: left; min-width: 100%; " id="carrinho">
   
   <div style="margin-left: 15px; margin-top: 1%;" id="carrinho2">
    
    <div style="float: left;" id="iconeCarrinho"> 

<img onclick='ava()' style="float: left;" src="./imagens/carrinho.png"> <h2 id="carrinho1" style="float: left; margin-left: 5px; margin-top: 5px;">: 0</h2>

    </div>

    

    <!-- <h4 id="carrinho1">Carrinho:</h4> -->
   </div>
   

 </div> <!-- carrinho -->


 <div id="dados">
   
 </div> <!-- div dados -->
 
 	<!-- modal -->
	<div class="modal fade "  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrinho de Compras</h5>
        <button id='botaoCarrinho' type="button" class="close" data-dismiss="modal" aria-la id='botaoCarrinho'bel="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="form-group">
 

      <div id="atualizar">           
			 
            <?php 
            
            session_start();
    
            echo "<h3>Lista de Produtos</h3>";
    	
    
    /* listar produtos */

    if(count($_SESSION["itens"]) == 0) {

      echo "<tr><td colspan='5'>Não há produto no carrinho</td></tr>";


    } else {

      //echo "<tr><td colspan='5'>Não há produto no carrinho</td></tr>";


        echo "<form id='formulario' action=carrinhoDeCompras.php?acao=up$id method='post'>";

        foreach ($_SESSION["itens"] as $id => $quantidade) {
           
          include("conexao.php");

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
        // echo "<br>Connected successfully";
*/

   $sql = "SELECT * FROM tabela_produto where id_produto = '$id'";
   $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
 

   
   while ($registro = mysqli_fetch_array($resultado))
 {  
      $nome = $registro['nome_produto'];
      $valorDoProduto = $registro['preco_de_venda_produto'];

      $valor = $quantidade * $valorDoProduto;

      $valorTotal += $valor; 


      echo "<tr>";
      echo "<td>Id: " .$id ."</td>";
      echo "<td> nome do produto: ".$nome."  - </td>";
      echo "<td> Valor do produto: " .number_format($valor,2,',','.') ."</td>";
      echo "<td> Quantidade: "." </td>";
      echo "<td><input id='quantidade' type='text' name='prod[".$id."]' value='".$quantidade."' size='2'/></td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td> <a id='link' href='carrinhoDeCompras.php?acao=up&id=" .$id ."'>Atualizar</a></td>";
      echo "<td> <a href='carrinhoDeCompras.php?acao=dell&id=" .$id ."'>Remover</a></td>";
      echo "</tr>";

      echo "<br>";

      echo "<button name='a' id='$i'onclick='carregar()' type='button' class='btn btn-primary'> $id Enviar</button>";



  
 } // while
 
 


 } //forach

        echo "</form>";

        echo "<br>";
        echo "valorTotal : " .$valorTotal;
        echo "<br>";

    } // else
   
            ?>
          

          </div> <!-- atualizar -->
          </div>
          <div class="form-group">
            
          
            <!-- -->

 
          </div>
      <!--  </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div> 
 
 
 
 
 <script type="text/javascript">
   
  function buscar(variavel) {

    //alert("teste");

    var page = "pesquisaVenda.php";

    var categoria = $("#categoria").val();

    if(categoria=="Pesquisar por Categoria") {

      categoria ="";

    }
      else {

        //alert(categoria);
      }

    $.ajax ({

      type: 'POST',
      dataType: 'html',
      url: page,
      beforeSend: function () {


        $("#dados").html("Carregando...");
      },

      data: {variavel: variavel, categoria: categoria},
      success: function (msg) {

          $("#dados").html(msg);

      }


    });

  }


  $("#buscar").click(function () {

    

      buscar($("#pesquisa").val());


  });


 



  function adicionarCarrinho(idProduto){

      id = idProduto;

      teste = document.getElementById(id);

      if(!teste.value=="") {

        $.ajax ({

      type: 'GET',
      dataType: 'html',
      url: 'carrinhoDeCompras.php',
      beforeSend: function () {

       
       // $("#dados").html("Carregando...");
      },


      //carrinhoDeCompras.php?add=carrinho&id=$idProduto
      data: {add: "carrinho", id: id},
      success: function (msg) {

       

            

           //$("#carrinho1").html("");

				 
				b = Number(msg);
				 

				//alert(b);

           $("#carrinho1").html("Carrinho: "+ b);



          //$("#dados").html(msg);
         // location.href="carrinhoDeCompras.php";
           //  alert("Teste");
      }


    });



    }
 
  } // function
  
   

  $("#addCarrinho").click(function() {

   // alert("Teste");

     
  })
  
  function checarCarrinho(){

     
      //alert("teste");
     

      $.ajax ({

      type: 'GET',
      dataType: 'html',
      url: 'carrinhoDeCompras.php',
      beforeSend: function () {

       
       // $("#dados").html("Carregando...");
      },


      //carrinhoDeCompras.php?add=carrinho&id=$idProduto
      data: {},
      success: function (msg) {
 
           //$("#carrinho1").html("");

         
        b = Number(msg);
         

        //alert(b);

           $("#carrinho1").html("Carrinho: "+ b);



          //$("#dados").html(msg);
         // location.href="carrinhoDeCompras.php";
           //  alert("Teste");
  
    } 
 
    })
 
  } // function
  


  function atualizarCarrinho(){


    

      a = $("input[name=quantidade]").val();

      //alert(a);


  }


  function teste(variavel) {

   var valor = $("input[type=text][id=link]").val();

    //alert(a);

    return false;

  }


	// A $( document ).ready() block.
$( document ).ready(function() {
   
   checarCarrinho();

   $("#atualizarCarrinho").click(function (){

   // alert("");


   });


   $("#botaoCarrinho").click(function () {

     
            
      var a = $("#link").attr("href"); 

      var b = $("#quantidade").attr("value");      

    //  alert(b);
      $.ajax ({

      type: 'POST',
      dataType: 'html',
      url: 'a',
      beforeSend: function () {

       
       // $("#dados").html("Carregando...");
      },


      //carrinhoDeCompras.php?add=carrinho&id=$idProduto
      data: {prod: b},
      success: function (msg) {
 
           //$("#carrinho1").html("");
           
        //b = Number(msg);
         

        //alert(b);

           //$("#carrinho1").html("Carrinho: "+ b);



          //$("#dados").html(msg);
         // location.href="carrinhoDeCompras.php";
           //  alert("Teste");
  
    } 
 

 

    });


  });

	    
  $("#exibirCarrinho").click(function () {

 
      //alert("teste");


  });

   
});  



	function modalCarrinho(){

      //id = idProduto;

      //teste = document.getElementById(id);

     // if(!teste.value=="") {

        $.ajax ({

      type: 'GET',
      dataType: 'html',
      url: 'carrinhoDeCompras.php',
      beforeSend: function () {

       
       // $("#dados").html("Carregando...");
      },


      //carrinhoDeCompras.php?add=carrinho&id=$idProduto
      data: {add: "carrinho", id: id},
      success: function (msg) {

       

            

           //$("#carrinho1").html("");

           $("#exampleModalLabel").html("Carrinho: "+ msg);



          //$("#dados").html(msg);
         // location.href="carrinhoDeCompras.php";
           //  alert("Teste");
      }


    });

 
  } // function


   
 </script>


</body>
</html>