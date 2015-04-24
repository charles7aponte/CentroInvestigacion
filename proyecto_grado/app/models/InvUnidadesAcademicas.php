<?php

class InvUnidadesAcademicas extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_unidades_academicas';
	public $timestamps = false;
	protected $primaryKey = "id_unidad";


		// reglas validacion de creacion
	public 	static $reglasValidacion = array(
		'nombre-unidad'             =>'required|unique:inv_unidades_academicas,nombre_unidad|max:255', 
		'coor-unidad'				=>'required'
				
	);

		// reglas validacion de edicion

	public 	static $reglasValidacionEdicion = array(
		'nombre-sublinea'             =>'required|max:50', 
		'estado-sublinea'            => 'max:30', 	
		'decr-sublinea'				=>'required'
				
	);
}
