<?php


class ControlInvestigadores extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function CrearFormulario(){

		$c_persona=Input::get('cedula');
		$nombre_1=Input::get('nombre1');
		$nombre_2=Input::get('nombre2');
		$apellido_1=Input::get('apellido1');
		$apellido_2=Input::get('apellido2');
		$direccion1=Input::get('direccion');
		$telefono_contacto=Input::get('telefono');
		$celular_contacto=Input::get('celular');
		$email_contacto=Input::get('email');
		$foto_investigador=Input::get('foto');
		$perfil_invest=Input::get('perfil');
		$profesion_investigador=Input::get('profesion');
		$cod_conv=Input::get('codigo_conv');
		$nombre_convocatoria=Input::get('nombre_conv');
		$entida_conv=Input::get('entidad-investigadores');
		$num_contrato=Input::get('numero_contrato');
			


		//manejo de fechas ..	
		$fecha_perfil=Input::get('creacion-perfil');

		$dateperfil = new DateTime($fecha_perfil);

		$fecha_perfil=$dateperfil->format('Y-m-d');


		$fecha_inicio=Input::get('creacion_inicio');

		$dateinicio = new DateTime($fecha_inicio);

		$fecha_inicio=$dateinicio->format('Y-m-d');


		$fecha_fin=Input::get('creacion_fin');


		$datefin = new DateTime($fecha_fin);

		$fecha_fin=$datefin->format('Y-m-d');
		//actualmente esta colocando la fecha de hoy si esta en blanco

		$nombreNuevo="";
 
		$direccion = __DIR__."/../../public/archivos_db/investigadores/";

		//manejo de archivo


		$todosDatos = Input::except('foto');
	
		$persona= new Persona();

		$persona->cedula=$c_persona;
		$persona->nombre1=$nombre_1;
		$persona->nombre2=$nombre_2;
		$persona->apellido1=$apellido_1;
		$persona->apellido2=$apellido_2;
		$persona->direccion=$direccion1;
		$persona->telefono=$telefono_contacto;
		$persona->celular=$celular_contacto;
		$persona->mail=$email_contacto;
		$persona->fecha_perfil=$fecha_perfil;
		$persona->foto=$foto_investigador;

		
		$entidad=new InvInvestigadoresExternos();
		
