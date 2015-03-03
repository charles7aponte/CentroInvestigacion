<?php

class InvSublineas extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_sublineas';
	public $timestamps = false;
	protected $primaryKey = "id_sublinea";


		// reglas validacion de creacion
	public 	static $reglasValidacion = array(
		'nombre-sublinea'             =>'required|unique:inv_sublineas,nombre_sublinea|max:50', 
		'estado-sublinea'            => 'max:30', 	
		'decr-sublinea'				=>'required'
				
	);

		// reglas validacion de edicion

	public 	static $reglasValidacionEdicion = array(
		'nombre-sublinea'             =>'required|max:50', 
		'estado-sublinea'            => 'max:30', 	
		'decr-sublinea'				=>'required'
				
	);
}
