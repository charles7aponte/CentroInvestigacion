var jsonIntegrante=null;



$(document).ready(function(){


$("#boton-integrantes-productos").click(function(){


	generaFilaPersona(jsonIntegrante,"integrantes");



});



$("#integrantes-producto").keyup(function(e){
	if(e.which!=13)            //para cuando se da el evento de enter
    {
	   $("#boton-integrantes-productos").hide();
    }

});


$("#guardar-cambios").click(function(){

    $("#myModal-integrantes-producto").modal("hide");

});





	//autocompletado
	$("#integrantes-producto").autocomplete({

		source:function(request, response)
		{

			//console.log(response)
			//console.info(request)

			$.getJSON("servicios/persona_grupo/"+request.term,{
	//			term:  ( request.term )
			},response);//fin get JSON

		}


		/*,response:function(event, ui){

			console.info(event)
			console.log(ui.item)
		}*/

		, select:function(event, ui) //funcion es para q me cargue en el input del formulario el norbre y cedula a buscar
		{

            console.error(ui.item)

			console.log("seleccion :.. "+ ui.item.nombre)
			console.log("seleccion ... cedula "+ui.item.cedula)
  			$("#boton-integrantes-productos").show();

            //$("#grupo-integrante").val(ui.item.nombregrupo);

			$("#integrantes-producto").val(ui.item.cedulapersona+"("+ui.item.datospersonales+")");


			//generaFilaPersona(ui.item,"integrantes");
			jsonIntegrante = ui.item;

			return false;

		}

	})
	.autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.cedulapersona + "<br>" + item.datospersonales + "</a>" )
        .appendTo( ul );
    };
	;// fin defincion de autocompletado


});



 function generaFilaPersona( json, name ) {
 
 	if(json)
 	{  



      var idGrupoIntegrante= $("#grupo-integrante").val();
      var textGrupoIntegrante= $("#grupo-integrante option:selected").text();
      
      
      var html ="<tr> ";
            html +="                   <td><input type='hidden' data-info='"+json.cedulapersona+"' name='"+name+"[]' value='"+json.cedulapersona+"'>"+json.cedulapersona+"</td> ";
            html +="                  <td>"+json.datospersonales+"</td> ";
            html +="                  <td> <input type='hidden' ' name='idgrupo[]' value='"+idGrupoIntegrante+"'>"+textGrupoIntegrante+"</td> ";
            html +="                  <td> ";
            html +="                    <a href='#' onclick='eliminarFila(this)' class='button'><span class='glyphicon glyphicon-trash'></span>Eliminar</a> ";
            html +="                </td> ";
            html +="                </tr>";

            $fila= $(html);

            var $lista=$("#tabla-integrantes-productos").find("input[data-info]");
            var existe=false;
            $lista.each(function(index, ob){

            	var $ob= $(ob);

            	console.log($ob.attr("data-info"));
            	if(json.cedulapersona==$ob.attr("data-info"))
            	{
            		existe=true;
            	}

            });

            if(existe==false)
            {
            $("#tabla-integrantes-productos").append($fila);	
            $("#integrantes-producto").val(" "); //poner el input vacio
            }
            else{
            	alert("El participante ya fue agregado a ese producto.");
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