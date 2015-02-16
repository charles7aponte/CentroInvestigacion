<?php

class InvPeriodos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_periodos_academicos';
	public $timestamps = false;
	protected $primaryKey = "codigo_periodo";
	public $incrementing = true;


		// reglas
	public 	static $reglasValidacion = array(
			'titulo-periodo'   =>'required|max:2',  	
			'ano-periodo'	   =>'required|max:4',
			'fecha-inicio'	   =>'required',
			'fecha-fin' 	   =>'required',
		);


}
