<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvParticipacionGrupos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_participacion_grupos', function($tabla){
			$tabla->increments('id_participacion_grupos');
			$tabla->integer('inv_cod_grupo')->unsigned();
			$tabla->bigInteger('cedula_persona')->unsigned();
			
			
			/*$tabla->foreign('inv_cod_grupo')->references('codigo_grupo')->on('inv_grupos');
			$tabla->foreign('cedula_persona')->references('cedula')->on('persona');
			*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_participacion_grupos');
	}

}
