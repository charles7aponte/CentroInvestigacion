<?php

class Usuarios1 extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $primaryKey = "id";// no tiene llave primaria en la base
	public $incrementing = true;



}
