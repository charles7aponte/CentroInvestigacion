<?php

class ControlGrupos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$numero=Input::get('nombre');
		$coord=Input::get('coord');
		$email=Input::get('email');

		$pagina=Input::get('pagina');
		$telefono=Input::get('telefono');
		$direccion=Input::get('direccion');
		
		$fecha_creacion=Input::get('fecha_creacion');
		$unidad=Input::get('unidad');
		$categoria=Input::get('categoria');
		$tipo=Input::get('tipo');

		$integrantes =Input::get('integrantes');


print_r(Input::all());
		


/*



		//manejo de fechas ..		
		$fecha_apertura=Input::get('fecha-apertura');
		$fecha_cierre=Input::get('fecha-cierre');

		$dateApertura = new DateTime($fecha_apertura);
		$dateCierre = new DateTime($fecha_cierre);

		$fecha_apertura=$dateApertura->format('d/m/Y');
		$fecha_cierre=$dateCierre->format('d/m/Y');
		//que pasa si es null? se debe validar desde el cliente .. actualmente esta colocando la fecha de hoy si esta en blanco


		$telefono=Input::get('telefono');
		$email=Input::get('email-conv');
		$pagina=Input::get('pag-conv');	
		$dirigida=Input::get('dirigida-conv');
		$descripcion=Input::get('desc-conv');	
		$cuantia=Input::get('cuantia-conv');
		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";

		//manejo de archivo
		///
		if(Input::hasFile('dcto-conv'))
		{
			$archivoF =Input::file('dcto-conv');
			$nombreNuevo=$numero."-".$archivoF->getClientOriginalName();

			while (File::exists("img_db/".$nombreNuevo) )
			{
				$numero=rand(1,999);
				$nombreNuevo=$numero."-".$nombreNuevo;				
			
			}

			$archivoF->move("img_db",$nombreNuevo);

			//echo "-->".$archivoF ->getClientOriginalName();
		}



		$todosDatos = Input::all();

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
	

			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max',
				'email' =>'No es una dirección de email válida'
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



			//		try{
						$entidad->save();
					}
					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioconvocatorias')
						->withInput($todosDatos)
						->with('mensaje_error',"Verifique, es posible que ya exista la convocatoria");
					}
					
						return Redirect::to('formularioconvocatorias')
								->withInput($todosDatos)
								->with('mensaje_success',"La convocatoria ha sido creada.");
			
					}
			*/	
			}



			/**********
			* caraga el formulario para crear un nuevo grupo
			*/
			public function cargarFormularioNuevoGrupo(){

				$listaTiposGrupos = InvTipoGrupos::all();

				$datos=  array(
					'tipo_grupos' =>$listaTiposGrupos );

			  return View::make('administrador/formulario_grupos',$datos); 


			}//




}
