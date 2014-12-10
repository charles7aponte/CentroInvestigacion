<?php

class ControlEntidades extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nit=Input::get('nit-entidad');
		$entidad_nombre=Input::get('nombre-entidad');
		$representante=Input::get('representante-entidad');
		$tipo=Input::get('tipo-entidad');
		$descripcion=Input::get('desc-empresa');
		$email_entidad=Input::get('email-entidad');
		$pagina_entidad=Input::get('pagina-entidad');
		$telefono_entidad=Input::get('telefono-entidad');
		$celular_entidad=Input::get('celular-entidad');


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
