<?php

class ControlLineas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nombre=Input::get('nombre-linea');
		$coordinador=Input::get('coor-linea');
		$objetivo=Input::get('objetivo-linea');
		$objeto_estudio=Input::get('objetivo-estulinea');
		$definicion=Input::get('defi-linea');	
							

	//$archivo=Input::get('dcto-cineas');
		$nombreNuevo="";

		$direccion = __DIR__."/../../public/archivos_db/lineas/";

		//manejo de archivo

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


		$todosDatos = Input::except('dcto-conv');

		/*objeto del modelo*/
		$entidad=new InvLineas();
		
		$entidad->nombre_linea=$nombre;
		$entidad->coordinador_linea =$coordinador;
		$entidad->objetivo_linea=$objetivo;
		$entidad->objetivo_estudio =$objeto_estudio;
		$entidad->definicion_linea=$definicion;
	

			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'max'=>'No debe ser mayor a :max',
			);


			// ejecute la validacion 
			$validator = Validator::make(Input::all(), InvLineas::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();

				return Redirect::to('formulariolineas')
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
						
						return Redirect::to('formulariolineas')
						->withInput($todosDatos)
						->with('mensaje_error',"Verifique, es posible que ya exista la línea");
					}

						return Redirect::to('formulariolineas')

								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
					}
			}

}
