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
 
		$direccion = __DIR__."/../../public/img_db/convocatoria/";

		//manejo de archivo


		$todosDatos = Input::except('dcto-conv');
	

		/*

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
		$entidad->archivo_convocatoria=$nombreNuevo;
		$entidad->convocatoria_dirigida=$dirigida;
		*/

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



				return Redirect::to('formularioproyectos')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {


			/*
					try{
						$entidad->save();
					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioconvocatorias')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
			*/			return Redirect::to('formularioproyectos')
								->withInput($todosDatos)
								->with('mensaje_success',"La convocatoria ha sido creada.");
			
					}
			
			}



			function ArchivosProyectos(){
				if(Input::hasFile('dcto-conv'))
					{

						$archivoF =Input::file('dcto-conv');
						$nombreNuevo=$numero."-".$archivoF->getClientOriginalName();


					while (File::exists($direccion.$nombreNuevo) )
					{
						$numero=rand(1,999);
						$nombreNuevo=$numero."-".$nombreNuevo;				
			
					}


					$archivoF->move($direccion,$nombreNuevo);
				}
			
			}

	
}