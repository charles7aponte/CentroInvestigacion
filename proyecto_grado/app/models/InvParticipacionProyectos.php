<?php

class InvParticipacionProyectos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_participacion_proyectos';
	public $timestamps = false;
	protected $primaryKey = "numero_convocatoria";


		// reglas
	public 	static $reglasValidacion = array(
			'numero-conv'             => 'required|max:50|unique:inv_convocatorias,numero_convocatoria', 
			'estado'            		=> 'max:20', 	
			'cuantia-conv'			=>'required|numeric'
					
		);


}