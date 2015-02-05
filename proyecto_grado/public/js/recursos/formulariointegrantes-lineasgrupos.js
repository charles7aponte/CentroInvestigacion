function cargar(input, escondido){

    //autocompletado
    $("#"+input).autocomplete({

        source:function(request, response)
        {

            $.getJSON("servicios/personas/"+request.term,{
    //          term:  ( request.term )
            },response);//fin get JSON

        }

        , select:function(event, ui)
        {


            $("#"+input).val(ui.item.cedula+"  ("+ui.item.nombre+")");
            $("#"+escondido).val(ui.item.cedula);


            return false;

        }

    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.nombre + "<br>" + item.cedula + "</a>" )
        .appendTo( ul );
    };
    ;// fin defincion de autocompletado



}



$(document).ready(function(){

    cargar("coord", "cedula-persona");
    cargar("coor-linea", "cedula-persona");
});



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
