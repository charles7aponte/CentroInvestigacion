<?php

class ControlSublineas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nombre=Input::get('nombre-sublinea');
		$estado=Input::get('estado-sublinea');
		$descripcion=Input::get('decr-sublinea');
		$linea=Input::get('lineade-sublinea');
	
							
		$todosDatos = Input::all();


		/*objeto del modelo*/
		$entidad=new InvSublineas();
		
		$entidad->nombre_sublinea =$nombre;
		$entidad->estado =$estado;
		$entidad->descripcion_sublinea =$descripcion;
		$entidad->inv_id_linea =$linea;

		
			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max'
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvSublineas::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formulariosublineas')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Verifique, es posible que ya exista la sublínea o que excedio en el numero de caracteres de un campo");
			} else {


	$entidad->save();
					}
					try{
					
					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						//return Redirect::to('formulariosublineas')
						//->withInput($todosDatos)
						//->with('mensaje_error',"Error al guardar");


					}

						//return Redirect::to('formulariosublineas')
						//		->withInput($todosDatos)
						//		->with('mensaje_success',"Se ha Guardado");
				
					}
			}





			public function cargarFormularioNuevaSublinea(){

			$listaLineas = InvLineas::all();

			$datos=  array(
				'lineas' =>$listaLineas);


		return View::make('administrador/formulario_sublineas',$datos); 


			}//

}
