<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvParticipacionProyectos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_participacion_proyectos', function($tabla){
			$tabla->increments('id_participacion_proyectos');
			$tabla->integer('inv_cod_proyecto')->unsigned();
			$tabla->bigInteger('cedula_persona')->unsigned();
			$tabla->string('dedicacion_tiempo',10);
			
			$tabla->foreign('inv_cod_proyecto')->references('codigo_proyecto')->on('inv_proyectos');
			$tabla->foreign('cedula_persona')->references('cedula')->on('persona');
	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_participacion_proyectos');
	}

}
