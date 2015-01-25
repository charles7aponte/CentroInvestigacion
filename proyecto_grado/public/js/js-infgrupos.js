/*------------------jquery lista de integrantes grupos-----------------------------------------------*/
$("#lista_integrantes").hide();
$("#boton_integrantes .glyphicon-minus-sign").hide();


var band_integrantes = true;

$("#boton_integrantes").click(function(){

	$("#lista_integrantes").toggle(500);

	if(band_integrantes)
	{
		$("#boton_integrantes .glyphicon-plus-sign").hide();
		$("#boton_integrantes .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_integrantes .glyphicon-minus-sign").hide();
		$("#boton_integrantes .glyphicon-plus-sign").show();
	}
	band_integrantes=!band_integrantes;

})
/*--------------------jquery lista de productos grupos--------------------------------------------------*/
$("#lista_productos").hide();
$("#boton_productos .glyphicon-minus-sign").hide();


var band_productos = true;

$("#boton_productos").click(function(){

	$("#lista_productos").toggle(500);

	if(band_productos)
	{
		$("#boton_productos .glyphicon-plus-sign").hide();
		$("#boton_productos .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_productos .glyphicon-minus-sign").hide();
		$("#boton_productos .glyphicon-plus-sign").show();
	}
	band_productos=!band_productos;
})
/*--------------------jquery lista de lineas investigacion grupos--------------------------------------------------*/
$("#lista_lineas").hide();
$("#boton_lineas .glyphicon-minus-sign").hide();


var band_lineas = true;

$("#boton_lineas").click(function(){

	$("#lista_lineas").toggle(500);

	if(band_lineas)
	{
		$("#boton_lineas .glyphicon-plus-sign").hide();
		$("#boton_lineas .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_lineas .glyphicon-minus-sign").hide();
		$("#boton_lineas .glyphicon-plus-sign").show();
	}
	band_lineas=!band_lineas;
})