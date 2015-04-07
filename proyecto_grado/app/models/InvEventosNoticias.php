<?php

class InvEventosNoticias extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_evento_noticias';
	public $timestamps = false;
	protected $primaryKey = "id_evento";
	public $incrementing = true;


		// reglas validacion creacion
	public 	static $reglasValidacion = array(
			'titulo-even-noti'   =>'required|unique:inv_evento_noticias,titulo_evento|max:150|',  	
			'desc-even-noti'	=>'required',
			'tipo-even-noti'	=>'required',
					
	);

	// reglas validacion edicion
	public 	static $reglasValidacionEdicion = array(
			'titulo-even-noti'   =>'required|max:150',  	
			'desc-even-noti'	=>'required',
			'tipo-even-noti'	=>'required',
					
	);


		/*
		*@param $mi_fecha la fecha debe ser en formato yyy-mm-dd
		*@param $tipo un string con "d","m","y"
		*/
		public static function formato_fecha2($mi_fecha, $tipo=null){
			if($mi_fecha)
			{
				$datos= explode("-",$mi_fecha);
				$mes_nombre="";
				if(count($datos)==3)
				{
					switch ($tipo) {
						case "d":
							 return $datos[2];
							break;

						case "m":
							 return $datos[1];
							break;



						case "y":
							 return $datos[0];
							break;
						
						default:
							# code...
							break;
					}

				}
				
			}
			return "";

		}




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
