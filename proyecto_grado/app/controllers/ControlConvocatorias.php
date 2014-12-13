<?php

class ControlConvocatorias extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){
echo "hola";
		$numero=Input::get('numero-conv');
		$estado=Input::get('estado');
		$titulo=Input::get('titulo-conv');
		$fecha_apertura=Input::get('fecha-apertura');
		$fecha_cierre=Input::get('fecha-cierre');
		$cuantia=Input::get('cuantia-conv');
		$descripcion=Input::get('desc-conv');
		$email=Input::get('email-conv');
		$telefono=Input::get('telefono');
		$pagina=Input::get('pag-conv');
		$archivo=Input::get('archivo-conv');
		$dirigida=Input::get('dirigida-conv');

		$todosDatos = Input::all();

	

		/*objeto del modelo*/
		$entidad=new InvConvocatorias();
		
		$entidad->numero_convocatoria=$numero;
		$entidad->estado=$estado;
		$entidad->titulo_convocatoria=$titulo;
		$entidad->fecha_apertura=$fecha_apertura;
		$entidad->fecha_cierre=$fecha_cierre;
		$entidad->cuantia=$cuantia;
		$entidad->descripcion_convocatoria=$descripcion;
		$entidad->email=$celular_entidad;
		$entidad->telefono_contacto=$telefono;
		$entidad->pagina_convocatoria=$pagina;
		$entidad->archivo_convocatoria=$archivo;
		$entidad->convocatoria_dirigida=$dirigida;
	

			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max',
				'email' =>'No es una dirección de email válida'
				'date'=>'No es un fecha valida'
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



					try{
						$entidad->save();
					}
					catch( PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioconvocatorias')
						->withInput($todosDatos)
						->with('mensaje_error',"Verifique, es posible que ya exista la entidad");
					}

						return Redirect::to('formularioconvocatorias')
								->withInput($todosDatos)
								->with('mensaje_success',"La convocatoria ".$titulo." ha sido creada con éxito");
				
					}
			}

}
