<?php

class InvFinanciamiento extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_financiacion';
	public $timestamps = false;
	protected $primaryKey = "id_financiacion";


		// reglas
	public 	static $reglasValidacion = array(
			'nombre-proyecto'        =>'required|unique:inv_proyectos,nombre_proyecto',
					
		);


}