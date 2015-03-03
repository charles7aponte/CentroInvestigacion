<?php

class InvPersonaPerfil extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'personaperfil';
	public $timestamps = false;
	protected $primaryKey = array("codperfil","cedula");


}