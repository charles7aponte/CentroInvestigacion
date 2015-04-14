/*-----------------------------------------------------------------*/
	
function activacion_desactivacion (id,elemento){

	var estado= $(elemento).attr('data-info-estado');
	var miURL='servicios/estadolistagrupos/'+id+'/'+estado+'/';

	$.ajax({
	  url:miURL,
	  type:'GET',
	  dataType:"json",

	  success: function (data){
	    if(data.respuesta)
	      {

	      	if(data.estado==0){
				$("#dato_grupo_"+id).css(  "background", "#BDBDBD");
				$(elemento).find('p').html('<i class="glyphicon glyphicon-ok-circle"></i> Activar') //encontrando el elemento de a
				$(elemento).attr('data-info-estado',0);
			}
			else {
				$("#dato_grupo_"+id).css(  "background", "#F8F9FE");
				$(elemento).find('p').html('<i class="glyphicon glyphicon-remove-circle"></i> Desactivar'); 
				$(elemento).attr('data-info-estado',1);
			}


			}
	    else{
	     	alert("No se pudo cambiar el estado");
	    }

	  }
	  ,
	  error: function(j,t,e){
	    alert("");
	  }
	});

return false;

}

/**---------------**/
/*-----------------------------------------------------------------*/
	
function activacion_desactivacion1 (id,elemento){

	var estado= $(elemento).attr('data-info-estado');
	var miURL='servicios/estadolistagrupos/'+id+'/'+estado+'/';

	$.ajax({
	  url:miURL,
	  type:'GET',
	  dataType:"json",

	  success: function (data){
	    if(data.respuesta)
	      {

	      	if(data.estado==0){
				$("#dato_grupo_"+id).css(  "background", "#BDBDBD");
				$(elemento).find('p').html('<i class="glyphicon glyphicon-ok-circle"></i> Activar') //encontrando el elemento de a
				$(elemento).attr('data-info-estado',0);
			}
			else {
				$("#dato_grupo_"+id).css(  "background", "#F8F9FE");
				$(elemento).find('p').html('<i class="glyphicon glyphicon-remove-circle"></i> Desactivar'); 
				$(elemento).attr('data-info-estado',1);
			}


			}
	    else{
	     	alert("No se pudo cambiar el estado");
	    }

	  }
	  ,
	  error: function(j,t,e){
	    alert("");
	  }
	});

return false;

}