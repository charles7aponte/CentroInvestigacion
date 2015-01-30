var jsonIntegrante=null;
var jsontiempo=null;



$(document).ready(function(){


$("#boton-integrantes-proyectos").click(function(){


	generaFilaPersona(jsonIntegrante,"integrantes");



});





$("#integrantes-proyectos").keyup(function(e){
	if(e.which!=13)            //para cuando se da el evento de enter
    {
	   $("#boton-integrantes-proyectos").hide();
    }

});


$("#guardar-cambios").click(function(){

    $("#myModal-integrantes-proyecto").modal("hide");

});





	//autocompletado
	$("#integrantes-proyectos").autocomplete({

		source:function(request, response)
		{

			//console.log(response)
			//console.info(request)

			$.getJSON("servicios/personas/"+request.term,{
	//			term:  ( request.term )
			},response);//fin get JSON

		}


		/*,response:function(event, ui){

			console.info(event)
			console.log(ui.item)
		}*/

		, select:function(event, ui)
		{

			console.log("seleccion :.. "+ ui.item.nombre)
			console.log("seleccion ... cedula "+ui.item.cedula)
  			$("#boton-integrantes-proyectos").show();


			$("#integrantes-proyectos").val(ui.item.nombre+"("+ui.item.cedula+")");


			//generaFilaPersona(ui.item,"integrantes");
			jsonIntegrante = ui.item;

			return false;

		}

	})
	.autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.nombre + "<br>" + item.cedula + "</a>" )
        .appendTo( ul );
    };
	;// fin defincion de autocompletado


});



 function generaFilaPersona( json, name ) {
 
 	if(json)
 	{  

        jsontiempo = $("#tiempo-proyecto").val(); //capturar variable   

        if(jsontiempo =='')
        {
<<<<<<< HEAD
            alert("Por favor, ingresar el tiempo que dedica al proyecto" );
=======
    alert("ingresa el tiempo dedicado");
>>>>>>> origin/master
            return;
        }
      var html ="<tr> ";
            html +="                   <td><input type='hidden' data-info='"+json.cedula+"' name='"+name+"[]' value='"+json.cedula+"'>"+json.cedula+"</td> ";
            html +="                  <td>"+json.nombre+"</td> ";
            html +="                  <td><input type='hidden'  name='tiempo[]' value='"+jsontiempo+"'>"+jsontiempo+"</td> ";
            html +="                  <td> ";
            html +="                    <a href='#' onclick='eliminarFila(this)' class='button'><span class='glyphicon glyphicon-trash'></span>Eliminar</a> ";
            html +="                </td> ";
            html +="                </tr>";

            $fila= $(html);

            var $lista=$("#tabla-integrantes-proyectos").find("input[data-info]");
            var existe=false;
            $lista.each(function(index, ob){

            	var $ob= $(ob);

            	console.log($ob.attr("data-info"));
            	if(json.cedula==$ob.attr("data-info"))
            	{
            		existe=true;
            	}

            });

            if(existe==false)
            {
            $("#tabla-integrantes-proyectos").append($fila);	
            }
            else{
            	alert("El participante ya fue agregado a ese proyecto.");
            }
            
	}
   }



/******
*** elimina la fila del la table
 **********/
 function eliminarFila(elemento){

 	$fila = $(elemento).parent().parent();

 	$fila.remove();

 	return false;
 }   



    function split( val ) {
      return val.split( /,\s*/ );
    }
