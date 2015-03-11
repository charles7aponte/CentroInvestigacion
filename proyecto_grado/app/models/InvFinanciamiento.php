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


	// reglas validacion creacion...........
	public 	static $reglasValidacion = array(
		'modo-financiada'        =>'required',
		'valor-financiado'  	=>'required|numeric',
		'fecha-financiamiento' => 'required',
		'entidad-financiada'   =>'required',				
	);

	// reglas validacion edicion...........
	public 	static $reglasValidacionEdicion = array(
		'modo-financiada'        =>'required',
		'valor-financiado'  	=>'required|numeric',
		'fecha-financiamiento' => 'required',
		'entidad-financiada'   =>'required',				
	);
}