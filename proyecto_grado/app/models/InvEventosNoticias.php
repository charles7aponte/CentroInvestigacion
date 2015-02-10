<?php

class InvEventosNoticias extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inv_evento_noticias';
	public $timestamps = false;
	protected $primaryKey = "id_evento";
	public $incrementing = true;


		// reglas
	public 	static $reglasValidacion = array(
			'titulo-even-noti'   =>'required|max:150|unique:inv_evento_noticias,titulo_evento',  	
			'desc-even-noti'	=>'required',
			'tipo-even-noti'	=>'required',
					
		);


}
