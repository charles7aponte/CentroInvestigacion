<?php

class InvConvocatorias extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_convocatorias';
	public $timestamps = false;
	protected $primaryKey = "numero_convocatoria";


		// reglas  crearciona
	public 	static $reglasValidacion = array(
			'numero-conv'             => 'required|max:50|unique:inv_convocatorias,numero_convocatoria', 
			'estado'            		=> 'max:20', 	
			'cuantia-conv'			=>'required|numeric'
					
		);


		// reglas validacion editando

	public 	static $reglasValidacionEdicion = array(
			'numero-conv'             => 'required|max:50', 
			'estado'            		=> 'max:20', 	
			'cuantia-conv'			=>'required|numeric'
					
		);


	/**
	*@param $mi_fecha String formato yyyy-mm-dd (2015-05-31) 
	*@param $tipo string puede ser "dia","mes","a" 
	*@return fecha en formato (23 de marzo de 2015) en caso de error retorna ""
	*    el segundo parametro indicara si retorna el formato completo si es null , o si 
	*	 "dia", "mes","a"
	*
	*/
	public static function formato_fecha($mi_fecha, $tipo=null){
		$datos= explode("-",$mi_fecha);
		$mes_nombre="";

		if(count($datos)!=3)
			return "";


		$dia_mes=$datos[2]; 
		$mes = $datos[1]; 
		$year =$datos[0];  

		
		switch($mes){ 
			case "1": $mes_nombre="Enero"; break; 
			case "2": $mes_nombre="Febrero"; break; 
			case "3": $mes_nombre="Marzo"; break; 
			case "4": $mes_nombre="Abril"; break; 
			case "5": $mes_nombre="Mayo"; break; 
			case "6": $mes_nombre="Junio"; break; 
			case "7": $mes_nombre="Julio"; break; 
			case "8": $mes_nombre="Agosto"; break; 
			case "9": $mes_nombre="Septiembre"; break; 
			case "10": $mes_nombre="Octubre"; break; 
			case "11": $mes_nombre="Noviembre"; break; 
			case "12": $mes_nombre="Diciembre"; break; 
		}


		if($tipo=="dia")
		{
			return $dia_mes;
		}

		if($tipo=="mes")
			return $mes_nombre;

		if($tipo =="a")
			return $year;

		return $dia_mes." de ".$mes_nombre." del ".$year; 

	}


}
