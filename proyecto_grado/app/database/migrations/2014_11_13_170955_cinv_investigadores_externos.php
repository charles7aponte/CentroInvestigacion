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
			$tabla->integer('codconvocatoria')->->nullable();
			$tabla->text('nombreconvocatoria')->nullable();
			$tabla->text('entidad')->nullable();
			$tabla->string('numerocontrato',100)->nullable();
			$tabla->date('fecha_inicio')->->nullable();
			$tabla->date('fecha_fin')->->nullable();

			
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
		Schema::drop("inv_investigadores_externos");
	}

}
