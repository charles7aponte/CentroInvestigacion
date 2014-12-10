<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvEntidades extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_entidades', function($tabla){
			$tabla->string('nit_empresa',30);
			$tabla->text('nombre_empresa');
			$tabla->text('descripcion_empresa');
			$tabla->string('email',60);
			$tabla->text('paginaweb')->nullable();
			$tabla->string('representante_legal',50);
			$tabla->string('telefono',20)->nullable();
			$tabla->string('celular',20)->nullable();
			$tabla->string('tipo_empresa',10);
			$tabla->primary('nit_empresa');

			//$tabla->timestamp();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_entidades');
	}

}
