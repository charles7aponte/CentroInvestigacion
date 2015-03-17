
$("#lista_financiamiento").hide();
$("#boton_proyectos .glyphicon-minus-sign").hide();


var band_proyectos = true;

$("#boton_proyectos").click(function(){

	$("#lista_financiamiento").toggle(500);

	if(band_proyectos)
	{
		$("#boton_proyectos .glyphicon-plus-sign").hide();
		$("#boton_proyectos .glyphicon-minus-sign").show();

	}
	else{

		$("#boton_proyectos .glyphicon-minus-sign").hide();
		$("#boton_proyectos .glyphicon-plus-sign").show();
	}
	band_proyectos=!band_proyectos;
})
