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
				'max'=>'No debe ser mayor a :max',
				'unique'=>'Es posible que la sublinea ya exista.'
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvSublineas::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formulariosublineas')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar.");
			} else {


	
					
					try{
						$entidad->save();
					}
					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formulariosublineas')
						->withInput($todosDatos)
						->with('mensaje_error',"Error del servidor.");


					}

						return Redirect::to('formulariosublineas')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
					}
			}



			public function cargarFormularioNuevaSublinea(){

			$listaLineas = InvLineas::where("estado","=","1")->get();

			$datos=  array(
				'lineas' =>$listaLineas);


		return View::make('administrador/formulario_sublineas',$datos); 


			}//


			public function EliminarFormularioSublinea($id){
			
				$form_sublinea= InvSublineas::find($id); //de donde necesito

				if (is_null($form_sublinea)==false){

					$form_sublinea->estado1=0;
					$form_sublinea->nombre_sublinea.="*";
					$form_sublinea->save();

					//$form_tipogrupo->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));

			}


	public function guardarEdicion(){

		$id=Input::get('id_sublineas');

		$nombre=Input::get('nombre-sublinea');
		$estado=Input::get('estado-sublinea');
		$descripcion=Input::get('decr-sublinea');
		$linea=Input::get('lineade-sublinea');
	
							
		$todosDatos = Input::all();


		/*objeto del modelo*/

		$entidad=InvSublineas::find($id);

		$numeroSublineaAnterior = $entidad->id_sublinea;
		
		
		$entidad->nombre_sublinea =$nombre;
		$entidad->estado =$estado;
		$entidad->descripcion_sublinea =$descripcion;
		$entidad->inv_id_linea =$linea;

		
			//mensaje a mostrar segun errores o requerimientos-----------

			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max',
				'unique'=>'Es posible que ya exista la linea que ingreso.'
			);

			$validator= false;


			// execute la validacin

			if($numeroSublineaAnterior ==  $entidad->id_sublinea)
			{
				$validator = Validator::make(Input::all(), InvSublineas::$reglasValidacionEdicion,$messages);

			}
			else {
				$validator = Validator::make(Input::all(), InvLineas::$reglasValidacion,$messages);
			}


			if ($validator->fails())
			{
				
				$messages = $validator->messages();

				return Redirect::to('formulariosublineas/edit/'.$id."/")
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			}
	
			else {
		
					$entidad->save();

				try{

				}

				catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formulariosublineas/edit/'.$id)
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
					return Redirect::to('formulariosublineas/edit/'.$id)
						//->withInput($todosDatos)
						->with('mensaje_success',"La sublinea ha sido editada.");	
			}

	}

	function cargarEditar($id)
		{

			$sublinea = InvSublineas::find($id);	
			$listaLineas = InvLineas::where("estado","=","1")->get();

	
			$datos=array('sublinea' => $sublinea,
							'accion'=>'editar',
							'lineas' =>$listaLineas );


			return View::make('administrador/formulario_sublineas',$datos);
	}

}
