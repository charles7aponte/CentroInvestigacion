<?php

class InvGrupos extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_grupos';
	public $timestamps = false;
	protected $primaryKey = "codigo_grupo";



	/**
	*relacion muchos a muchos
	**/
	public  function personas(){

		return $this->belongsToMany('Persona','inv_participacion_grupos','inv_codigo_grupo','cedula_persona');
	}



}
