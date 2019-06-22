
function upCase(name){

	 var teste =  name.value //document.getElementsByName(name);
 
	 //alert(name.name);

	 //document.getElementsByName(teste.name).value = "ava";
 
	 //a = document.getElementsByName(name.name).value.toUpperCase;

	  name.value = name.value.toUpperCase();
 
	 //alert(teste.name);

	//this.value.toUpperCase();


} // function



function IsEmail(email){




	//alert("teste");

	 var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
 		if (reg.test(email.value)){
 	
 		return true; 

 	}
 		else{
 		return false;
}
 

/*	var exclude=/[^@-.w]|^[_@.-]|[._-]{2}|[@.]{2}|(@)[^@]*1/;
    var check=/@[w-]+./;
    var checkend=/.[a-zA-Z]{2,3}$/;
    if(((email.search(exclude) != -1)||(email.search(check)) == -1)||(email.search(checkend) == -1)){return false;}
    else {return true;}

    */
 }
$(document).ready(function(){
    
    $("#formulario").submit(function(e) {
         e.preventDefault();//evito o submit do form ao apetar o enter..
      });

    $("input").blur(function(){
     if($(this).val() == "")
         {
             $(this).css({"border" : "red", "padding": "2px"});
         }
    });
    $("#botao").click(function(){
    	///alert()
     var cont = 0;
     $("#formulario input").each(function(){
         if($(this).val() == "")
             {

                 $(this).css({"border-color" : "red"});
                 //$(this).onfocus();
                 cont++;
                 //alert();
             }
             else {
             	$(this).css({"border-color" : "green"});
             }
        });
     if(cont == 0)
         {
             //$("#formulario").submit();
             //alert(cont);
              document.getElementById("formulario").submit();
         }
    });
});

 



 function verifica(){
  

/*
 	$("#formulario").submit(function(e) {
         e.preventDefault();//evito o submit do form ao apetar o enter..
      });

 	a = $("input");

 	//alert(a[1].val());



 	if (a.val() =="") {
 		//alert("vazio");
 		a.css({"border-color" : "red", "padding": "2px"});
 	}
 		else{
 			a.css({"border-color" : "blue", "padding": "2px"});
 			
 		}

//a = $("input").val();
/*
  if($(this).val() == "")
         {
             $(this).css({"border-color" : "red", "padding": "2px"});

             //a = $(this).name();

             //alert(a);

         }// if



//alert(a.name);


$("input").blur(function(){
     	
     	a = $(this).val();

     	//alert(a.trim());

     if($(this).val() == "")
         {
             $(this).css({"border-color" : "red", "padding": "2px"});

             //a = $(this).name();

             //alert(a);

         }// if
          else{

          	$(this).css({"border-color" : "#4267B2", "padding": "2px"});

          } 
    });

*/
 } // funcion
