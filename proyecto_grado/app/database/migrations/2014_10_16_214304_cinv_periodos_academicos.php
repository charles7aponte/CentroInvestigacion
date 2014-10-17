<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvPeriodosAcademicos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_periodos_academicos', function($tabla){
			$tabla->increments('codigo_periodo');
			$tabla->string('ano',4);
			$tabla->string('periodo',2);
			$tabla->date('fecha_inicio');
			$tabla->date('fecha_fin');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_periodos_academicos');
	}

}
