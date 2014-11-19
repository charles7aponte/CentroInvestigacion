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
			$tabla->integer('inv_cod_grupo')->unsigned();
			$tabla->text('nombre_proyecto');
			$tabla->string('objetivo_general',150);
			$tabla->text('archivo_propuesta');
			$tabla->text('archivo_acta_inicio');
			$tabla->text('archivo_informe_final')->nullable();
			$tabla->date('fecha_proyecto')->nullable();
			$tabla->text('sublinea_auxiliar')->nullable();
			$tabla->text('grupo_auxiliar')->nullable();
			$tabla->string('estado_proyecto',30)->nullable();
			$tabla->string('estado_financiamiento',50);
			
			
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
