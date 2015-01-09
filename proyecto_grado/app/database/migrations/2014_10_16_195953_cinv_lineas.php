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
			$tabla->text('definicion_linea')->nullable();
			$tabla->string('coordinador_linea',50);
			$tabla->text('objetivo_estudio');
			$tabla->text('objetivo_linea')->nullable();
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
