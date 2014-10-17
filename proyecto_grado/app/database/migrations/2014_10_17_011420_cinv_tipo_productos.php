<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvTipoProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('inv_tipo_productos', function($tabla){
			$tabla->increments('id_tipo_producto');
			$tabla->text('nombre_tipo_producto');
			$tabla->text('descripcion_producto')->nullable();

		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_tipo_productos');
	}
	

}
