<?php

class Estudiante extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'estudiante';
	public $timestamps = false;
	protected $primaryKey = "codestudiante";// no tiene llave primaria en la base



	/*********
	*
	**/
	public function personas(){

		return $this->belongsTo('Persona','cedula','cedula');
	}

}
