<?php

class Usuarios1 extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios1';
	protected $primaryKey = "nombre";// no tiene llave primaria en la base
	public $incrementing = false;
	public $timestamps = false;



}
