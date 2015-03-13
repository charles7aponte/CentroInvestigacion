<?php


class ControlConvocatorias extends Controller {

	public function CrearFormulario(){

		$numero=Input::get('numero-conv');
		$titulo=Input::get('titulo-conv');
		$estado=Input::get('estado');

		//manejo de fechas ..		
		$fecha_apertura=Input::get('fecha-apertura');
		$fecha_cierre=Input::get('fecha-cierre');

		$dateApertura = new DateTime($fecha_apertura);
		$dateCierre = new DateTime($fecha_cierre);

		$fecha_apertura=$dateApertura->format('Y-m-d');
		$fecha_cierre=$dateCierre->format('Y-m-d');


		$telefono=Input::get('telefono');
		$email=Input::get('email-conv');
		$pagina=Input::get('pag-conv');	
		$dirigida=Input::get('dirigida-conv');
		$descripcion=Input::get('desc-conv');	
		$cuantia=Input::get('cuantia-conv');
		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";

		$direccion = __DIR__."/../../public/archivos_db/convocatorias/";


		$todosDatos = Input::except('dcto-conv','img-conv');
	

		/*objeto del modelo*/

		$entidad=new InvConvocatorias();
		
		$entidad->numero_convocatoria=$numero;
		$entidad->estado=$estado;
		$entidad->titulo_convocatoria=$titulo;
		$entidad->fecha_apertura=$fecha_apertura;
		$entidad->fecha_cierre=$fecha_cierre;
		$entidad->cuantia=$cuantia;
		$entidad->descripcion_convocatoria=$descripcion;
		$entidad->email=$email;
		$entidad->telefono_contacto=$telefono;
		$entidad->pagina_convocatoria=$pagina;
		$entidad->convocatoria_dirigida=$dirigida;
	

			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'numeric'=>'No es un valor valido.',
				'unique'=>'Verifique, es posible que ya exista la convocatoria.'

			);

			// execute la validacin 

			$validator = Validator::make(Input::all(), InvConvocatorias::$reglasValidacion,$messages);


			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formularioconvocatorias')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {


						$archivo1=$this->ArchivosConvocatorias('dcto-conv',$direccion);//archivoshtml
							$entidad->archivo_convocatoria=$archivo1;//base

						$archivo2=$this->ArchivosConvocatorias('img-conv',$direccion);
							$entidad->archivo_imagen=$archivo2;

						$entidad->save();


					try{

					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioconvocatorias')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
						return Redirect::to('formularioconvocatorias')
								->withInput($todosDatos)
								->with('mensaje_success',"La convocatoria ha sido creada.");
			
					}
				
			}



			function ArchivosConvocatorias($name,$direccion){
				
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

		$id=Input::get('id_convacotoria');

		$numero=Input::get('numero-conv');
		$titulo=Input::get('titulo-conv');
		$estado=Input::get('estado');

		//manejo de fechas ..		
		$fecha_apertura=Input::get('fecha-apertura');
		$fecha_cierre=Input::get('fecha-cierre');

		$dateApertura = new DateTime($fecha_apertura);
		$dateCierre = new DateTime($fecha_cierre);

		$fecha_apertura=$dateApertura->format('Y-m-d');
		$fecha_cierre=$dateCierre->format('Y-m-d');
		//que pasa si es null? se debe validar desde el cliente .. actualmente esta colocando la fecha de hoy si esta en blanco


		$telefono=Input::get('telefono');
		$email=Input::get('email-conv');
		$pagina=Input::get('pag-conv');	
		$dirigida=Input::get('dirigida-conv');
		$descripcion=Input::get('desc-conv');	
		$cuantia=Input::get('cuantia-conv');
		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";

		$direccion = __DIR__."/../../public/archivos_db/convocatorias/";


		$todosDatos = Input::except('dcto-conv','img-conv');
	

		/*objeto del modelo*/

		$entidad=InvConvocatorias::find($id);

		$numeroConvocatoriaAnterior = $entidad->numero_convocatoria;

		
		$entidad->numero_convocatoria=$numero;
		$entidad->estado=$estado;
		$entidad->titulo_convocatoria=$titulo;
		$entidad->fecha_apertura=$fecha_apertura;
		$entidad->fecha_cierre=$fecha_cierre;
		$entidad->cuantia=$cuantia;
		$entidad->descripcion_convocatoria=$descripcion;
		$entidad->email=$email;
		$entidad->telefono_contacto=$telefono;
		$entidad->pagina_convocatoria=$pagina;
		$entidad->convocatoria_dirigida=$dirigida;
	

			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'numeric'=>'No es un valor valido.',
				'unique'=>'Verifique, es posible que ya exista la convocatoria.'

			);


			$validator= false;

			
			// execute la validacin 
			if($numeroConvocatoriaAnterior ==  $entidad->numero_convocatoria)
			{
				$validator = Validator::make(Input::all(), InvConvocatorias::$reglasValidacionEdicion,$messages);

			}
			else {
				$validator = Validator::make(Input::all(), InvConvocatorias::$reglasValidacion,$messages);
			}


			if ($validator->fails()) {
				$messages = $validator->messages();



				return Redirect::to('formularioconvocatorias/edit/'.$id."/")
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {


					
						if(Input::get('edicion_dct-conv')=="si")
						{
							$archivo1=$this->ArchivosConvocatorias('dcto-conv',$direccion);//archivoshtml
							$entidad->archivo_convocatoria=$archivo1;//base
							
						}

						if(Input::get('edicion_img-conv')=="si")
						{

							$archivo2=$this->ArchivosConvocatorias('img-conv',$direccion);
							$entidad->archivo_imagen=$archivo2;
						}	

						$entidad->save();


					try{

					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioconvocatorias/edit/'.$id)
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
						return Redirect::to('formularioconvocatorias/edit/'.$id)
								//->withInput($todosDatos)
								->with('mensaje_success',"La convocatoria ha sido creada.");
			
					}
				
			}




			// 
			function cargarEditar($id)
			{

				$convocatoria = InvConvocatorias::find($id);	

				$datos=array('convocatoria' => $convocatoria,
							'accion'=>'editar' );

				if($convocatoria)
				{
						// esto es solo en caso de fechas .. para darle formato .. pues no lo retona diferente
					$dateApertura = new DateTime($convocatoria->fecha_apertura);
					$dateCierre = new DateTime($convocatoria->fecha_cierre);

					$convocatoria->fecha_apertura=$dateApertura->format('Y-m-d');
					$convocatoria->fecha_cierre=$dateCierre->format('Y-m-d');
					
				}


				return View::make('administrador/formulario_convocatorias',$datos);

			}


		public function EliminarFormularioConvocatoria($id){
			
				$form_convocatoria= InvConvocatorias::find($id); //de donde necesito

				if (is_null($form_convocatoria)==false){

					$form_convocatoria->estado1=0;
					$form_convocatoria->titulo_convocatoria="*";
					$form_convocatoria->save();

					//$form_tipogrupo->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));

			}//			//elimina cada tipo de la tabla .. 


}
