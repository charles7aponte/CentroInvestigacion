<?php

class InvUniversidades extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'universidad';
	public $timestamps = false;
	protected $primaryKey = "cod_uni";


}