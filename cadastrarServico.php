<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Servico</title>

 	<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./js/jquery-ui.css">

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>

 	
 	<script src="./js/jquery-ui.min.js"></script>
 	

	<script type="text/javascript" src="./js/jquery.mask.js"></script>   

   	<script type="text/javascript" src="./js/maskMoney.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>

<script src="./js/letrasMaiusculas.js"></script>
 

	<script>
		 $( document ).ready(function() {

         $("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

         //  $("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

}); // document

   </script>

</head>
<body>

<div class="container">
 <?php include("menu.php") ?>

	 <div id="formularioCliente" style="float: left; margin-left: 10%; margin-top:-20px;">

    <form   id="formulario" class="form-group" style="border:10px; margin-left: 50px; margin-top: 75px;" action="cadastrarServicoPhpMysql.php" method="POST">



      <legend style="">Cadastrar Servico</legend>

   

    <div class="form-row" style="margin-top: 5%;">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome <span id="validacao"></span></label>
      <input onkeyup="upCase(this);" id="nome"  type="te
      xt" name="nomeServico" class="form-control" id="inputEmail4" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Preço</label>
      <input type="text" name="precoServico" id="preco" class="form-control decimal" id="telefone" placeholder="00,00">
    </div>
  
 <label  for="inputAddress" style="margin-top: 3%;">Descrição</label>
  </div> <!-- form - row -->
 <div class="form-group">
   
     <textarea name="descricaoServico" rows="4" cols="60" >
  
  </textarea> 
    </div><!-- form-group -->



      <p><a href="listarServico.php"><p>Listar Servico<p></a><p>

<button id="botao" onclick="validar();" type="submit" class="btn btn-primary" >Cadastrar</button>
<button type="button" id="limparCampos" class="btn btn-danger">Limpar Campos</button>
 
    </form>     


       </div><!-- div formulario -->

</div><!-- container -->
</body>
</html>