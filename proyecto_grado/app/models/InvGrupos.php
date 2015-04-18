<?php

class InvGrupos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_grupos';
	public $timestamps = false;
	protected $primaryKey = "codigo_grupo";

	// reglas validacion creacion

	public 	static $reglasValidacion = array(
			'nombre'        =>'required|unique:inv_grupos,nombre_grupo', 
			'coord'         => 'required|max:50|', 	
			'objetivos'     => 'required',
			'categoria'		=>'max:30|required',
			'unidad'		=>'required|max:255',			
	);

	// reglas validacion edicion

	public 	static $reglasValidacionEdicion = array(
			'nombre'        =>'required', 
			'coord'         => 'required|max:50|', 	
			'objetivos'     => 'required',
			'categoria'		=>'max:30|required',
			'unidad'		=>'required|max:255',			
	);



	/**
	*relacion muchos a muchos
	**/
	public  function personas(){

		return $this->belongsToMany('Persona','inv_participacion_grupos','inv_codigo_grupo','cedula_persona');
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
