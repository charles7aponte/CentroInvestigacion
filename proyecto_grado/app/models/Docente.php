<?php

class Docente extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'docente';
	public $timestamps = false;
	protected $primaryKey = "coddocente";// no tiene llave primaria en la base



	/*********
	*
	**/
	public function personas(){

		return $this->belongsTo('Persona','cedula','cedula');
	}

}
