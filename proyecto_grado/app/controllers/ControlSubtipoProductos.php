<?php

class ControlSubtipoProductos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nombre=Input::get('subtipo-producto');
		$descripcion=Input::get('desc-subtipo-producto');
	

		$todosDatos = Input::all();

	

		/*objeto del modelo*/
		$entidad=new InvSubtipoProductos();
		
		$entidad->nombre_subtipo_producto=$nombre;
		$entidad->descripcion_subtipo_producto=$descripcion;
	


			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				 'unique'  =>'Es posible que ya exista el subtipo de producto, verifique'
				
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvSubtipoProductos::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formulariosubtipoproductos')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error');
			} else {



					try{
						$entidad->save();
					}
					catch( PDOException $e)
					{
				
						
						return Redirect::to('formulariosubtipoproductos')
						->withInput($todosDatos)
						->with('mensaje_error',"Error al guardar, verifique");
					}

						return Redirect::to('formulariosubtipoproductos')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
			}
	}	
			

}

