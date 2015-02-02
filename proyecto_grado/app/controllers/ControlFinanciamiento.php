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


		$dateinicio = new DateTime($fecha_inicio);

		$fecha_inicio=$dateinicio->format('d/m/Y');
		//que pasa si es null? se debe validar desde el cliente .. actualmente esta colocando la fecha de hoy si esta en blanco


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
		$entidad->inv_numero_convocatoria=$conv_proyecto;
		$entidad->inv_id_sublinea=$linea_proyecto;
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

			

			
					try{
						$archivo1=$this->ArchivosProyectos('actaini-proyectos',$direccion);//archivoshtml
						$entidad->archivo_actainicio=$archivo1;//base

					$archivo2=$this->ArchivosProyectos('propuesta-proyecto',$direccion);
						$entidad->archivo_propuesta=$archivo2;

					$archivo3=$this->ArchivosProyectos('informe-proyecto',$direccion);
						$entidad->informe_final=$archivo3;

						$entidad->save();

						$listaIntegrantes=Input::get("integrantes"); // name del json del jquery
						$listatiempos=Input::get("tiempo");


						for($i=0;$i<count($listaIntegrantes);$i++)
						{

							$modelIntegrante=new InvParticipacionProyectos();
							$modelIntegrante->inv_codigo_proyecto=  $entidad->codigo_proyecto;
							$modelIntegrante->cedula_persona =     $listaIntegrantes[$i];
							$modelIntegrante->dedicacion_tiempo = $listatiempos[$i];
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

				$listaConvocatorias = InvConvocatorias::all();
				$listaLineas = InvLineas::all();
				$listaGrupos = InvGrupos::all();
				$listaGrupos1 = InvGrupos::all();


				$datos=  array(
					'convocatorias' =>$listaConvocatorias,
					'lineas' =>$listaLineas,
					'grupos' =>$listaGrupos,
					'grupos1' =>$listaGrupos1 );

			  return View::make('administrador/formulario_proyectos',$datos); 


			}//





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

	
}