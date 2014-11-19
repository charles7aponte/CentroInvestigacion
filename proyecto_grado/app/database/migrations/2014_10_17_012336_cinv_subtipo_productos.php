<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvSubtipoProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_subtipo_productos', function($tabla){
		$tabla->increments('id_subtipo_producto')->unsigned();
		$tabla->integer('inv_id_tipo_producto')->unsigned();
		$tabla->string('nombre_subtipo_producto',100);
		$tabla->text('descripcion_subtipo_producto')->nullable();

		//$tabla->foreign('inv_id_tipo_producto')->references('id_tipo_producto')->on('inv_tipo_productos');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_subtipo_productos');
	}

}
