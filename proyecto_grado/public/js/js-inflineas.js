/*------------------jquery lista de productividad lineas-----------------------------------------------*/
$("#tabla_producto").hide();
$("#boton_producto .glyphicon-minus-sign").hide();

var band_producto = true;

$("#boton_producto").click(function(){
	
	$("#tabla_producto").toggle(500);

	if(band_producto)
	{
		$("#boton_producto .glyphicon-plus-sign").hide();
		$("#boton_producto .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_producto .glyphicon-minus-sign").hide();
		$("#boton_producto .glyphicon-plus-sign").show();
	}
	band_producto=!band_producto;

})