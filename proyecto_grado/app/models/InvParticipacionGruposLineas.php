<?php

class InvParticipacionGrupos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_linea_grupos';
	public $timestamps = false;
	protected $primaryKey = "inv_codigo_grupo";


		// reglas
	public 	static $reglasValidacion = array(
			/*'numero-conv'             => 'required|max:50|unique:inv_convocatorias,numero_convocatoria', 
			'estado'            		=> 'max:20', 	
			'cuantia-conv'			=>'required|numeric'*/
					
		);


}