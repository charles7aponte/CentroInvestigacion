<?php

class Persona extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'persona';
	public $timestamps = false;
	protected $primaryKey = "cedula";// no tiene llave primaria en la base



	/*********
	*
	**/
	public function grupos(){

		return $this->belongsToMany('InvGrupos','inv_participacion_grupos','cedula_persona','inv_codigo_grupo');
	}


	public function estudiantes(){

		return $this->hasMany('Estudiante','cedula','cedula');
	}

}
