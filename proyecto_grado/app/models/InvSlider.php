<?php

class InvSlider extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_slider';
	public $timestamps = false;
	protected $primaryKey = "id_slider";
	public $incrementing = true;


		// reglas validacion creacion
	public 	static $reglasValidacion = array(
			'ruta-imagen'   =>'required'	
				
	);


	
}
