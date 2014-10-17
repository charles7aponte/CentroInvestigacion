<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvLoginUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_login_usuarios', function($tabla){
			$tabla->integer('inv_cod_grupo')->unsigned();
			$tabla->string('clave');

			$tabla->foreign('inv_cod_grupo')->references('codigo_grupo')->on('inv_grupos');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_login_usuarios');
	}

}
