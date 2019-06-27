
<html>
<head>
 
</head>

       <div id="cadastrarCidade" style="margin-left: -1px;">
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
        <option id="estados" selected>Escolher...</option>
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