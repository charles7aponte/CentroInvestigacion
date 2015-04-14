<?php


class ControlProyectos extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function CrearFormulario(){

		$nombre_proyecto=Input::get('nombre-proyecto');
		$estado_proyecto=Input::get('estado-proy');
		
		//manejo de fechas ..		
		$fecha_inicio=Input::get('creacion_proyecto');
		$fecha_fin=Input::get('fecha-finproyecto');


		$dateinicio = new DateTime($fecha_inicio);
		$datefin= new DateTime($fecha_fin);

		$fecha_inicio=$dateinicio->format('Y-m-d');
		$fecha_fin=$datefin->format('Y-m-d');
		


		$conv_proyecto=Input::get('convocatoria-proyecto');
		$linea_proyecto=Input::get('linea-proyecto');
		$grupo1_proyecto=Input::get('grupo1-proyecto');	
		$grupo2_proyecto=Input::get('grupo2-proyecto');
		$objetivo_proyecto=Input::get('obj-proyecto');	
		$actainicio=Input::get('actaini-proyectos');
		$propuesta_proyecto=Input::get('propuesta-proyecto');
		$informe_proyecto=Input::get('informe-proyecto');
		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";
 
		$direccion = __DIR__."/../../public/archivos_db/proyectos/";

		//manejo de archivo


		$todosDatos = Input::except('actaini-proyectos','propuesta-proyecto','informe-proyecto');
	

		

		$entidad=new InvProyectos();
		
