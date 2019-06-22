<?php


	$id = $_GET['usuario'];
	$nome = $_GET['teste'];

	//echo "id Cliente: " .$id;
	//echo "<br> Nome Cliente: " . $nome;

?>

<html>

<head>
	
  
   <!-- Latest compiled and minified CSS -->
   <!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  -->
<link rel="stylesheet" href="./css/bootstrap.min.css">

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>


<script src="./js/bootstrap.min.js"></script>


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
      <a class="dropdown-item" href="#">Cliente</a>
      <a class="dropdown-item" href="#">Produto</a>
      <a class="dropdown-item" href="#">Link 3</a>
    </div>
  </li>
</ul>

</nav>




  <!-- linha 1-->
  <div class="row" style="min-height: 600px;"> 

    <!-- coluna -->
    <div class="col-md-12" style="">
       
 
     <form style="border:10px; margin-left: 400px; margin-top: 80px;" action="editarClienteMysql.php" method="POST">
  

      <!-- Form Name -->
      <legend style="margin-left: 11px;">Editar Cliente</legend>

      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-4 control-label" style="margin-left: 2px;" for="textinput">Nome:</label>  
       <div class="col-md-4">

      <?php 

  echo "<input id='textinput' name='NomeCliente' value='$nome' type='text' placeholder='nome' class='form-control input-md'>";


      echo "<input type='hidden' name='idCliente' value='$id'>  ";
?>
  
      <p><a href="listarClientes.php"><p>listar clientes<p></a><p>

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Editar</button>
  </div>
</div>

<div id="listarClientes" style="margin-left: 2%;">
<h2>
  
</h2>


</form>
  
    </div> <!-- coluna -->     


    </div> <!-- linha -->


<!-- roda pe -->
<!-- linha -->
  <div class="row"> 

    <!-- coluna -->
    <div class="col-md-12" style="">
   
    </div> <!-- coluna -->     

        <h4 style="margin-left: 425px; margin-top:80px;">@LinuxProCe - 2019</h4>

    </div> <!-- linha -->


    <!-- 
    <div class="col" style="background-color:orange;">.col</div>
    <div class="col" style="background-color:lavender;">.col</div>
    -->
  </div> <!-- linha -->


  


</div> <!-- container -->


</body>
</html>