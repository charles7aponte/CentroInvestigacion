<?php

class ControlTipoGrupos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$tipo= Input::get('tipo-grupo');//ucfirst(strtolower(Input::get('tipo-grupo')));

		$todosDatos = Input::all();

	

		/*objeto del modelo*/
		$entidad=new InvTipoGrupos();
		
		$entidad->tipo_grupo=$tipo;


			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'unique'  =>'Es posible que ya exista el tipo de grupo, verifique.',
				'max'=>'No debe ser mayor a :max'
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvTipoGrupos::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formulariotipogrupo')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar, Verifique.");
			} else {



					try{
						$entidad->save();
					}
					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formulariotipogrupo')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}

						return Redirect::to('formulariotipogrupo')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
					
			}

		}	

			//crear y cargar en la tabla cada tipo grupo.. funcionando

			public function cargarFormularioTipoGrupo(){

			$form_tipogrupo= InvTipoGrupos::where("estado","=","1")->get(); //de donde necesito

			$datos=  array(
				'tipogrupos' =>$form_tipogrupo);


			return View::make('administrador/formulario_tipogrupos',$datos); 


			}//

			
			public function EliminarFormularioTipoGrupo($id){
			
				$form_tipogrupo= InvTipoGrupos::find($id); //de donde necesito

				if (is_null($form_tipogrupo)==false){

					$form_tipogrupo->estado=0;
					$form_tipogrupo->tipo_grupo.="*";
					$form_tipogrupo->save();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));

			}//			//elimina cada tipo de la tabla .. 


}
