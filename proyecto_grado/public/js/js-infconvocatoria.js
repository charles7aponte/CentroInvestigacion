/*------------------jquery tabla aprobados-----------------------------------------------*/
$("#tabla_aprobados").hide();
$("#boton_aprobados .glyphicon-minus-sign").hide();


var band_aprobados = true;

$("#boton_aprobados").click(function(){

	$("#tabla_aprobados").toggle(500);

	if(band_aprobados)
	{
		$("#boton_aprobados .glyphicon-plus-sign").hide();
		$("#boton_aprobados .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_aprobados .glyphicon-minus-sign").hide();
		$("#boton_aprobados .glyphicon-plus-sign").show();
	}
	band_aprobados=!band_aprobados;

})

/*--------------jquery tabla rechazados-------------------------------------*/
$("#tabla_rechazados").hide();
$("#boton_rechazados .glyphicon-minus-sign").hide();


var band_rechazados = true;

$("#boton_rechazados").click(function(){

	$("#tabla_rechazados").toggle(500);

	if(band_rechazados)
	{
		$("#boton_rechazados .glyphicon-plus-sign").hide();
		$("#boton_rechazados .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_rechazados .glyphicon-minus-sign").hide();
		$("#boton_rechazados .glyphicon-plus-sign").show();
	}
	band_rechazados=!band_rechazados;

})

/*---------------------------------------------------------*/

$("#tabla_evaluacion").hide();
$("#boton_evaluacion .glyphicon-minus-sign").hide();


var band_evaluacion = true;

$("#boton_evaluacion").click(function(){

	$("#tabla_evaluacion").toggle(500);

	if(band_evaluacion)
	{
		$("#boton_evaluacion .glyphicon-plus-sign").hide();
		$("#boton_evaluacion .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_evaluacion .glyphicon-minus-sign").hide();
		$("#boton_evaluacion .glyphicon-plus-sign").show();
	}
	band_evaluacion=!band_evaluacion;

})