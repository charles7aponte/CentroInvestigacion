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
			$tabla->text('descripcion');
			$tabla->string('categoria',15)->nullable();
			$tabla->string('email',60);
			$tabla->string('telefono',15);
			$tabla->text('pagina_web');
			$tabla->string('direccion_grupo',100);
			$tabla->text('archivo_afiche');
			$tabla->text('link_gruplac')->nullable();
			$tabla->date('ano_creacion')->nullable();
			$tabla->text('logo_grupo');
			$tabla->text('foto1')->nullable();
			$tabla->text('foto2')->nullable();	

			$tabla->foreign('inv_tipo_grupos_id')->references('id_tipo')->on('inv_tipo_grupos');
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
