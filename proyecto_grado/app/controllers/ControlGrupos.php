<?php

class ControlGrupos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$grupo=Input::get('nombre');

		$fecha_creacion=Input::get('creacion-grupo');

		$dateinicio = new DateTime($fecha_creacion);

		$fecha_creacion=$dateinicio->format('d/m/Y');


		$coord=Input::get('cedula-persona');
		$email=Input::get('email');
		$pagina=Input::get('pagina');
		$telefono=Input::get('telefono');
		$direccion1=Input::get('direccion');
		$unidad=Input::get('unidad');
		$categoria=Input::get('categoria');
		$tipo=Input::get('tipo');
		$objetivos=Input::get('objetivos');
		$gruplac=Input::get('gruplac');
			

		//manejo archuvos
		$nombreNuevo="";
		$direccion = __DIR__."/../../public/archivos_db/grupos/";


		$todosDatos = Input::except('logog','afiche','img1','img2');
		

		$entidad=new InvGrupos();
		
		$entidad->nombre_grupo=$grupo;
		$entidad->director_grupo=$coord;
		$entidad->email=$email;
		$entidad->pagina_web=$pagina;
		$entidad->telefono=$telefono;
		$entidad->direccion_grupo=$direccion1;
		$entidad->objetivos=$objetivos;
		$entidad->unidad_academica=$unidad;
		$entidad->categoria=$categoria;
		$entidad->inv_tipo_grupos=$tipo;
		$entidad->link_gruplac=$gruplac;
		$entidad->ano_creacion=$fecha_creacion;



			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'unique'=>'Verifique, es posible que ya exista el grupo.'

			);
						// execute la validacin 

			$validator = Validator::make(Input::all(), InvGrupos::$reglasValidacion,$messages);


			if ($validator->fails()) {
				$messages = $validator->messages();



				return Redirect::to('formulariogrupos')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {

						$archivo1=$this->ArchivosGrupos('logog',$direccion);//archivoshtml
							$entidad->logo_grupo=$archivo1;//base

						$archivo2=$this->ArchivosGrupos('afiche',$direccion);
							$entidad->ruta_afiche=$archivo2;

						$archivo3=$this->ArchivosGrupos('img1',$direccion);
							$entidad->imagen1=$archivo3;

						$archivo4=$this->ArchivosGrupos('img2',$direccion);
							$entidad->imagen2=$archivo4;	

						$entidad->save();

						$listaIntegrantes=Input::get("integrantes"); // name del json del jquery
						$listaLineas=Input::get("lineas"); // name del json del jquery


						for($i=0;$i<count($listaIntegrantes);$i++)
						{

							$modelIntegrante=new InvParticipacionGrupos();
							$modelIntegrante->inv_codigo_grupo =  $entidad->codigo_grupo;
							$modelIntegrante->cedula_persona =     $listaIntegrantes[$i];
							$modelIntegrante->save();

						}


						for($i=0;$i<count($listaLineas);$i++)
						{

							$modelLinea=new InvParticipacionGruposLineas();
							$modelLinea->inv_codigo_grupo =  $entidad->codigo_grupo; //donde estoy .. donde apunto
							$modelLinea->inv_id_linea =     $listaLineas[$i];
							$modelLinea->save();

						}
			

			
					try{


					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formulariogrupos')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
						return Redirect::to('formulariogrupos')
								->withInput($todosDatos)
								->with('mensaje_success',"El grupo ha sido creado.");
			
					}
			
			}

					/*********** carga el formulario para cargar los datos desde la tabla*/

			public function cargarFormularioGrupo(){

				$listatipogrupos = InvTipoGrupos::all();

				$datos=  array(
					'tipos' =>$listatipogrupos);

			 	return View::make('administrador/formulario_grupos',$datos); 


			}//



			function ArchivosGrupos($name,$direccion){
				
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
