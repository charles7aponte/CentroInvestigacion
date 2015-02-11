function cargar(input, escondido){

    //autocompletado
    $("#"+input).autocomplete({

        source:function(request, response)
        {

            $.getJSON("servicios/financiados/"+request.term,{
    //          term:  ( request.term )
            },response);//fin get JSON

        }

        , select:function(event, ui)
        {


            $("#"+input).val(ui.item.codigo_proyecto+"  ("+ui.item.nombre_proyecto+")");
            $("#"+escondido).val(ui.item.codigo_proyecto);


            return false;

        }

    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.nombre_proyecto + "<br>" + item.codigo_proyecto + "</a>" )
        .appendTo( ul );
    };
    ;// fin defincion de autocompletado



}



$(document).ready(function(){

    cargar("nombre_proyecto", "nombre_proyecto1");
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
