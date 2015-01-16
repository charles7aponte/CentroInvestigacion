<?php

class InvTipoProductos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_tipo_productos';
	public $timestamps = false;
	protected $primaryKey = "id_tipo_producto";
	public $incrementing = true;


		// reglas
	public 	static $reglasValidacion = array(
			'tipo-producto'            => 'required|unique:inv_tipo_productos,nombre_tipo_producto', 	
		);


}
