$(document).ready(function(){


	//autocompletado
	$("#integrantes-grupos").autocomplete({

		source:function(request, response)
		{

			//console.log(response)
			//console.info(request)

			$.getJSON("servicios/personas/"+request.term,{
	//			term:  ( request.term )
			},response);//fin get JSON

		}


		,response:function(event, ui){

			console.info(event)
			console.log(ui.item)
		}

		, select:function(event, ui)
		{

			console.log("seleccion :.. "+ ui.item.nombre)
			console.log("seleccion ... cedula "+ui.item.cedula)

			generaFilaPersona(ui.item,"integrantes");

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
      
      var html ="<tr> ";
            html +="                   <td><inputy type='hidden' name='"+name+"[]' value='"+json.cedula+"'>"+json.cedula+"</td> ";
            html +="                  <td>"+json.nombre+"</td> ";
            html +="                  <td> ";
            html +="                    <a href='#' onclick='eliminarFila(this)' class='button'><span class='glyphicon glyphicon-trash'></span>Eliminar</a> ";
            html +="                </td> ";
            html +="                </tr>";

            $fila= $(html);
            $("#tabla-integrantes-grupos").append($fila);

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
