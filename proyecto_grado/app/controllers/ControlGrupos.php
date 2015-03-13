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

		$fecha_creacion=$dateinicio->format('Y-m-d');


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

				$listatipogrupos = InvTipoGrupos::where("estado","=","1")->get();;

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

	public function guardarEdicion(){

		$id=Input::get('id_grupos');
		
		$grupo=Input::get('nombre');

		// manejo fechas..!!

		$fecha_creacion=Input::get('creacion-grupo');

		$dateinicio = new DateTime($fecha_creacion);

		$fecha_creacion=$dateinicio->format('Y-m-d');


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
			

		//manejo archivos
		$nombreNuevo="";
		$direccion = __DIR__."/../../public/archivos_db/grupos/";


		$todosDatos = Input::except('logog','afiche','img1','img2');


		$entidad=InvGrupos::find($id);

		$numeroGrupoAnterior = $entidad->codigo_grupo;
		
		
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
			

			$validator=false;
			// execute la validacin 

			if($numeroGrupoAnterior ==  $entidad->codigo_grupo)
			{
				$validator = Validator::make(Input::all(), InvGrupos::$reglasValidacionEdicion,$messages);

			}

			else{
				$validator = Validator::make(Input::all(), InvGrupos::$reglasValidacion,$messages);
			}


			if ($validator->fails()) {
				$messages = $validator->messages();

				return Redirect::to('formulariogrupos/edit/'.$id."/")
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			}

			else 
			{
	
				if(Input::get('edicion_dct-logo')=="si")
				{
					$archivo1=$this->ArchivosGrupos('logog',$direccion);//archivoshtml
					$entidad->logo_grupo=$archivo1;//base
							
				}

				if(Input::get('edicion_afiche-grupo')=="si")
				{

					$archivo2=$this->ArchivosGrupos('afiche',$direccion);
					$entidad->ruta_afiche=$archivo2;
				}	

				if(Input::get('edicion_img1-grupo')=="si")
				{

					$archivo2=$this->ArchivosGrupos('img1',$direccion);
					$entidad->imagen1=$archivo2;
				}

				if(Input::get('edicion_img2-grupo')=="si")
				{

					$archivo2=$this->ArchivosGrupos('img2',$direccion);
					$entidad->imagen2=$archivo2;
				}		

					$entidad->save();


				try{

					}

				catch(PDOException $e)
				{
					return Redirect::to('formulariogrupos/edit/'.$id)
					->withInput($todosDatos)
					->with('mensaje_error',"Error en el servidor.");
				}
					
				return Redirect::to('formulariogrupos/edit/'.$id)
					->with('mensaje_success',"El grupo ha sido editado.");		
			}			
	}





	function cargarEditar($id)
	{

		$grupos = InvGrupos::find($id);	
		$listatipogrupos = InvTipoGrupos::all();


		$nombrecor="";

		if (is_numeric($grupos->director_grupo))
	 	{

		
			$nombre_persona= Persona::find($grupos->director_grupo); 
			
			if ($nombre_persona) 
			{
				$nombre = $nombre_persona->nombre1." ".$nombre_persona->apellido1;
			}
		}

		$grupos->nombre_director=$nombrecor;

		
			if($grupos)
				{
					// esto es solo en caso de fechas .. para darle formato .. pues no lo retona diferente
					$dateinicio = new DateTime($grupos->ano_creacion);
					$grupos->ano_creacion=$dateinicio->format('Y-m-d');
					
				}	

			$integrantes=$this->listaUsuarios($id);
			$lineasintegrantes=$this->listaLineas($id);


			$datos=array('grupos' => $grupos,
					    'accion'=>'editar',
					    'tipos' =>$listatipogrupos,
					    'integrantes' =>$integrantes,
					    'lineasintegrantes' =>$lineasintegrantes);

			return View::make('administrador/formulario_grupos',$datos);
	}


	// funcion para editar los integrantes del modal de grupos a traves de consultas con la bd!!
	public function listaUsuarios($id)
	{	

		$listaPersonas=	DB::select(DB::raw("select (nombre1||''||nombre2||''||apellido1||''||apellido2)as datos_personales,p.cedula 
		from persona p,  inv_participacion_grupos ipg
		where p.cedula=ipg.cedula_persona and ipg.inv_codigo_grupo=$id"));

		return $listaPersonas;	
	}	

	// funcion para editar las lineas del modal de grupos a traves de consultas con la bd!!
	public function listaLineas($id)
	{	

		$listaPersonas=	DB::select(DB::raw("select vl.nombre_linea,vl.id_lineas 
		from inv_lineas vl ,  inv_linea_grupos ivl 
		where vl.id_lineas=ivl.inv_id_linea  and ivl.inv_codigo_grupo=$id"));

		return $listaPersonas;	
	}	

	// servicio para eliminar de el modal integrantes de los grupos.........
	public function EliminarIntegrantesGrupos($idgrupo,$idintegrante){
			
				$integrantegrupo= InvParticipacionGrupos::where("cedula_persona","=",$idintegrante)
										->where("inv_codigo_grupo","=",$idgrupo)->first(); 


				if (is_null($integrantegrupo)==false){

					$integrantegrupo->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));
	}

	// servicio para eliminar de los modales las lineas de los grupos...........
	public function EliminarlineaGrupos($idgrupo,$idlinea){   
			
				$lineagrupo= InvLineaGrupos::where("inv_id_linea","=",$idlinea)
										->where("inv_codigo_grupo","=",$idgrupo)->first(); 


				if (is_null($lineagrupo)==false){

					$lineagrupo->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));
	}

		public function EliminarFormularioGrupo($id){
			
				$form_grupo= InvGrupos::find($id); //de donde necesito

				if (is_null($form_grupo)==false){

					$form_grupo->estado=0;
					//$form_grupo->nombre_grupo.="*";
					//$form_grupo->save();

					$form_grupo->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));

			}//			//elimina cada tipo de la tabla .. 
}
