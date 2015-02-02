<?php

class InvProductos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_productos';
	public $timestamps = false;
	protected $primaryKey = "codigo_producto";


		// reglas
	public 	static $reglasValidacion = array(
			'titulo-producto'        =>'required|unique:inv_productos,nombre_producto',
			'creacion-producto'      => 'required',
			'subtipo-proy'			 => 'required', 
			'grupo-proy' 	         => 'required',
			'linea-proy' 	 		 => 'required',
			'desc-conv' 			 => 'required',	
			
		);


}