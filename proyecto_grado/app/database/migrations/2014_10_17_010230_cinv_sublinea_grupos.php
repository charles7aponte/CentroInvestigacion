<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvSublineaGrupos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_linea_grupos', function($tabla){

		$tabla->increments('id_linea_grupos');
		$tabla->integer('inv_codigo_grupo')->unsigned();
		$tabla->integer('inv_id_linea')->unsigned();

		/*$tabla->foreign('inv_cod_grupo')->references('codigo_grupo')->on('inv_grupos');
		$tabla->foreign('inv_id_sublinea')->references('id_sublinea')->on('inv_sublineas');
	*/

		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_linea_grupos');
	}

}