		$entidad->cedula_persona=$c_persona;
		$entidad->profesion=$profesion_investigador;
		$entidad->codconvocatoria=$cod_conv;
		$entidad->nombreconvocatoria=$nombre_convocatoria;
		$entidad->nit=$entida_conv;
		$entidad->codperfil=$perfil_invest;
		$entidad->numerocontrato=$num_contrato;
		$entidad->fecha_inicio=$fecha_inicio;
		$entidad->fecha_fin=$fecha_fin;

		
		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'numeric'=>'No es un valor valido.',
				'unique'=>'Verifique, es posible que ya exista el investigador.'

			);


			// execute la validacin 

			$validator = Validator::make(Input::all(), InvInvestigadoresExternos::$reglasValidacion,$messages);
	
			



			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formularioinvestigadores')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {
					try
					{

						$archivo1=$this-> ArchivosInvestigadores('foto',$direccion);
						$persona->foto=$archivo1;


						$persona->save();
						$entidad->save();
					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioinvestigadores')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
						return Redirect::to('formularioinvestigadores')
								->withInput($todosDatos)
								->with('mensaje_success',"El investigador ha sido creado");

								
				}
			
			}


		/*********** carga el formulario para cargar los datos desde la tabla*/
			public function cargarFormularioInvestigadores(){

				$listaentidadinv = InvEntidades::all();				
				$listaperfiles = InvPerfiles::all();
		

				$datos=  array(
					'entidades' =>$listaentidadinv,
					'perfiles'  =>$listaperfiles); 

					
			  return View::make('administrador/formulario_investigadores',$datos); 


			}

		
			function ArchivosInvestigadores($name,$direccion)
			{
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


			public function EliminarFormularioInvestigadores($id){
			
				$formulario_investigadores=InvInvestigadoresExternos::find($id); //de donde necesito
				
				if (is_null($formulario_investigadores)==false){
					$formularioinvestigadores1=Persona::find($formulario_investigadores->cedula_persona);


					$formulario_investigadores->delete();
					$formularioinvestigadores1->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));

			}//			//elimina cada tipo de la tabla .. 	*/





	public function guardarEdicion(){

		$id=Input::get('id_investigador');

		$c_persona=Input::get('cedula');
		$nombre_1=Input::get('nombre1');
		$nombre_2=Input::get('nombre2');
		$apellido_1=Input::get('apellido1');
		$apellido_2=Input::get('apellido2');
		$direccion1=Input::get('direccion');
		$telefono_contacto=Input::get('telefono');
		$celular_contacto=Input::get('celular');
		$email_contacto=Input::get('email');
		$foto_investigador=Input::get('foto');
		$perfil_invest=Input::get('perfil');
		$profesion_investigador=Input::get('profesion');
		$cod_conv=Input::get('codigo_conv');
		$nombre_convocatoria=Input::get('nombre_conv');
		$entida_conv=Input::get('entidad-investigadores');
		$num_contrato=Input::get('numero_contrato');
			


		//manejo de fechas ..	
		$fecha_perfil=Input::get('creacion-perfil');
		$dateperfil = new DateTime($fecha_perfil);
		//echo("-$fecha_perfil-");

		$fecha_perfil=$dateperfil->format('Y-m-d');



		$fecha_inicio=Input::get('creacion_inicio');

		$dateinicio = new DateTime($fecha_inicio);

		$fecha_inicio=$dateinicio->format('Y-m-d');


		$fecha_fin=Input::get('creacion_fin');


		$datefin = new DateTime($fecha_fin);

		$fecha_fin=$datefin->format('Y-m-d');
		//actualmente esta colocando la fecha de hoy si esta en blanco

		$nombreNuevo="";
 
		$direccion = __DIR__."/../../public/archivos_db/investigadores/";

		//manejo de archivo


		$todosDatos = Input::except('foto');

		$entidad= InvInvestigadoresExternos::find($id);	
		$persona= Persona::where("cedula","=",$entidad->cedula_persona)->first();




		$numeropersonaAnterior = $persona->cedula;

		$persona->cedula=$c_persona;
		$persona->nombre1=$nombre_1;
		$persona->nombre2=$nombre_2;
		$persona->apellido1=$apellido_1;
		$persona->apellido2=$apellido_2;
		$persona->direccion=$direccion1;
		$persona->telefono=$telefono_contacto;
		$persona->celular=$celular_contacto;
		$persona->mail=$email_contacto;
		$persona->fecha_perfil=$fecha_perfil;
		$persona->foto=$foto_investigador;


	


		$entidad->cedula_persona=$c_persona;
		$entidad->profesion=$profesion_investigador;
		$entidad->codconvocatoria=$cod_conv;
		$entidad->nombreconvocatoria=$nombre_convocatoria;
		$entidad->nit=$entida_conv;
		$entidad->codperfil=$perfil_invest;
		$entidad->numerocontrato=$num_contrato;
		$entidad->fecha_inicio=$fecha_inicio;
		$entidad->fecha_fin=$fecha_fin;

		
		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'numeric'=>'No es un valor valido.',
				'unique'=>'Verifique, es posible que ya exista el investigador.'

			);


			$validator=false;

			// execute la validacin 

			if($numeropersonaAnterior ==  $entidad->codinv_ext)
			{
				$validator = Validator::make(Input::all(), InvInvestigadoresExternos::$reglasValidacionEdicion,$messages);


			}

			else{
				$validator = Validator::make(Input::all(), InvInvestigadoresExternos::$reglasValidacion,$messages);
			}
			


			if ($validator->fails()) {
				$messages = $validator->messages();

				return Redirect::to('formularioinvestigadores/edit/'.$id."/")
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			}

			else 
			{

				if(Input::get('edicion_dct-foto')=="si")
					{
						$archivoF=$this->ArchivosInvestigadores('foto',$direccion);
						$entidad->foto=$archivoF;
							
					}	
					$persona->save();
					$entidad->save();


				try{

				}

				catch(PDOException $e)
					{
						return 'existe un error' + $e;
						
						return Redirect::to('formularioinvestigadores/edit/'.$id)
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
					return Redirect::to('formularioinvestigadores/edit/'.$id)
						//->withInput($todosDatos)
						->with('mensaje_success',"El Investigador ha sido editado.");	
			}
				
	}


	function cargarEditar($id)
	{

				$investigador = InvInvestigadoresExternos::find($id);
				$personaiv = Persona::where("cedula","=",$investigador->cedula_persona)->first();	
				$listaentidadinv = InvEntidades:: all();
				$listaperfiles = InvPerfiles:: all();

				if($investigador)
				{
			
					$dateperfil = new DateTime($personaiv->fecha_perfil);
					$dateinicio = new DateTime($investigador->fecha_inicio);
					$datefin    = new DateTime($investigador->fecha_fin);

					$personaiv->fecha_perfil=$dateperfil->format('Y-m-d');
					$investigador->fecha_inicio=$dateinicio->format('Y-m-d');
					$investigador->fecha_fin=$datefin->format('Y-m-d');
					
				}

				$datos=array('investigador' => $investigador,
							 'personaiv' =>$personaiv,
							 'accion'=>'editar',
							 'entidades' =>$listaentidadinv,
							 'perfiles'  =>$listaperfiles); 

				return View::make('administrador/formulario_investigadores',$datos);
	}
	
}