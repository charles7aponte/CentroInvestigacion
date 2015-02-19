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

}
