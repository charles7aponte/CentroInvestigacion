<?php


class ControlSlider extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function CrearFormulario(){


		$descripcion=Input::get('desc-slider');


		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";

		$direccion = __DIR__."/../../public/archivos_db/slider/";


		$todosDatos = Input::except('ruta-imagen');
	
		echo $descripcion;
		/*objeto del modelo*/

		$entidad=new invSlider();
		
		$entidad->descripcion=$descripcion;


			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
			);


			// execute la validacin 

			$validator = Validator::make(Input::all(), invSlider::$reglasValidacion,$messages);


			if ($validator->fails()) {
				$messages = $validator->messages();



				return Redirect::to('formularioslider')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {
					try
					{
						//manejo de archivo
						if(Input::hasFile('ruta-imagen'))
						{

							$archivoF =Input::file('ruta-imagen');
							$nombreNuevo=$archivoF->getClientOriginalName();


							while (File::exists($direccion.$nombreNuevo) )
							{
								$nombre=rand(1,999);
								$nombreNuevo=$nombre."-".$nombreNuevo;				
							
							}


							$archivoF->move($direccion,$nombreNuevo);
											


						}

						$entidad->ruta_imagen =$nombreNuevo;

						if(count(InvSlider::where("estado_activacion","=","1")->get())<7)
						$entidad->save();
						else 
						return Redirect::to('formularioslider')
						->withInput($todosDatos)
						->with('mensaje_error',"Por favor elimine alguna imagen, maximo de fotos.");

					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioslider')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
						return Redirect::to('formularioslider')
								->withInput($todosDatos)
								->with('mensaje_success',"Agregada con exito");
			
					
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

	//crear y cargar en la tabla .. funcionando
	public function cargarFormularioSlider(){

		return View::make('administrador/formulario_slider'); 

	}//

	public function EliminarFormularioSlider($id){
	
		$form_slider= InvSlider::find($id); //de donde necesito

		if (is_null($form_slider)==false){

			$form_slider->delete();

			return Response::json(array("respuesta"=>true));

		}
		return Response::json(array("respuesta"=>false));

	}


}
