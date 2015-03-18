<?php

class ControlUnidadesAcademicas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario()
	{

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
				'unique'=>'Es posible que la unidad academica ya exista.'
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvUnidadesAcademicas::$reglasValidacion,$messages);

			if ($validator->fails()){
				$messages = $validator->messages();


				return Redirect::to('formulariounidadesacademicas')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar.");
			}

			else
			{
			
				try{
					
					$entidad->save();
				}

				catch( PDOException $e)
				{
					//return 'existe un error' + $e;
						
					return Redirect::to('formulariounidadesacademicas')
					->withInput($todosDatos)
					->with('mensaje_error',"Error del servidor.");
				}

					return Redirect::to('formulariounidadesacademicas')
						->withInput($todosDatos)
						->with('mensaje_success',"Se ha Guardado");
			}
	}

	public function cargarFormularioUnidades()
	{

		return View::make('administrador/formulario_unidades_academicas'); 	
	}
}
