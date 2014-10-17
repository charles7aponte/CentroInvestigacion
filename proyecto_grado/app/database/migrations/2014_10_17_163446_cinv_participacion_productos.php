<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvParticipacionProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_participacion_productos', function($tabla){
			$tabla->increments('id_participacion_productos');
			$tabla->integer('inv_cod_grupo')->unsigned();
			$tabla->integer('inv_cod_producto')->unsigned();
			$tabla->integer('id_cod_docente')->unsigned();
			$tabla->bigInteger('id_ced_persona')->unsigned();
			$tabla->integer('id_cod_estudiante')->unsigned();
			$tabla->string('inv_identificacion_externo',20)->unsigned();
			
			
			$tabla->foreign('inv_cod_grupo')->references('codigo_grupo')->on('inv_grupos');
			$tabla->foreign('inv_cod_producto')->references('codigo_producto')->on('inv_productos');
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
		Schema::drop('inv_participacion_productos');
	}

}
