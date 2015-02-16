var jsonProyecto=null;



$(document).ready(function(){


$("#bton_proyecto-financiado").click(function(){


	generaFilaProyecto(jsonProyecto,"proyectos");



});



$("#proyecto-financiado").keyup(function(e){
	if(e.which!=13)            //para cuando se da el evento de enter
    {
	   $("#bton_proyecto-financiado").hide();
    }

});


$("#guardar-cambios").click(function(){

    $("#myModal-proyectos-financiados").modal("hide");

});





	//autocompletado
	$("#proyecto-financiado").autocomplete({

		source:function(request, response)
		{

			//console.log(response)
			//console.info(request)

			$.getJSON("servicios/financiados/"+request.term,{
	//			term:  ( request.term )
			},response);//fin get JSON

		}


		/*,response:function(event, ui){

			console.info(event)
			console.log(ui.item)
		}*/

		, select:function(event, ui)
		{

			console.log("seleccion :.. "+ ui.item.nombre_proyecto)
  			$("#bton_proyecto-financiado").show();


			$("#proyecto-financiado").val(ui.item.nombre_proyecto+"("+ui.item.codigo_proyecto+")");


			//generaFilaPersona(ui.item,"integrantes");
			jsonProyecto = ui.item;

			return false;

		}

	})
	.autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.nombre_proyecto + "<br>" + item.codigo_proyecto + "</a>" )
        .appendTo( ul );
    };
	;// fin defincion de autocompletado


});



 function generaFilaProyecto( json, name ) {
 
 	if(json)
 	{  

      var html ="<tr> ";
            html +="                  <td><input type='hidden' data-info='"+json.codigo_proyecto+"' name='"+name+"[]' value='"+json.codigo_proyecto+"'>"+json.codigo_proyecto+"</td> ";
            html +="                  <td>"+json.nombre_proyecto+"</td> ";
            html +="                  <td> ";
            html +="                    <a href='#' onclick='eliminarFila(this)' class='button'><span class='glyphicon glyphicon-trash'></span>Eliminar</a> ";
            html +="                </td> ";
            html +="                </tr>";

            $fila= $(html);

            var $lista=$("#tabla-proyecto-financiado").find("input[data-info]");
            if ($lista.length==0){
                $("#tabla-proyecto-financiado").append($fila);

                $("#proyecto-financiado").val("");
            }
            else{
            	alert("Ya selecciono un proyecto para agregar su financiamiento.");
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
