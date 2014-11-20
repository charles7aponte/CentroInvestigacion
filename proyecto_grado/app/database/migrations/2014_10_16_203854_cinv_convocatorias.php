<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvConvocatorias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_convocatorias', function($tabla){
			$tabla->string('numero_convocatoria',50);
			$tabla->text('titulo_convocatoria');
			$tabla->text('descripcion_convocatoria');
			$tabla->string('telefono',20)->nullable();
			$tabla->string('email',60)->nullable();
			$tabla->text('pagina_convocatoria');
			$tabla->text('archivo_convocatoria');
			$tabla->string('estado',20);
			$tabla->text('convocatoria_dirigida');
			$tabla->date('fecha_apertura');
			$tabla->date('fecha_cierre')->nullable();
			$tabla->float('total_recursos');

			$tabla->primary('numero_convocatoria');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_convocatorias');
	}

}
