<html>
<head>
  <script src="./js/cadastrarBairro.js"></script>
</head>
       <div id="cadastrarbairro"  >
          
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
</a>
</p>
</div>
</div>
</form>
</div>
</div>
</html>
