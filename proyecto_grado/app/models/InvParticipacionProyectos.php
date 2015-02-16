<?php

class InvParticipacionProyectos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_participacion_proyectos';
	public $timestamps = false;
	protected $primaryKey = "id_participacion_proyectos";


		// reglas
	public 	static $reglasValidacion = array(
			
					
		);


}