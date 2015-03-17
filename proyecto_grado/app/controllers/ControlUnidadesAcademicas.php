<?php

class ControlUnidadesAcademicas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nombre=Input::get('nombre-unidad');
		$descripcion=Input::get('descripcion_unidad');
		$coordinador=Input::get('cedula-persona');

							
		$todosDatos = Input::all();


		/*objeto del modelo*/
		$entidad=new InvUnidadesAcademicas();
		
		$entidad->nombre_unidad=$nombre;
		$entidad->inv_cedula_coordinador=$coordinador;
		$entidad->descripcion=$descripcion;

		
			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max',
				'unique'=>'Es posible que la sublinea ya exista.'
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvUnidadesAcademicas::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				/*return Redirect::to('formulario_unidades_academicas')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar.");*/
			} else {


	
					
					//try{
						$entidad->save();
				//	}
					/*catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formulario_unidades_academicas')
						->withInput($todosDatos)
						->with('mensaje_error',"Error del servidor.");


					}

						return Redirect::to('formulario_unidades_academicas')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				*/
					}
			}


			public function cargarFormularioUnidades(){

				return View::make('administrador/formulario_unidades_academicas'); 	
			}

			/*public function cargarFormularioNuevaSublinea(){

			$listaLineas = InvLineas::where("estado","=","1")->get();

			$datos=  array(
				'lineas' =>$listaLineas);


		return View::make('administrador/formulario_sublineas',$datos); 


			}//*/


			/*public function EliminarFormularioSublinea($id){
			
				$form_sublinea= InvSublineas::find($id); //de donde necesito

				if (is_null($form_sublinea)==false){

					$form_sublinea->estado1=0;
					$form_sublinea->nombre_sublinea.="*";
					$form_sublinea->save();

					//$form_tipogrupo->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));

			}*/

}
