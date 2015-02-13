
//cambiar la primera y solo la primera a mayuscula... general panel admin
function letrasCapital(elemento){
	var $elemento = $(elemento);
	var valor="";
	
	if($elemento.val()!="")
	{
		valor=	$elemento.val();
		valor=valor.toLowerCase();
		valor= valor.charAt(0).toUpperCase() + valor.slice(1);


		
		
	}
	
	$elemento.val(valor);

}


