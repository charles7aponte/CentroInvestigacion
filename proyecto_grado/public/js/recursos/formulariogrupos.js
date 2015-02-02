var jsonIntegrante=null;



$(document).ready(function(){


$("#bton_integrantes-grupos").click(function(){

	generaFilaPersona(jsonIntegrante,"integrantes");



});


$("#integrantes-grupos").keyup(function(e){
	//console.log(e);
    if(e.which!=13)            //para cuando se da el evento de enter
    {
        $("#bton_integrantes-grupos").hide();
    }

});



$("#guardar-cambios").click(function(){

    $("#myModal-integrantes").modal("hide");

});






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


		/*,response:function(event, ui){

			console.info(event)
			console.log(ui.item)
		}*/

		, select:function(event, ui)
		{

			console.log("seleccion :.. "+ ui.item.nombre)
			console.log("seleccion ... cedula "+ui.item.cedula)
  			$("#bton_integrantes-grupos").show();


			$("#integrantes-grupos").val(ui.item.nombre+"("+ui.item.cedula+")");
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
      var html ="<tr> ";
            html +="                   <td><input type='hidden' data-info='"+json.cedula+"' name='"+name+"[]' value='"+json.cedula+"'>"+json.cedula+"</td> ";
            html +="                  <td>"+json.nombre+"</td> ";
            html +="                  <td> ";
            html +="                    <a href='#' onclick='eliminarFila(this)' class='button'><span class='glyphicon glyphicon-trash'></span>Eliminar</a> ";
            html +="                </td> ";
            html +="                </tr>";

            $fila= $(html);

            var $lista=$("#tabla-integrantes-grupos").find("input[data-info]");
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
            $("#tabla-integrantes-grupos").append($fila);	
            }
            else{
            	alert("Ya agrego ese participante al grupo");
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
