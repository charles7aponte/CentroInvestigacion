<?php

class InvProyectos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_proyectos';
	public $timestamps = false;
	protected $primaryKey = "codigo_proyecto";


		// reglas
	public 	static $reglasValidacion = array(
			'nombre-proyecto'        =>'required|unique:inv_proyectos,nombre_proyecto',
			'creacion_proyecto'      => 'required',
			'estado-proy'			 => 'required', 
			'creacion_proyecto' 	 => 'required',
			'convocatoria-proyecto' 	 => 'required',
			'linea-proyecto' 	 => 'required',	
			'grupo1-proyecto' 	 => 'required',	
			'obj-proyecto' 	 => 'required',	
					
		);


}