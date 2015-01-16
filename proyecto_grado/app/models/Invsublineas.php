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


		// reglas
	public 	static $reglasValidacion = array(
			'nombre-sublinea'             =>'required', 
			'estado-sublinea'            => 'max:30', 	
				
		);


}
