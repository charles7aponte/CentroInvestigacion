/*------------------jquery lista de sublineas de las lineas-----------------------------------------------*/
$("#tabla_sublinea").hide();
$("#boton_sublinea .glyphicon-minus-sign").hide();

var band_producto = true;

$("#boton_sublinea").click(function(){
	
	$("#tabla_sublinea").toggle(500);

	if(band_producto)
	{
		$("#boton_sublinea .glyphicon-plus-sign").hide();
		$("#boton_sublinea .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_sublinea .glyphicon-minus-sign").hide();
		$("#boton_sublinea .glyphicon-plus-sign").show();
	}
	band_producto=!band_producto;

})

/*------------------jquery lista de sublineas de las lineas-----------------------------------------------*/
$("#tabla_grupos").hide();
$("#boton_grupos .glyphicon-minus-sign").hide();

var band_producto = true;

$("#boton_grupos").click(function(){
	
	$("#tabla_grupos").toggle(500);

	if(band_producto)
	{
		$("#boton_grupos .glyphicon-plus-sign").hide();
		$("#boton_grupos .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_grupos .glyphicon-minus-sign").hide();
		$("#boton_grupos .glyphicon-plus-sign").show();
	}
	band_producto=!band_producto;

})
