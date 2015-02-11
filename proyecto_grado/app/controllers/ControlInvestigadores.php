<?php


class ControlInvestigadores extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function CrearFormulario(){

		$c_persona=Input::get('cedula');
		$nombre_1=Input::get('nombre1');
		$nombre_2=Input::get('nombre2');
		$apellido_1=Input::get('apellido1');
		$apellido_2=Input::get('apellido2');
		$direccion1=Input::get('direccion');
		$telefono_contacto=Input::get('telefono');
		$celular_contacto=Input::get('celular');
		$email_contacto=Input::get('email');
		$foto_investigador=Input::get('foto');
		$perfil_invest=Input::get('"perfil');
		$profesion_investigador=Input::get('profesion');
		$cod_conv=Input::get('codigo_conv');
		$nombre_convocatoria=Input::get('nombre_conv');
		$entida_conv=Input::get('entidad-investigadores');
		$num_contrato=Input::get('numero_contrato');
			


		//manejo de fechas ..		
		$fecha_investigador=Input::get('creacion');


		$dateinvestigador = new DateTime($fecha_investigador);

		$fecha_investigador=$dateinvestigador->format('d/m/Y');
		//que pasa si es null? se debe validar desde el cliente .. actualmente esta colocando la fecha de hoy si esta en blanco

		$nombreNuevo="";
 
		$direccion = __DIR__."/../../public/archivos_db/investigadores/";

		//manejo de archivo


		$todosDatos = Input::except('foto');
	

		

		$entidad=new InvInvestigadoresExternos();
		
		$entidad->cedula_persona=$c_persona;
		$entidad->profesion=$profesion_investigador;
		$entidad->codconvocatoria=$cod_conv;
		$entidad->nombreconvocatoria=$nombre_convocatoria;
		$entidad->entidad =$entida_conv;
		$entidad->numerocontrato=$num_contrato;
		$entidad->fecha_inicio=$fecha_investigador;
		$entidad->fecha_fin=$fecha_investigador;
		
			// mensaje a mostrar segun errores o requerimientos
			$messages = array(
				'required' => 'Este campo es obligatorio.',
				'max'=>'El campo no debe ser mayor a :max.',
				'email' =>'No es una dirección de email válida.',
				'numeric'=>'No es un valor valido.',
				'unique'=>'Verifique, es posible que ya exista el producto.'

			);


			// execute la validacin 

			$validator = Validator::make(Input::all(), InvInvestigadoresExternos::$reglasValidacion,$messages);


			if ($validator->fails()) {
				$messages = $validator->messages();



				return Redirect::to('formularioinvestigadores')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar");
		} else {



					try{
					
					
						$archivo1=$this->Archivoinvestigador('foto',$direccion);
						$entidad->foto=$archivo1;

					
						$entidad->save();


						/*$listaIntegrantes=Input::get("integrantes"); // name del json del jquery
						$listagrupos=Input::get("idgrupo"); // name del json del jquery



						/*******como hago para guardar lo de la tabla grupos**************/

						/*for($i=0;$i<count($listaIntegrantes);$i++)
						{

							$modelIntegrante=new InvParticipacionProductos();
							$modelIntegrante->inv_codigo_producto=  $entidad->codigo_producto;
							$modelIntegrante->cedula_persona =     $listaIntegrantes[$i];
							$modelIntegrante->inv_codigo_grupo = $listagrupos[$i];
							$modelIntegrante->save();

						}*/
					
					}

					catch(PDOException $e)
					{
						//return 'existe un error' + $e;
						
						return Redirect::to('formularioinvestigadores')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}
					
						return Redirect::to('formularioinvestigadores')
								->withInput($todosDatos)
								->with('mensaje_success',"El investigador ha sido creado.");
			
				}
			
			}

//terminar lo que falta del controlador eliza aqui vas!!!//

		/*********** carga el formulario para cargar los datos desde la tabla*/
			public function cargarFormularioProductos(){

				$listasubprod = InvSubtipoProductos::all();
				$listagruposproducto = InvGrupos::all();
				$listaLineasproducto = InvLineas::all();
				$listaentidadproducto = InvEntidades::all();				

		

				$datos=  array(
					'subtipos' =>$listasubprod,
					'grupoproductos' =>$listagruposproducto,			
					'lineasproductos' =>$listaLineasproducto,
					'entidadproductos' =>$listaentidadproducto);

					
			  return View::make('administrador/formulario_productos',$datos); 


			}

		
			function ArchivosProductos($name,$direccion)
			{
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


			public function buscarPersonasPorNombre($name)
			{
				$name=$this->limpiarCadena($name);


				$listaPersonas=	DB::select(DB::raw("select cedula as cedulaPersona,(nombre1||' '||nombre2||' '||apellido1||' '||apellido2) as datospersonales,codigo_grupo as codigogrupo,nombre_grupo as nombregrupo
					from persona a,inv_grupos b,inv_participacion_grupos as c
					where 
						a.cedula=c.cedula_persona and b.codigo_grupo=c.inv_codigo_grupo
						and ((nombre1||' '||nombre2||' '||apellido1||' '||apellido2) like '%$name%'
						  OR (cedula||'') like '%$name%' )"));  /*esta es la consulta que busca las concidencias con la BD*/
				return Response::json($listaPersonas);
	
			}



			public  function limpiarCadena($valor)
			{
				$valor = str_ireplace("SELECT","",$valor);
				$valor = str_ireplace("COPY","",$valor);
				$valor = str_ireplace("DELETE","",$valor);
				$valor = str_ireplace("DROP","",$valor);
				$valor = str_ireplace("DUMP","",$valor);
				$valor = str_ireplace(" OR ","",$valor);
				$valor = str_ireplace("%","",$valor);
				$valor = str_ireplace("LIKE","",$valor);
				$valor = str_ireplace("--","",$valor);
				$valor = str_ireplace("^","",$valor);
				$valor = str_ireplace("[","",$valor);
				$valor = str_ireplace("]","",$valor);
				$valor = str_ireplace("\\","",$valor);
				$valor = str_ireplace("!","",$valor);
				$valor = str_ireplace("¡","",$valor);
				$valor = str_ireplace("?","",$valor);
				$valor = str_ireplace("=","",$valor);
				$valor = str_ireplace("&","",$valor);
				$valor = str_ireplace("'","\\'",$valor);
				$valor = str_ireplace("\"","\\\"",$valor);
				return $valor;
			}	
	
}