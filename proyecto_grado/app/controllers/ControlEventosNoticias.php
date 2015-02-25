<?php


class ControlEventosNoticias extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function CrearFormulario(){

		$nombre="";

		$titulo=Input::get('titulo-even-noti');
		$descripcion=Input::get('desc-even-noti');
		$tipo=Input::get('tipo-even-noti');

		//manejo de fechas ..		
		$fecha=Input::get('fecha-even-noti');

		$dateApertura = new DateTime($fecha);
		$fecha=$dateApertura->format('d/m/Y');



		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";

		$direccion = __DIR__."/../../public/archivos_db/eventosnoticias/";


		$todosDatos = Input::except('dcto-even-noti');
	

		/*objeto del modelo*/

		$entidad=new invEventosNoticias();
		
		$entidad->titulo_evento=$titulo;
		$entidad->descripcion=$descripcion;
		$entidad->tipo=$tipo;
		$entidad->fecha=$fecha;



			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'unique'=>'Es posible que ya exista el evento o la noticia'

			);


			// execute la validacin 

			$validator = Validator::make(Input::all(), invEventosNoticias::$reglasValidacion,$messages);


			if ($validator->fails()) {
				$messages = $validator->messages();



				return Redirect::to('formularioeventosnoticias')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {
					try{
						//manejo de archivo
						if(Input::hasFile('dcto-even-noti'))
						{

							$archivoF =Input::file('dcto-even-noti');
							$nombreNuevo=$nombre."-".$archivoF->getClientOriginalName();


							while (File::exists($direccion.$nombreNuevo) )
							{
								$nombre=rand(1,999);
								$nombreNuevo=$nombre."-".$nombreNuevo;				
							
							}


							$archivoF->move($direccion,$nombreNuevo);
						}

						$entidad->enlace_documento=$nombreNuevo;
						$entidad->save();

					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioeventosnoticias')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
						return Redirect::to('formularioeventosnoticias')
								->withInput($todosDatos)
								->with('mensaje_success',"El evento/noticia ya fue creado.");
			
					}
				
			}

	public function guardarEdicion(){

		$id=Input::get('id_evento_noticia');

		$titulo=Input::get('titulo-even-noti');
		$descripcion=Input::get('desc-even-noti');
		$tipo=Input::get('tipo-even-noti');

		//manejo de fechas ..		
		$fecha=Input::get('fecha-even-noti');

		$dateApertura = new DateTime($fecha);
		$fecha=$dateApertura->format('d/m/Y');



		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";

		$direccion = __DIR__."/../../public/archivos_db/eventosnoticias/";


		$todosDatos = Input::except('dcto-even-noti');
	

		/*objeto del modelo*/

		$entidad=invEventosNoticias::find($id);

		$numeroEventoAnterior = $entidad->id_evento;
		
		$entidad->titulo_evento=$titulo;
		$entidad->descripcion=$descripcion;
		$entidad->tipo=$tipo;
		$entidad->fecha=$fecha;



			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'unique'=>'Es posible que ya exista el evento o la noticia'

			);

			$validator= false;

			// ejecute la validacion 

			if($numeroEventoAnterior ==  $entidad->id_evento)
			{
				$validator = Validator::make(Input::all(), invEventosNoticias::$reglasValidacionEdicion,$messages);

			}

			else{
				$validator = Validator::make(Input::all(), invEventosNoticias::$reglasValidacion,$messages);
			}


			if ($validator->fails()) {
				
				$messages = $validator->messages();

				return Redirect::to('formularioeventosnoticias/edit/'.$id."/")
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
			}

			else {

				if(Input::get('edicion_dct-evento')=="si")
					{
						$archivoF=$this->guardarArchivos('dcto-even-noti',$direccion);
						$entidad->enlace_documento=$archivoF;
							
					}	
		
					$entidad->save();

				try{

				}

				catch(PDOException $e)
					{
						return 'existe un error' + $e;
						
						return Redirect::to('formularioeventosnoticias/edit/'.$id)
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
					return Redirect::to('formularioeventosnoticias/edit/'.$id)
						//->withInput($todosDatos)
						->with('mensaje_success',"El evento ha sido editada.");	
			}

	}

	function guardarArchivos($name,$direccion){
				
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

	function cargarEditar($id){


				$evento = invEventosNoticias::find($id);	

				$datos=array('evento' => $evento,
							'accion'=>'editar' );

				if($evento)
				{
			
					$dateApertura = new DateTime($evento->fecha);

					$evento->fecha=$dateApertura->format('d/m/Y');
					
				}


				return View::make('administrador/formulario_eventos_noticias',$datos);

			}

}
