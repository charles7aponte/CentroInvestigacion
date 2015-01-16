<?php

class ControlTipoGrupos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$tipo=Input::get('tipo-grupo');

		$todosDatos = Input::all();

	

		/*objeto del modelo*/
		$entidad=new InvTipoGrupos();
		
		$entidad->tipo_grupo=$tipo;


			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'unique'  =>'Es posible que ya exista el tipo de producto, verifique.',
				'max'=>'No debe ser mayor a :max'
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvTipoGrupos::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formulariotipogrupo')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar, puede ser posible que exceda la cantidad de caracteres o ingreso un tipo de grupo que ya existe.");
			} else {



					try{
						$entidad->save();
					}
					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formulariotipogrupo')
						->withInput($todosDatos)
						->with('mensaje_error',"error al guardar, verifique");
					}

						return Redirect::to('formulariotipogrupo')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
					
			}

		}	

}
