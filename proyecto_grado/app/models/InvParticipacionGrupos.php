<?php

class InvParticipacionGrupos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_participacion_grupos';
	public $timestamps = false;
	protected $primaryKey = "id_participacion_grupos";


		// reglas
	public 	static $reglasValidacion = array(
			/*'numero-conv'             => 'required|max:50|unique:inv_convocatorias,numero_convocatoria', 
			'estado'            		=> 'max:20', 	
			'cuantia-conv'			=>'required|numeric'*/
					
		);


}