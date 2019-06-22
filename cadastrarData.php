<?php

	 

?>


<html>

<head>
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="./js/bootstrap.min.css">

	 
		
		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./js/jquery.mask.js"></script>
		 <script type="text/javascript" src="./js/maskMoney.min.js"></script>
 
 

 <script type="text/javascript">
$(document).ready(function(){

   var teste = $("input.cep");

   // alert(teste); 


	     $("input.data").mask("99/99/9999");
        $("input.cpf").mask("999.999.999-99");
       $("input[name='cep']").mask("99.999-999");
        //$('input.decimal').mask('#.##0,00');


         $("input.decimal").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

});


   


</script>


</head>

<body>

 <form class="form-horizontal" action="salvarEstadoMysql.php" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Cadastrar data</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nome</label>  
  <div class="col-md-4">

  <input id="textinput" class="data" id="data" name="data" value="" type="text" placeholder="nome" class="form-control input-md">
  <br>
   <input type="text" name="decimal"  class="decimal" />
   <br>
    <input type="date" name="teste1">
    <input type="date" name="teste2">
    <br>
    <input type="time" name="hora">
    <input name="cep" value ="cpf" id="cep" type="text"/>

<!-- 
   <input type="text" value="0,00" id="campo2" class="decimal">
   
    <input type="text" id="decimal" name="decimal" class="decimal form-control" style="display:inline-block" />
-->
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
  </div>
</div>

</fieldset>
</form>

<div id="listarClientes" style="margin-left: 25%;">
<h2>
	<a href="listarClientes.php">listar clientes</a>
</h2>
</div>

<!-- 
<h1>Usando mascaras com jquery</h1>
<label for="data">Data:</label><br>
<input type="text" class="data" id="data" name="data" /><br><br>

<label for="cpf">CPF:</label><br>
<input type="text" class="cpf" id="cpf" name="cpf" /><br><br>

<label for="cep">CEP:</label><br>
<input type="text" class="cep" id="cep" name="cep" /><br><br>

<p align="center"><a href="http://www.rafaelwendel.com">www.rafaelwendel.com</a></p>
<p align="center">Twitter: <a href="http://www.twitter.com/rafaelwendel">@rafaelwendel</a></p>
-->
</body>
</html>