<?php

class InvEntidades extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_entidades';
	public $timestamps = false;
	protected $primaryKey = "nit_empresa";


		// reglas
	public 	static $reglasValidacion = array(
			'nit-entidad'             => 'required|max:30|', 
			'nombre-entidad'            => 'required', 	
			'representante-entidad'     => 'required|max:50',
			'tipo-entidad' 				=> 'required',

			'email-entidad' 			=> 'required| email',
			'pagina-entidad' 				=> 'max:60',
			'telefono-entidad' 				=> 'max:20',
			'celular-entidad' 				=> 'max:20',
					
		);


}
