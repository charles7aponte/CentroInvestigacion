<?php

class InvInvestigadoresExternos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_investigadores_externos';
	public $timestamps = false;
	protected $primaryKey = "codinv_ext";


		// reglas
	public 	static $reglasValidacion = array(
			'cedula'                 => 'required',
			'nombre1'                => 'required|max:15|',
			'apellido1'			     => 'required|max:15|', 
			'perfil' 	             => 'required|max:30|',
			'creacion-perfil' 	 	 => 'required',
			'profesion' 			 => 'required|max:100|',
			'entidad-investigadores' => 'required|max:200|',	
			'numero_contrato'        => 'max:100',
			'creacion_inicio'        => 'required',
			'creacion_fin'           => 'required',
			

		);


}