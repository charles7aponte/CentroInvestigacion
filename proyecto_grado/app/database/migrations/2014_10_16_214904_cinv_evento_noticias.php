<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvEventoNoticias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_evento_noticias', function($tabla){
			$tabla->increments('id_evento');
			$tabla->string('titulo_evento',150);
			$tabla->text('descripcion');
			$tabla->text('enlace_documentos');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_evento_noticias');
	}

}
