<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvSublineas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_sublineas', function($tabla){
			$tabla->increments('id_sublinea');
			$tabla->integer('inv_id_linea')->unsigned();
			$tabla->text('nombre_sublinea');
			$tabla->string('estado',30)->nullable();
			$tabla->text('descripcion_sublinea')->nullable;
			
			
			//$tabla->foreign('inv_id_linea')->references('id_lineas')->on('inv_lineas');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_sublineas');
	}

}
