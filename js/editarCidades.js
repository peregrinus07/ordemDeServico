

  

  function teste(){
 



        $.ajax({


          url: 'listarEstadosJs.php',
          type: 'POST',
          data: {},

          beforeSend: function(){
          $("#estados").css({'display':'block'});
            //$("body").html('<p>Carregando...</p>');
            $("#estados").html('<p>Carregando</p>');

        },

          success: function(data)
                {
                  console.log(data);

                    $("#bairro").html("<option>Selecione uma Cidade</option>");
                    $("#cidades").html("<option>Selecione uma Cidade</option>");
                    $("#estados").css({'display':'block'});
                    $("#estados").html("");
                    $("#estados").html(data);
                    $("#bairro").html("<option>Selecione uma Cidade</option>");
                    $("#cidades").html("<option>Selecione uma Cidade</option>");
                },

                 error: function(data)
                {
                     
                    $("#estados").css({'display':'block'});
                    $("#estados").html("Houve um erro ao carregar");
                    console.log("erro ao carregar cidades");  
                }

         });




  } //

 


  function carregarBairros(){

  
  // carregar bairros

  $( "#imgBairro" ).click(function() {
   

    var $nomeAluno = $("#cidades");

    //alert($nomeCidade.val());

    if ($nomeAluno.val() == "selecione uma cidade") {
      alert("selecione uma cidade");
       $( "#cidades" ).focus();
    }

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



}); // function


  } // function carregar bairros

  function carregarCidades(){

    $( "#imgCidade" ).click(function() {


        // input[name='pesquisaCliente'
         var $nomeAluno = $("#estados");


         //alert($nomeAluno.val());

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
                    $("#bairro").html("<option>Selecione uma Cidade</option>");
                     
                },

                 error: function(data)
                {

                    $("#cidades").css({'display':'block'});
                    $("#cidades").html("Houve um erro ao carregar");
                    console.log("erro ao carregar cidades");  
                }

        }); // estados

    }); // function



  } // function


  function carregarEstados(){

      $( ".imgEstado" ).click(function() {

        //alert();

      }); // click


  } //



$( document ).ready(function() {
  
  $( ".imgEstado" ).click(function() {

        alert();

      }); // click



  
  carregarBairros();
  carregarCidades();
  carregarEstados();
  
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

   $("#cidades").change(function() {

    //alert();

    var $nomeAluno = $("#cidades");

    //alert($nomeCidade.val());

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


   }); // end cidades


        //listar endereços
      $("#endereco").keyup(function(){
       // alert("teste");
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

        var rua = $("#endereco").val()
        var teste = $("#bairro option:selected").val();


 
         //alert(teste);

        //var QtdAcomodacaoD = $("#cidades option:selected").val();

       //var QtdAcomodacaoD = "CE";
      //  alert(QtdAcomodacaoD);

    //var nome = $("#test").val();

    //var nome =  $("#cidades").val();

    //alert("Value: " + nome);

    //alert("uia");    



    //console.log("bairro selecionado: "+teste);
   $("#endereco").autocomplete({
    


     // fonte dos dados
     source: "buscar_endereco.php?rua="+rua+"&teste=" + teste + "",

      });


     }); // listar ruas
 



}); // end document