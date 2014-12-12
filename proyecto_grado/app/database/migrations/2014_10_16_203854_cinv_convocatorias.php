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
			$tabla->string('estado',20);
			$tabla->text('titulo_convocatoria');
			$tabla->date('fecha_apertura');
			$tabla->date('fecha_cierre');
			$tabla->float('cuantia');
			$tabla->text('descripcion_convocatoria');
			$tabla->string('email',60);
			$tabla->string('telefono_contacto',20)->nullable();
			$tabla->text('pagina_convocatoria')->nullable();
			$tabla->text('archivo_convocatoria')->nullable();
			$tabla->text('convocatoria_dirigida');
			

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
