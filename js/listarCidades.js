
contador = 1;

function teste(){
	
  var estado = $("#estados option:selected").val();

  a = document.getElementById("estados").value;

 // console.log(estado);

 //  alert();
  /* 
  var tags = [ "c++", "java", "php", "coldfusion", "javascript", "asp", "ruby" ];
  
  $( "#endereco" ).autocomplete({
    source: function( request, response ) {
            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
            response( $.grep( tags, function( item ){
                return matcher.test( item );
            }) );
        }
  });
    
  */

  var cidade = $("#cidades option:selected").val();

  //cidade =="registre uma cidade" ||

        if(contador == 1){  

             //alert("Selecione uma Cidade");

             var estado = $("#estados option:selected").val();
             console.log(contador);
 
             // listar cidades
             var $nomeAluno = $("#estados");


          var $teste = $("#estados");
          //alert($teste.val());
          //alert ($nomeAluno.val());    


          //alert("estado");
 
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

//contador++;
        } // 



   $("#estados").change(function() {
    //$('#pesquisaCliente').keyup(function(){
       //  alert("ava");
        // input[name='pesquisaCliente'
         var $nomeAluno = $("#estados");


          var $teste = $("#estados");
          //alert($teste.val());
          //alert ($nomeAluno.val());    


           //alert("estado");
 
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


    }); // listar Cidades


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
        
        
            }); // listar bairros

 
  } // teste
  
  
 
$( document ).ready(function() {
      
  $(".estado").change(function() {
    //$('#pesquisaCliente').keyup(function(){
          //alert("ava");
        // input[name='pesquisaCliente'
         var $nomeAluno = $("#estados");


          var $teste = $("#estados");
          //alert($teste.val());
          //alert ($nomeAluno.val());    


          // alert("estado");
 
        $.ajax({

          url: '../bancoMysql.php',
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
                    $(".cidades").css({'display':'block'});
                    $(".cidades").html("");
                    $(".cidades").html(data);

                },

                 error: function(data)
                {
                    $(".cidades").css({'display':'block'});
                    $(".cidades").html("Houve um erro ao carregar");
                }

        }); 


    }); // listar Cidades



      $("#estados").change(function() {
    //$('#pesquisaCliente').keyup(function(){
       //  alert("ava");
        // input[name='pesquisaCliente'
         var $nomeAluno = $("#estados");


          var $teste = $("#estados");
          //alert($teste.val());
          //alert ($nomeAluno.val());    


          // alert("estado");
 
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


    }); // listar Cidades


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
        
        
            }); // listar bairros



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
 

}); // document

 function ava() {
        alert();
      }