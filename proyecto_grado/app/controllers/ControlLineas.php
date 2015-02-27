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



	public function guardarEdicion(){

		$id=Input::get('id_linea');

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

		$entidad=InvLineas::find($id);

		$numerolineaAnterior = $entidad->id_lineas;
		
		
		$entidad->nombre_linea=$nombre;
		$entidad->coordinador_linea =$coordinador;
		$entidad->objetivo_linea=$objetivo;
		$entidad->objetivo_estudio =$objeto_estudio;
		$entidad->definicion_linea=$definicion;

	
		//mensaje a mostrar segun errores o requerimientos-----------

			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max',
				'unique'=>'Es posible que ya exista la linea que ingreso.'
			);



			$validator= false;


			// ejecute la validacion 

			if($numerolineaAnterior ==  $entidad->id_lineas)
			{
				$validator = Validator::make(Input::all(), InvLineas::$reglasValidacionEdicion,$messages);

			}
			else {
				$validator = Validator::make(Input::all(), InvLineas::$reglasValidacion,$messages);
			}


			if ($validator->fails()) {
				
				$messages = $validator->messages();

				return Redirect::to('formulariolineas/edit/'.$id."/")
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			}

			else {

				if(Input::get('edicion_dct-linea')=="si")
					{
						$archivoF=$this->guardarArchivos('archivo-linea',$direccion);//archivoshtml
						$entidad->ruta_archivo=$archivoF;
							
					}	
		
					$entidad->save();

				try{

				}

				catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formulariolineas/edit/'.$id)
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
					return Redirect::to('formulariolineas/edit/'.$id)
						//->withInput($todosDatos)
						->with('mensaje_success',"La linea ha sido editada.");	
			}

	}


	function cargarEditar($id)
	{

	
	$linea = InvLineas::find($id);	

	$nombre="";

	if (is_numeric($linea->coordinador_linea))
	 {

		
		$nombre_persona= Persona::find($linea->coordinador_linea); 
		//
		if ($nombre_persona) 
		{
			$nombre = $nombre_persona->nombre1." ".$nombre_persona->apellido1;
		}
	}


		$linea->nombre_coordinador=$nombre;

		$datos=array('linea' => $linea,
					 'accion'=>'editar' );


		return View::make('administrador/formulario_lineas',$datos);
	}


	function guardarArchivos($name,$direccion){
				
				$nombreNuevo="";
				if(Input::hasFile($name))
					{

						$archivoF =Input::file($name);
						$nombreNuevo=$archivoF->getClientOriginalName();


						while (File::exists($direccion.$nombreNuevo) )
						{
							$numero=rand(1,999);
							$nombreNuevo=$numero."-".$nombreNuevo;				
				
						}


						$archivoF->move($direccion,$nombreNuevo);
					}

					return $nombreNuevo;
			
	}
}
