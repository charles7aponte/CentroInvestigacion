<?php

class ControlSubtipoProductos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nombre=Input::get('subtipo-producto');
		$tipo_producto=Input::get('subtipo-tipo-producto');
		$descripcion=Input::get('desc-subtipo-producto');
	

		$todosDatos = Input::all();

	

		/*objeto del modelo*/
		$entidad=new InvSubtipoProductos();
		
		$entidad->nombre_subtipo_producto=$nombre;
		$entidad->descripcion_subtipo_producto=$descripcion;
		$entidad->inv_id_tipo_producto=$tipo_producto;
	


			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'unique'  =>'Ya existe el subtipo de producto, verifique.'
				
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvSubtipoProductos::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formulariosubtipoproductos')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar, Verifique.");
			} else {



					try{
						$entidad->save();
					}
				 	catch( PDOException $e)
					{
				
						
						return Redirect::to('formulariosubtipoproductos')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}

						return Redirect::to('formulariosubtipoproductos')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
			}
		}

			public function cargarFormularioNuevoSubtipoProducto(){

			$listatipos =InvTipoProductos::all(); //modelo del q quiero cargar

			$datos=  array(
				'tipos' =>$listatipos);


			return View::make('administrador/formulario_subtipoproductos',$datos); 

			}//		
			

}

