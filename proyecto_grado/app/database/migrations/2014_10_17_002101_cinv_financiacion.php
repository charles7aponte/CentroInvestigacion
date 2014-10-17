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

			$tabla->integer('inv_cod_proyecto')->unsigned();
			$tabla->string('inv_nit_entidad',30)->unsigned();
			$tabla->text('descripcion_financiamiento');
			$tabla->float('valor_financiado');
			$tabla->date('fecha');
			
			
			$tabla->foreign('inv_cod_proyecto')->references('codigo_proyecto')->on('inv_proyectos');
			$tabla->foreign('inv_nit_entidad')->references('nit_empresa')->on('inv_entidades');
	
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
