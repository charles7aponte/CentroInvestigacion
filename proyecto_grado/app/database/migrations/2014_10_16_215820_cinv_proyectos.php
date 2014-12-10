<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvProyectos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_proyectos', function($tabla){
			$tabla->increments('codigo_proyecto');
			$tabla->string('inv_numero_convocatoria')->unsigned();
			$tabla->integer('inv_id_sublinea')->unsigned();
			$tabla->integer('inv_codigo_grupo')->unsigned();
			$tabla->text('nombre_proyecto');
			$tabla->text('objetivo_general');
			$tabla->text('archivo_actainicio')->nullable();
			$tabla->text('archivo_propuesta')->nullable();
			$tabla->text('informe_final')->nullable();
			$tabla->date('fecha_proyecto');
			$tabla->text('grupo_auxiliar')->nullable();
			$tabla->string('estado_proyecto',30);
		
			
			/*$tabla->foreign('inv_numero_convocatoria')->references('numero_convocatoria')->on('inv_convocatorias');
			$tabla->foreign('inv_id_sublinea')->references('id_sublinea')->on('inv_sublineas');
			$tabla->foreign('inv_cod_grupo')->references('codigo_grupo')->on('inv_grupos');
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
		Schema::drop('inv_proyectos');
	}

}
