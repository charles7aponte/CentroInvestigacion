<?php

class InvEntidades extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'empresa';
	public $timestamps = false;
	protected $primaryKey = "nit";


}
