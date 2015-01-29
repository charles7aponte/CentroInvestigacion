var jsonlinea=null;



$(document).ready(function(){


$("#bton_linea-grupos").click(function(){ //bton agregar modal de lineas


	generaFilaLinea(jsonlinea,"lineas");



});


$("#linea-grupos").keyup(function(e){//input
	//console.log(e);

	$("#bton_linea-grupos").hide();

});







	//autocompletado
	$("#linea-grupos").autocomplete({

		source:function(request, response)
		{

			//console.log(response)
			//console.info(request)

			$.getJSON("servicios/lineas/"+request.term,{ //routes
	//			term:  ( request.term )
			},response);//fin get JSON

		}


		/*,response:function(event, ui){

			console.info(event)
			console.log(ui.item)
		}*/

		, select:function(event, ui)
		{

			console.log("seleccion :.. "+ ui.item.nombre_linea)
			console.log("seleccion ... codigo"+ui.item.id_lineas)
  			$("#bton_linea-grupos").show();


			$("#linea-grupos").val(ui.item.nombre_linea+"("+ui.item.id_lineas+")");
			//generaFilaPersona(ui.item,"integrantes");
			jsonlinea = ui.item;

			return false;

		}

	})
	.autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" +item.nombre_linea +"<br>"+"("+ item.id_lineas+")"+"</a>" )
        .appendTo( ul );
    };
	;// fin defincion de autocompletado


});



 function generaFilaLinea( json, name ) {
 
 	if(json)
 	{     
       console.info(json); 

      var html ="<tr> ";
            html +="                  <td><input type='hidden' data-info='"+json.nombre_linea+"' name='"+name+"[]' value='"+json.id_lineas+"'>"+json.id_lineas+"</td> ";
            html +="                  <td>"+json.nombre_linea+"</td> ";
            html +="                  <td> ";
            html +="                    <a href='#' onclick='eliminarFila(this)' class='button'><span class='glyphicon glyphicon-trash'></span>Eliminar</a> ";
            html +="                </td> ";
            html +="                </tr>";

            $fila= $(html);

            var $lista=$("#tabla-lineas-grupos").find("input[data-info]");
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
            $("#tabla-lineas-grupos").append($fila);	
            }
            else{
            	alert("ya existe");
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
