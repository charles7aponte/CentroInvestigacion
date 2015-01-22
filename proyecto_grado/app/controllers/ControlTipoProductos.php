<?php

class ControlTipoProductos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nombre=Input::get('tipo-producto');
		$descripcion=Input::get('desc-tipo-producto');

		$todosDatos = Input::all();

	

		/*objeto del modelo*/
		$entidad=new InvTipoProductos();
		
		$entidad->nombre_tipo_producto=$nombre;
		$entidad->descripcion_producto=$descripcion;



			// mensaje a mostrar
			$messages = array(
				'required' => '*Este campo es obligatorio.',
				'unique'  =>'Ya existe el tipo de producto.' 
				
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvTipoProductos::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formulariotipoproductos')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar, Verifique.");
			} else {



					try{
						$entidad->save();
					}
					catch( PDOException $e)
					{
					echo "entre entre";	//return 'existe un error' + $e;
						
						return Redirect::to('formulariotipoproductos')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					echo "entre2";

						return Redirect::to('formulariotipoproductos')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
			}
	}	
			

}
