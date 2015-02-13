function letrasCapital(elemento){
	var $elemento = $(elemento);
	var valor="";
	
	if($elemento.val()!="")
	{
		valor=	$elemento.val();
		valor.toLowerCase();
		valor= valor.charAt(0).toUpperCase() + valor.slice(1);
		
		
	}
	
	$elemento.val(valor);
	alert("hola");
}


function gat(){

	alert("fiu");
}