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
}
