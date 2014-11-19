<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvInvestigadoresExternos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_investigadores_externos', function($tabla){
			$tabla->increments('codinv_ext');
			$tabla->bigInteger('cedula_persona')->unsigned();
			$tabla->string('profesion',100);
			$tabla->integer('codconvocatoria')->unsigned();
			$tabla->text('nombreconvocatoria')->unsigned();
			$tabla->string('numerocontrato',100)->unsigned();
			$tabla->date('fecha_inicio')->unsigned();
			$tabla->date('fecha_fin')->unsigned();

			
			//$tabla->foreign('cedula_persona')->references('cedula')->on('persona');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
