<?php


class ControlFinanciamiento extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function CrearFormulario()
	{

		$entidad1=Input::get('entidad-financiada');
		$modo_financiamiento=Input::get('modo-financiada');
		$valor=Input::get('valor-financiado');
		$descripcion=Input::get('descripcion-financiamiento');
		
		//manejo de fechas ..		
		$fecha_inicio=Input::get('fecha-financiamiento');


		$dateinicio = new DateTime($fecha_inicio);

		$fecha_inicio=$dateinicio->format('d/m/Y');
		//que pasa si es null? se debe validar desde el cliente .. actualmente esta colocando la fecha de hoy si esta en blanco


		$todosDatos = Input::all();
	

		$entidad=new InvFinanciamiento();
		
		$entidad->inv_nit_empresa=$entidad1;
		$entidad->modo_financiamiento=$modo_financiamiento;
		$entidad->valor_financiado=$valor;
		$entidad->descripcion_financiamiento=$descripcion;

		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				//'max'=>'El campo no debe ser mayor a :max.',
				'numeric'=>'No es un valor valido.',

			);


			// execute la validacin 

			$validator = Validator::make(Input::all(), InvFinanciamiento::$reglasValidacion,$messages);

		
			if ($validator->fails()) 
			{
				$messages = $validator->messages();



				/*return Redirect::to('formulariofinanciamiento')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");*/
			} else 
				{

			

						$entidad->save();
						//print_r($entidad);

						$proyecto_financiado=Input::get("proyectos"); // name del json del jquery



						for($i=0;$i<count($proyecto_financiado);$i++)
						{

							$modelIntegrante=new InvFinanciamiento();
							//$modelIntegrante->codigo_proyecto =     $proyecto_financiado[$i];
							$modelIntegrante->inv_codigo_proyecto=  $proyecto_financiado[$i];
							//$modelIntegrante->codigo_proyecto =     $proyecto_financiado[$i];
							$modelIntegrante->save();

						}

					try
					{
						///
					}

						catch(PDOException $e)
						{
						//return 'existe un error' + $e;
						
							/*return Redirect::to('formulariofinanciamiento')
							->withInput($todosDatos)
							->with('mensaje_error',"Error en el servidor.");*/
						}
					
								/*return Redirect::to('formulariofinanciamiento')
								->withInput($todosDatos)
								->with('mensaje_success',"El proyecto ha sido creado.");*/
			
					}
			
			}


		/*********** carga el formulario para cargar los datos desde la tabla*/

					/*********** carga el formulario para cargar los datos desde la tabla*/

			public function cargarFormularioFinanciamiento(){

				$listaempresas = InvEntidades::all();

				$datos=  array(
					'empresas' =>$listaempresas);

			 	return View::make('administrador/formulario_financiamiento',$datos); 


			}//

}
