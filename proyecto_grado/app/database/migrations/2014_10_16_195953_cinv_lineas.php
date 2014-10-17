<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvLineas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_lineas', function($tabla){
			$tabla->increments('id_lineas');
			$tabla->string('nombre_linea',100);
			$tabla->text('definicion_linea');
			$tabla->text('objetivos');
			$tabla->text('objeto_estudio');
			$tabla->string('coordinador_linea',100);
			$tabla->text('ruta_archivo')->nullable();	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_lineas');
	}

}
