<?php

class ControlEventosNoticias extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$titulo=Input::get('titulo-even-noti');
		$descripcion=Input::get('desc-even-noti');
		$tipo=Input::get('tipo-even-noti');

		//manejo de fechas ..		
		$fecha=Input::get('fecha-even-noti');

		$dateApertura = new DateTime($fecha);
		$fecha=$dateApertura->format('d/m/Y');

		$nombreNuevo="";

		$direccion = __DIR__."/../../public/archivos_db/eventosnoticias/";					

		$todosDatos = Input::except('dcto-even-noti');


		/*objeto del modelo*/
		$entidad=new invEventosNoticias();
		
		$entidad->titulo_evento=$titulo;
		$entidad->descripcion=$descripcion;
		$entidad->tipo=$tipo;
		$entidad->fecha=$fecha;
			// mensaje a mostrar


			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max',
				'unique'=>'Es posible que ya exista el evento o noticia.'
			);


			// ejecute la validacion 
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
								$nombreNuevo=$titulo."-".$archivoF->getClientOriginalName();


								while (File::exists($direccion.$nombreNuevo) )
								{
									$titulo=rand(1,999);
									$nombreNuevo=$titulo."-".$nombreNuevo;				
								
								}


								$archivoF->move($direccion,$nombreNuevo);
							}

						$entidad->enlace_documento=$nombreNuevo;
						$entidad->save();
					}

					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('eventosnoticias')
						->withInput($todosDatos)
						->with('mensaje_error',"Verifique, es posible que ya exista el evento o noticia");
					}

						return Redirect::to('formularioeventosnoticias')

								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
					}
			}
					//elimina cada tipo de la tabla .. 

			public function EliminarFormularioEventosNoticias($id){
			
				$form_eventos_noticias= invEventosNoticias::find($id); //de donde necesito

				if (is_null($form_eventos_noticias)==false){
					$form_eventos_noticias->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));
			}//	



}



