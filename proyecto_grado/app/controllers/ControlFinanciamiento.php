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

		$fecha_inicio=$dateinicio->format('Y-m-d');
		//que pasa si es null? se debe validar desde el cliente .. actualmente esta colocando la fecha de hoy si esta en blanco


		$todosDatos = Input::all();
	

		$entidad=new InvFinanciamiento();
		
		$entidad->inv_nit_empresa=$entidad1;
		$entidad->modo_financiamiento=$modo_financiamiento;
		$entidad->valor_financiado=$valor;
		$entidad->descripcion_financiamiento=$descripcion;
		$entidad->fecha=$fecha_inicio;

		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				//'max'=>'El campo no debe ser mayor a :max.',
				'numeric'=>'No es un valor valido, verifique.',

			);


			// execute la validacin 

			$validator = Validator::make(Input::all(), InvFinanciamiento::$reglasValidacion,$messages);

		
			if ($validator->fails()) 
			{
				$messages = $validator->messages();



				return Redirect::to('formulariofinanciamiento')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			} else 
				{


						$proyecto_financiado=Input::get("proyectos"); // name del json del jquery





					try
					{
											
						for($i=0;$i<count($proyecto_financiado);$i++)
						{

							//$modelIntegrante=new InvFinanciamiento();
							//$modelIntegrante->codigo_proyecto =     $proyecto_financiado[$i];
							$entidad->inv_codigo_proyecto=  $proyecto_financiado[$i];
							//$modelIntegrante->codigo_proyecto =     $proyecto_financiado[$i];
							$entidad->save();

							echo ($proyecto_financiado[$i]);

						}

					}

					catch(PDOException $e)
						{
						//return 'existe un error' + $e;
						
							return Redirect::to('formulariofinanciamiento')
							->withInput($todosDatos)
							->with('mensaje_error',"Error en el servidor.");
						}
					
								return Redirect::to('formulariofinanciamiento')
								->withInput($todosDatos)
								->with('mensaje_success',"El financiamiento del proyecto ha sido creado.");
			
					}
			
			}


		/*********** carga el formulario para cargar los datos desde la tabla*/

					/*********** carga el formulario para cargar los datos desde la tabla*/

			public function cargarFormularioFinanciamiento(){

				$listaempresas = InvEntidades::all();

				$datos=  array(
					'empresas' =>$listaempresas
					);

			

			 	return View::make('administrador/formulario_financiamiento',$datos); 


			}


				public function financiamientoPorProyecto($idproyecto){
					$proyecto=InvFinanciamiento::where("inv_codigo_proyecto","=","$idproyecto")->get();

					

					for($i = 0; $i<count($proyecto) ; $i++)
					{
						$entidad = InvEntidades::find($proyecto[$i]->inv_nit_empresa);
						$proyecto[$i]->nombre_empresa = $entidad->razon_social;	

					}
					return Response::json($proyecto);
				}

				
				//funcion eliminar
				public function EliminarListaFinanciamiento($id){
			
				$form_lista_financiamiento= InvFinanciamiento::find($id); //de donde necesito

				if (is_null($form_lista_financiamiento)==false){

					//$form_lista_financiamiento->estado=0;
					//$form_lista_financiamiento->inv_codigo_proyecto.="*";
					//$form_lista_financiamiento->save();
					$form_lista_financiamiento->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));

			}//			//elimina cada tipo de la tabla .. 

	public function guardarEdicion()
	{

		$id=Input::get('id_financiamiento');

		$entidad1=Input::get('entidad-financiada');
		$modo_financiamiento=Input::get('modo-financiada');
		$valor=Input::get('valor-financiado');
		$descripcion=Input::get('descripcion-financiamiento');
		
		//manejo de fechas ..		
		$fecha_inicio=Input::get('fecha-financiamiento');


		$dateinicio = new DateTime($fecha_inicio);

		$fecha_inicio=$dateinicio->format('Y-m-d');
		//que pasa si es null? se debe validar desde el cliente .. actualmente esta colocando la fecha de hoy si esta en blanco


		$todosDatos = Input::all();


		$entidad=InvFinanciamiento::find($id);

		$numeroFinanciamientoAnterior = $entidad->id_financiacion;
		
			
		$entidad->inv_nit_empresa=$entidad1;
		$entidad->modo_financiamiento=$modo_financiamiento;
		$entidad->valor_financiado=$valor;
		$entidad->descripcion_financiamiento=$descripcion;
		$entidad->fecha=$fecha_inicio;

		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				//'max'=>'El campo no debe ser mayor a :max.',
				'numeric'=>'No es un valor valido, verifique.',

			);

			$validator=false;

			// execute la validacin 

			if($numeroFinanciamientoAnterior ==  $entidad->id_financiacion)
			{
				$validator = Validator::make(Input::all(), InvFinanciamiento::$reglasValidacionEdicion,$messages);

			}

			else{
				$validator = Validator::make(Input::all(), InvFinanciamiento::$reglasValidacion,$messages);
			}

			if ($validator->fails()) {
				$messages = $validator->messages();

				return Redirect::to('formulariofinanciamiento/edit/'.$id."/")
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			}

			else 
			{
	
				$entidad->save();

				try{

				}

				catch(PDOException $e)
				{
					return Redirect::to('formulariofinanciamiento/edit/'.$id)
					->withInput($todosDatos)
					->with('mensaje_error',"Error en el servidor.");
				}
					
				return Redirect::to('formulariofinanciamiento/edit/'.$id)
					->with('mensaje_success',"El financiamiento ha sido editado.");		
			}								
	}

	function cargarEditar($id)
	{

		$financiamiento = InvFinanciamiento::find($id);	
		$listaempresas = InvEntidades::all();


		if($financiamiento)
		{
			// esto es solo en caso de fechas .. para darle formato .. pues no lo retona diferente
			$dateinicio = new DateTime($financiamiento->fecha);
			$financiamiento->fecha=$dateinicio->format('Y-m-d');
					
		}

		$proyectofinanciados= InvProyectos::find($financiamiento->inv_codigo_proyecto);
		
		$datos=array('financiamiento' => $financiamiento,
					'accion'=>'editar',
					'empresas' =>$listaempresas,
					'proyectofinanciados' =>$proyectofinanciados);
		//print_r($datos);
		return View::make('administrador/formulario_financiamiento',$datos);
	}

}