		$entidad->nombre_proyecto=$nombre_proyecto;
		$entidad->estado_proyecto=$estado_proyecto;
		$entidad->fecha_proyecto=$fecha_inicio;
		$entidad->fecha_finproyecto=$fecha_fin;
		$entidad->inv_numero_convocatoria=$conv_proyecto;
		$entidad->inv_id_linea=$linea_proyecto;
		$entidad->inv_codigo_grupo=$grupo1_proyecto;
		$entidad->grupo_auxiliar=$grupo2_proyecto;
		$entidad->objetivo_general=$objetivo_proyecto;
		$entidad->archivo_actainicio=$actainicio;
		$entidad->archivo_propuesta=$propuesta_proyecto;
		$entidad->informe_final=$informe_proyecto;

		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'numeric'=>'No es un valor valido.',
				'unique'=>'Verifique, es posible que ya exista el proyecto.'

			);


			// execute la validacin 

			$validator = Validator::make(Input::all(), InvProyectos::$reglasValidacion,$messages);


			if ($validator->fails()) {
				$messages = $validator->messages();



				return Redirect::to('formularioproyectos')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {

			

			
					try
					{
						$archivo1=$this->ArchivosProyectos('actaini-proyectos',$direccion);//archivoshtml
						$entidad->archivo_actainicio=$archivo1;//base

						$archivo2=$this->ArchivosProyectos('propuesta-proyecto',$direccion);
						$entidad->archivo_propuesta=$archivo2;

						$archivo3=$this->ArchivosProyectos('informe-proyecto',$direccion);
						$entidad->informe_final=$archivo3;

						$entidad->save();

						$listaIntegrantes=Input::get("integrantes"); // name del json del jquery
						$listatiempos=Input::get("tiempo");
						$listatipoinvestigador=Input::get("tipoinvestigador");


						for($i=0;$i<count($listaIntegrantes);$i++)
						{
 
							$modelIntegrante=new InvParticipacionProyectos();
							$modelIntegrante->inv_codigo_proyecto=  $entidad->codigo_proyecto;
							$modelIntegrante->cedula_persona =     $listaIntegrantes[$i];
							$modelIntegrante->dedicacion_tiempo = $listatiempos[$i];
							$modelIntegrante->tipo_investigador = $listatipoinvestigador[$i];

							echo ($listaIntegrantes[$i]);
							$modelIntegrante->save();

						}
					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioproyectos')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
						return Redirect::to('formularioproyectos')
								->withInput($todosDatos)
								->with('mensaje_success',"El proyecto ha sido creado.");	
			}

		}


		/*********** carga el formulario para cargar los datos desde la tabla*/

			public function cargarFormularioProyectos(){

				$listaConvocatorias = InvConvocatorias::where('estado1','=','1')->get();
				$listaLineas = InvLineas::where('estado','=','1')->get();
				$listaGrupos = InvGrupos::where('estado_activacion','=','1')->get();
				$listaGrupos1 = InvGrupos::all();


				$datos=  array(
					'convocatorias' =>$listaConvocatorias,
					'lineas' =>$listaLineas,
					'grupos' =>$listaGrupos,
					'grupos1' =>$listaGrupos1);

			//	print_r($datos);

			 return View::make('administrador/formulario_proyectos',$datos); 
			}


			function ArchivosProyectos($name,$direccion){
				
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

		public function buscarProyectoPorNombre($proyecto){
			$proyectos1=InvProyectos::where("nombre_proyecto","LIKE","%$proyecto%")->get();

			return Response::json($proyectos1);
		}






	public function guardarEdicion(){  

		$id=Input::get('id_proyecto');

		$nombre_proyecto=Input::get('nombre-proyecto');
		$estado_proyecto=Input::get('estado-proy');
		
		//manejo de fechas ..		
		$fecha_inicio=Input::get('creacion_proyecto');


		$dateinicio = new DateTime($fecha_inicio);

		$fecha_inicio=$dateinicio->format('Y-m-d');
		
		$conv_proyecto=Input::get('convocatoria-proyecto');
		$linea_proyecto=Input::get('linea-proyecto');
		$grupo1_proyecto=Input::get('grupo1-proyecto');	
		$grupo2_proyecto=Input::get('grupo2-proyecto');
		$objetivo_proyecto=Input::get('obj-proyecto');	
		$actainicio=Input::get('actaini-proyectos');
		$propuesta_proyecto=Input::get('propuesta-proyecto');
		$informe_proyecto=Input::get('informe-proyecto');
		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";
 
		$direccion = __DIR__."/../../public/archivos_db/proyectos/";

		//manejo de archivo


		$todosDatos = Input::except('actaini-proyectos','propuesta-proyecto','informe-proyecto');
	


		$entidad=InvProyectos::find($id);

		$numeroProyectoAnterior = $entidad->codigo_proyecto;

		
		$entidad->nombre_proyecto=$nombre_proyecto;
		$entidad->estado_proyecto=$estado_proyecto;
		$entidad->fecha_proyecto=$fecha_inicio;
		$entidad->inv_numero_convocatoria=$conv_proyecto;
		$entidad->inv_id_linea=$linea_proyecto;
		$entidad->inv_codigo_grupo=$grupo1_proyecto;
		$entidad->grupo_auxiliar=$grupo2_proyecto;
		$entidad->objetivo_general=$objetivo_proyecto;
		$entidad->archivo_actainicio=$actainicio;
		$entidad->archivo_propuesta=$propuesta_proyecto;
		$entidad->informe_final=$informe_proyecto;

		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'numeric'=>'No es un valor valido.',
				'unique'=>'Verifique, es posible que ya exista el proyecto.'

			);

			$validator=false;


			// execute la validacin 

			if($numeroProyectoAnterior ==  $entidad->codigo_proyecto)
			{
				$validator = Validator::make(Input::all(), InvProyectos::$reglasValidacionEdicion,$messages);

			}

			else{
				$validator = Validator::make(Input::all(), InvProyectos::$reglasValidacion,$messages);
			}

			if ($validator->fails()) {
				$messages = $validator->messages();

				return Redirect::to('formularioproyectos/edit/'.$id."/")
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			}

			else 
			{

	
				if(Input::get('edicion_dct-archacta')=="si")
				{
					$archivo1=$this->ArchivosProyectos('actaini-proyectos',$direccion);
					$entidad->archivo_actainicio=$archivo1;					
				}

				if(Input::get('edicion_propuesta-proyecto')=="si")
				{
					$archivo2=$this->ArchivosProyectos('propuesta-proyecto',$direccion);
					$entidad->archivo_propuesta=$archivo2;
					
				}	

				if(Input::get('edicion_informe-proyecto')=="si")
				{

					$archivo3=$this->ArchivosProyectos('informe-proyecto',$direccion);
					$entidad->informe_final=$archivo3;
				}	

					$entidad->save();

						//InvParticipacionProyectos::where("inv_codigo_proyecto","=", $entidad->codigo_proyecto);

						$listaIntegrantes=Input::get("integrantes"); // name del json del jquery
						$listatiempos=Input::get("tiempo");
						$listatipoinvestigador=Input::get("tipoinvestigador");


						for($i=0;$i<count($listaIntegrantes);$i++)
						{

							$modelIntegrante=new InvParticipacionProyectos();
							$modelIntegrante->inv_codigo_proyecto=  $entidad->codigo_proyecto;
							$modelIntegrante->cedula_persona =     $listaIntegrantes[$i];
							$modelIntegrante->dedicacion_tiempo = $listatiempos[$i];
							$modelIntegrante->tipo_investigador = $listatipoinvestigador[$i];

							echo ($listaIntegrantes[$i]);
							$modelIntegrante->save();
						}


				try{

					}

				catch(PDOException $e)
				{
					return Redirect::to('formularioproyectos/edit/'.$id)
					->withInput($todosDatos)
					->with('mensaje_error',"Error en el servidor.");
				}
					
				return Redirect::to('formularioproyectos/edit/'.$id)
					->with('mensaje_success',"El proyecto ha sido editado.");		
			}			
	}	

	function cargarEditar($id)
	{

		$proyectos = InvProyectos::find($id);	
		$listaConvocatorias = InvConvocatorias::where('estado1','=','1')->get();
		$listaLineas = InvLineas::where('estado','=','1')->get();
		$listaGrupos = InvGrupos::where('estado_activacion','=','1')->get();
		$listaGrupos1 = InvGrupos::all();

		
		if($proyectos)
		{
			// esto es solo en caso de fechas .. para darle formato .. pues no lo retona diferente
			$dateinicio = new DateTime($proyectos->fecha_proyecto);
			$proyectos->fecha_proyecto=$dateinicio->format('Y-m-d');
					
		}	

			$integrantesproyecto=$this->listaUsuariosProyectos($id); 
			


			$datos=array('proyectos' => $proyectos,
					    'accion'=>'editar',
					    'convocatorias' =>$listaConvocatorias,
					    'lineas' =>$listaLineas,
					    'grupos' =>$listaGrupos,
					    'grupos1' =>$listaGrupos1,
					    'integrantesproyecto' =>$integrantesproyecto); 


			return View::make('administrador/formulario_proyectos',$datos);
	}

	// servicio del modal de integrantes de proyectos para guardar en la bd..............

	public function listaUsuariosProyectos($id)  
	{	

		$listaPersonas=	DB::select(DB::raw("select (nombre1||''||nombre2||''||apellido1||''||apellido2)as datos_personales,p.cedula,ivp.tipo_investigador,ivp.dedicacion_tiempo
		from persona p,inv_participacion_proyectos ivp
		where p.cedula=ivp.cedula_persona and ivp.inv_codigo_proyecto=$id"));

		return $listaPersonas;	
	}	

	// servicio para eliminar de el modal integrantes de los proyectos.........
	public function EliminarIntegrantesProyectos($idproyecto,$idintegrante){
			
				$integranteproyecto= InvParticipacionProyectos::where("cedula_persona","=",$idintegrante)
										->where("inv_codigo_proyecto","=",$idproyecto)->first(); 

										

				if (is_null($integranteproyecto)==false){

					$integranteproyecto->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));
	}

	public function EliminarFormularioProyecto($id){
	
		$form_proyecto=InvProyectos::find($id); //de donde necesito

		if (is_null($form_proyecto)==false){

			$form_proyecto->delete();

			return Response::json(array("respuesta"=>true));

		}
		return Response::json(array("respuesta"=>false));

	}//			//elimina cada tipo de la tabla .. 	
}