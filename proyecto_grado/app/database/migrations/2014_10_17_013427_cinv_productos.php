<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inv_productos', function($tabla){
			$tabla->increments('codigo_producto');
			$tabla->integer('inv_cod_grupo')->unsigned();
			$tabla->integer('inv_id_sublinea')->unsigned();
			$tabla->integer('inv_subtipo_producto')->unsigned();
			$tabla->text('nombre_producto');
			$tabla->text('observaciones_producto');
			$tabla->string('reconocimiento_producto',100);
			$tabla->text('soporte_producto')->nullable();
			$tabla->string('tipo_soporte',50)->nullable();
			$tabla->text('observaciones_soporte')->nullable();
			$tabla->string('entidad',100);
			$tabla->date('fecha_producto')->nullable();
			
			
			$tabla->foreign('inv_cod_grupo')->references('codigo_grupo')->on('inv_grupos');
			$tabla->foreign('inv_id_sublinea')->references('id_sublinea')->on('inv_sublineas');
			$tabla->foreign('inv_subtipo_producto')->references('id_subtipo_producto')->on('inv_subtipo_productos');
	
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inv_productos');
	}
	

}