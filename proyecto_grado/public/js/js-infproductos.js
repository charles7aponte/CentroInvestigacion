/*------------------jquery lista de productividad  fichas producto-----------------------------------------------*/
$("#tabla_producto").hide();
$("#boton_producto .glyphicon glyphicon-minus-list-alt").hide();

var band_producto = true;

$("#boton_producto").click(function(){
	
	$("#tabla_producto").toggle(500);

	if(band_producto)
	{
		$("#boton_producto .glyphicon glyphicon-list-alt").hide();
		$("#boton_producto .glyphicon glyphicon-minus-list-alt").show();

	}
	else{

		$("#boton_producto .glyphicon glyphicon-minus-list-alt").hide();
		$("#boton_producto .glyphicon glyphicon-list-alt").show();
	}
	band_producto=!band_producto;

})
