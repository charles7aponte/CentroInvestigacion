<?php

class InvLineas extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_lineas';
	public $timestamps = false;
	protected $primaryKey = "id_lineas";
	public $incrementing = true;


		// reglas validacion creacion
	public 	static $reglasValidacion = array(
			'nombre-linea'             =>'required|max:100|unique:inv_lineas,nombre_linea', 
			'coor-linea'            => 'required|max:50|', 	
			'objetivo-estulinea'     => 'required',
				
		);



		// reglas validacion edicion

	public 	static $reglasValidacionEdicion = array(
			'nombre-linea'             =>'required|max:100', 
			'coor-linea'            => 'required|max:50|', 	
			'objetivo-estulinea'     => 'required',
				
		);


}
