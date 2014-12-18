$(document).ready(function(){


	//autocompletado
	$("#nombre").autocomplete({

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
      
      var html ="<tr>
                                  <td>01</td>
                                  <td>Teleinformatica</td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>";
    }



    function split( val ) {
      return val.split( /,\s*/ );
    }
