<?php

class ControlPeriodosAcademicos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$periodo=Input::get('titulo-periodo');
		$ano_periodo=Input::get('ano-periodo');
	

		//manejo de fechas ..		
		$inicio_periodo=Input::get('fecha-inicio');

		$dateinicio_periodo = new DateTime($inicio_periodo);
		$inicio_periodo=$dateinicio_periodo->format('d/m/Y');


		$fin_periodo=Input::get('fecha-fin');

		$datefin_periodo = new DateTime($fin_periodo);
		$fin_periodo=$datefin_periodo->format('d/m/Y');

		$todosDatos = Input::all();

					

		/*objeto del modelo*/
		$entidad=new invPeriodos();
		
		$entidad->periodo=$periodo;
		$entidad->ano=$ano_periodo;
		$entidad->fecha_inicio=$inicio_periodo;
		$entidad->fecha_fin=$fin_periodo;
			// mensaje a mostrar


			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max',
				'unique'=>'Es posible que ya exista el evento o noticia.'
			);


			// ejecute la validacion 
			$validator = Validator::make(Input::all(), invPeriodos::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();

				return Redirect::to('formularioperiodosacademicos')
					->withErrors($validator)
					->with('mensaje_error',"Error al guardar");
			} 
			else 
			{

					try
					{

						$entidad->save();
					}

					catch( PDOException $e)
					{
					echo "entre entre";	//return 'existe un error' + $e;
						
						return Redirect::to('formularioperiodosacademicos')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					echo "entre2";

				return Redirect::to('formularioperiodosacademicos')
					->withInput($todosDatos)
					->with('mensaje_success',"Se ha Guardado");
				
			}
}

		//crear y cargar en la tabla cadaa perido academico .. funcionando
			public function cargarFormularioPeriodo(){

			$form_periodoacademico= invPeriodos::all(); //de donde necesito

			$datos=  array(

				'periodos' => $form_periodoacademico);

				return View::make('administrador/formulario_periodos_academicos',$datos); 


			}//

			public function EliminarFormularioPeriodo($id){
			
				$form_periodoacademico= invPeriodos::find($id); //de donde necesito

				if (is_null($form_periodoacademico)==false){
					$form_periodoacademico->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));
			}//				
					
	}


