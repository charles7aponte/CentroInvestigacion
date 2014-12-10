<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call('InsercionTipoGrupos');
		//$this->command->info('la tabla tipo grupo ha sido llenada');

		    DB::table('users')->delete();  
   
        User::create(array(  
            'username' => 'user1',  
            'password' => Hash::make('pass1'),  
            'email' => 'prueba1@prueba.com'  
        ));  
	}

}

class InsercionTipoGrupos extends seeder {

	public function run(){

		DB::table('inv_tipo_grupos')->insert(array(
			'tipo_grupo'=>'Investigacion'
			));

		DB::table('inv_tipo_grupos')->insert(array(
			'tipo_grupo'=>'Estudio'
			));
	}

}

class InsercionGrupos extends seeder {

	public function run(){

		DB::table('inv_grupos')->insert(array(
			''=>''
			));

		DB::table('inv_grupos')->insert(array(
			''=>''
			));
	}

}