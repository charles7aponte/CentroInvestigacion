<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinvFinanciacion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('inv_financiacion', function($tabla){
			$tabla->increments('id_financiacion');
			$tabla->integer('inv_codigo_proyecto')->unsigned();
			$tabla->string('inv_nit_empresa',30)->unsigned();
			$tabla->date('fecha')->nullable();
			$tabla->float('valor_financiado');
			$tabla->text('descripcion_financiamiento')->nullable();
			$tabla->string('modo_financiamiento',10);
			
			
			
			/*$tabla->foreign('inv_cod_proyecto')->references('codigo_proyecto')->on('inv_proyectos');
			$tabla->foreign('inv_nit_entidad')->references('nit_empresa')->on('inv_entidades');
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
		Schema::drop('inv_financiacion');
	}

}
