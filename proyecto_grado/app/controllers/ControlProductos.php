<?php


class ControlProductos extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function CrearFormulario(){

		$nombre_producto=Input::get('titulo-producto');
		
		
		//manejo de fechas ..		
		$fecha_producto=Input::get('creacion-producto');


		$dateproducto = new DateTime($fecha_producto);

		$fecha_producto=$dateproducto->format('d/m/Y');
		//que pasa si es null? se debe validar desde el cliente .. actualmente esta colocando la fecha de hoy si esta en blanco


		$subtipo_producto=Input::get('subtipo-proy');
		$grupo_producto=Input::get('grupo-proy');
		$linea_producto=Input::get('linea-proy');	
		$entidad_producto=Input::get('entidad-prod');
		$reconocimiento_producto=Input::get('reconocimiento-prod');	
		$descrip_producto=Input::get('desc-conv');
		$foto_producto=Input::get('foto-producto');
		$soporte_producto=Input::get('soporte-producto');
		$sop_tipoproducto=Input::get('tipo-soporte-producto');
		$obs_producto=Input::get('obs-soporte');
		//$archivo=Input::get('dcto-conv');
		$nombreNuevo="";
 
		$direccion = __DIR__."/../../public/archivos_db/productos/";

		//manejo de archivo


		$todosDatos = Input::except('foto-producto','soporte-producto','tipo-soporte-producto');
	

		

		$entidad=new InvProductos();
		
		$entidad->nombre_producto=$nombre_producto;
		$entidad->fecha_producto=$fecha_producto;
		$entidad->inv_subtipo_producto=$subtipo_producto;
		$entidad->inv_codigo_grupo=$grupo_producto;
		$entidad->inv_id_linea=$linea_producto;
		$entidad->entidad=$entidad_producto;
		$entidad->reconocimiento_producto=$reconocimiento_producto;
		$entidad->observaciones_producto=$descrip_producto;
		$entidad->foto_producto=$foto_producto;
		$entidad->soporte_producto=$soporte_producto;
		$entidad->tipo_soporte=$sop_tipoproducto;
		$entidad->observaciones_soporte=$obs_producto;
		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'numeric'=>'No es un valor valido.',
				'unique'=>'Verifique, es posible que ya exista la convocatoria.'

			);


			// execute la validacin 

			$validator = Validator::make(Input::all(), InvProductos::$reglasValidacion,$messages);


			if ($validator->fails()) {
				$messages = $validator->messages();



				return Redirect::to('formularioproductos')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {

					$archivo1=$this->ArchivosProductos('foto-producto',$direccion);
						$entidad->foto_producto=$archivo1;

					$archivo2=$this->ArchivosProductos('soporte-producto',$direccion);
						$entidad->soporte_producto=$archivo2;

					$archivo3=$this->ArchivosProductos('tipo-soporte-producto',$direccion);
						$entidad->tipo_soporte=$archivo3;

						$entidad->save();
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
					
			*/			return Redirect::to('formularioproductos')
								->withInput($todosDatos)
								->with('mensaje_success',"El producto ha sido creado.");
			
					}
			
			}





		/*********** carga el formulario para cargar los datos desde la tabla*/
			public function cargarFormularioProductos(){

				$listasubprod = InvSubtipoProductos::all();
				$listagruposproducto = InvGrupos::all();
				$listaLineasproducto = InvLineas::all();
			


				$datos=  array(
					'subtipos' =>$listasubprod,
					'grupoproductos' =>$listagruposproducto,
					'lineasproductos' =>$listaLineasproducto);
					
			  return View::make('administrador/formulario_productos',$datos); 


			}




		
			function ArchivosProductos($name,$direccion){
				
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

	
}