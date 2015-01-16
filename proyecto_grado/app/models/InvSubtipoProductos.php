<?php

class InvSubtipoProductos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_subtipo_productos';
	public $timestamps = false;
	protected $primaryKey = "id_subtipo_producto";
	public $incrementing = true;


		// reglas
	public 	static $reglasValidacion = array(
			'subtipo-producto'            => 'required|unique:inv_subtipo_productos,nombre_subtipo_producto', 	
		);


}
