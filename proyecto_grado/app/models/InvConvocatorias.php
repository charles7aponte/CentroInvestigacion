<?php

class InvConvocatorias extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_convocatorias';
	public $timestamps = false;
	protected $primaryKey = "numero_convocatoria";


		// reglas  crearciona
	public 	static $reglasValidacion = array(
			'numero-conv'             => 'required|max:50|unique:inv_convocatorias,numero_convocatoria', 
			'estado'            		=> 'max:20', 	
			'cuantia-conv'			=>'required|numeric'
					
		);


		// reglas validacion editando

	public 	static $reglasValidacionEdicion = array(
			'numero-conv'             => 'required|max:50', 
			'estado'            		=> 'max:20', 	
			'cuantia-conv'			=>'required|numeric'
					
		);


}
