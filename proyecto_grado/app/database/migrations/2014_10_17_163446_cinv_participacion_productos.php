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
			$tabla->bigInteger('cedula_persona')->unsigned();
			
			
			$tabla->foreign('inv_cod_grupo')->references('codigo_grupo')->on('inv_grupos');
			$tabla->foreign('inv_cod_producto')->references('codigo_producto')->on('inv_productos');
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
		Schema::drop('inv_participacion_productos');
	}

}
