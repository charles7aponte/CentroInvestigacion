<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvGrupos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_grupos', function($tabla){
			$tabla->increments('codigo_grupo');
			$tabla->integer('inv_tipo_grupos_id')->unsigned();
			$tabla->text('nombre_grupo');
			$tabla->string('director_grupo',100);
			$tabla->string('unidad_academica',100);
			$tabla->string('categoria',30);
			$tabla->text('objetivos');
			$tabla->date('ano_creacion');
			$tabla->string('email',60);
			$tabla->string('telefono',20);
			$tabla->text('direccion_grupo');
			$tabla->text('pagina_web')->nullable();
			$tabla->text('ruta_afiche')->nullable();
			$tabla->text('link_gruplac')->nullable();
			$tabla->text('imagen1')->nullable();
			$tabla->text('imagen2')->nullable();
			$tabla->text('logo_grupo');	

			//$tabla->foreign('inv_tipo_grupos_id')->references('id_tipo')->on('inv_tipo_grupos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_grupos');
	}

}
