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
			$tabla->integer('id_cod_docente')->unsigned();
			$tabla->bigInteger('id_ced_persona')->unsigned();
			$tabla->integer('id_cod_estudiante')->unsigned();
			$tabla->string('inv_identificacion_externo',20)->unsigned();
			$tabla->string('dedicacion_tiempo',10);
			
			$tabla->foreign('inv_cod_proyecto')->references('codigo_proyecto')->on('inv_proyectos');
			$tabla->foreign('id_cod_docente')->references('cod_docente')->on('docentes');
			$tabla->foreign('id_ced_persona')->references('cedula_persona')->on('personas');
			$tabla->foreign('id_cod_estudiante')->references('cod_estudiante')->on('estudiantes');
			$tabla->foreign('inv_identificacion_externo')->references('identificacion_externo')->on('inv_participantes_externos');
	
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
