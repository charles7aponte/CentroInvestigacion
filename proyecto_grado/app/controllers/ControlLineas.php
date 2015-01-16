<?php

class ControlLineas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nit=Input::get('nonmbre-linea');
		$cordinador_linea=Input::get('cordinador-linea');
		$objetivo=Input::get('objetivo-linea');
		$estudio=Input::get('objetivo-estulinea');
		$definicion=Input::get('defi-linea');
		$archivo=Input::get('archivo-linea');

		$todosDatos = Input::all();

	

		/*objeto del modelo*/
		$entidad=new InvEntidades();
		
		$entidad->nit_empresa=$nit;
		$entidad->nombre_empresa=$entidad_nombre;
		$entidad->representante_legal=$representante;
		$entidad->descripcion_empresa=$descripcion;
		$entidad->tipo_empresa=$tipo;
		$entidad->email=$email_entidad;

		$entidad->pagina_web=$pagina_entidad;
		$entidad->telefono=$telefono_entidad;
		$entidad->celular=$celular_entidad;

			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max',
				'email' =>'No es una dirección de email válida'
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvEntidades::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formularioentidades')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			} else {



					try{
						$entidad->save();
					}
					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioentidades')
						->withInput($todosDatos)
						->with('mensaje_error',"Verifique si exsite la entidad");
					}

						return Redirect::to('formularioentidades')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
					}
			}

}
