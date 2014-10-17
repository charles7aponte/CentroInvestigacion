<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvParticipantesExternos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_participantes_externos', function($tabla){
			$tabla->string('identificacion_externo',20);
			$tabla->string('nombre1',50);
			$tabla->string('nombre2',50)->nullable();
			$tabla->string('apellido1',50);
			$tabla->string('apellido2',50)->nullable();
			$tabla->string('email',60);
			$tabla->string('telefono',20);
			$tabla->string('profesion',50)->nullable();
			$tabla->text('foto')->nullable();

			$tabla->primary('identificacion_externo');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_participantes_externos');
	}

}
