<?php

class ControlLineas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nombre=Input::get('nombre-linea');
		$coordinador=Input::get('cedula-persona');
		$objetivo=Input::get('objetivo-linea');
		$objeto_estudio=Input::get('objetivo-estulinea');
		$definicion=Input::get('defi-linea');	
		//$archivo=Input::get('archivo-linea');
		$nombreNuevo="";

		$direccion = __DIR__."/../../public/archivos_db/lineas/";					

		$todosDatos = Input::except('archivo-linea');


		/*objeto del modelo*/
		$entidad=new InvLineas();
		
		$entidad->nombre_linea=$nombre;
		$entidad->coordinador_linea =$coordinador;
		$entidad->objetivo_linea=$objetivo;
		$entidad->objetivo_estudio =$objeto_estudio;
		$entidad->definicion_linea=$definicion;

		print_r($entidad);
			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max',
				'unique'=>'Es posible que ya exista la linea que ingreso.'
			);


			// ejecute la validacion 
			$validator = Validator::make(Input::all(), InvLineas::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();

				return Redirect::to('formulariolineas')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			} else {



					try{

							//manejo de archivo

							if(Input::hasFile('archivo-linea'))
							{

								$archivoF =Input::file('archivo-linea');
								$nombreNuevo=$nombre."-".$archivoF->getClientOriginalName();


								while (File::exists($direccion.$nombreNuevo) )
								{
									$nombre=rand(1,999);
									$nombreNuevo=$nombre."-".$nombreNuevo;				
								
								}


								$archivoF->move($direccion,$nombreNuevo);
							}

						$entidad->ruta_archivo=$nombreNuevo;
						$entidad->save();
					}

					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formulariolineas')
						->withInput($todosDatos)
						->with('mensaje_error',"Verifique, es posible que ya exista la línea");
					}

						return Redirect::to('formulariolineas')

								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
					}
			}

			public function buscarlineaPorNombre($linea){
				$lineas=InvLineas::where("nombre_linea","LIKE","%$linea%")->get();

				return Response::json($lineas);

			}


			public function EliminarFormularioLinea($id){
			
				$form_linea= InvLineas::find($id); //de donde necesito

				if (is_null($form_linea)==false){

					$form_linea->estado=0;
					$form_linea->nombre_linea.="*";
					$form_linea->save();

					//$form_tipogrupo->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));

			}//			//elimina cada tipo de la tabla .. 

}
