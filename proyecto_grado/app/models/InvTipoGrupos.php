<?php

class InvTipoGrupos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_tipo_grupos';
	public $timestamps = false;
	protected $primaryKey = "id";
	public $incrementing = true;


		// reglas
	public 	static $reglasValidacion = array(
			'tipo-grupo'            => 'required| max:50', 	
		);


}
