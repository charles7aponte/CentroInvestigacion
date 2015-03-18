<?php

class ControlListas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	//controlador lineas
	public function ConstruirListaLineas(){
		$listas=InvLineas::all(); //traer registros
		$paginacion=InvLineas::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		//print_r($a);
		return View::make('administrador/lista_lineas',$datos);
	}

	//controlador sublineas
	public function ConstruirListaSublineas(){
		$listas=InvSublineas::all(); //traer registros
		$paginacion=InvSublineas::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);

		return View::make('administrador/lista_sublineas',$datos);
	}

	//controlador convocatorias
	public function ConstruirListaConvocatorias(){
		$listas=InvConvocatorias::all(); //traer registros
		$paginacion=InvConvocatorias::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_convocatorias',$datos);
	}

		//controlador emoresas
	public function ConstruirListaEmpresas(){
		$listas=InvEntidades::all(); //traer registros
		$paginacion=InvEntidades::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_empresas',$datos);
	}
	

		//controlador proyectos
	public function ConstruirListaProyectos(){
		$listas=InvProyectos::all(); //traer registros
		$paginacion=InvProyectos::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_proyectos',$datos);
	}
	
			//controlador productos
	public function ConstruirListaProductos(){
		$listas=InvProductos::all(); //traer registros
		$paginacion=InvProductos::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_productos',$datos);
	}

				//controlador grupos
	public function ConstruirListaGrupos(){
	
		$paginacion=InvGrupos::paginate(3);//traer registros


		foreach ($paginacion as $key => $lista) {
			$nombre_grupo=InvUnidadesAcademicas::find($lista->inv_unidad_academica);
			$nombre_grupo = $nombre_grupo->nombre_unidad;
			$paginacion[$key]->nombre_unidad_academica=$nombre_grupo; 

		}


		
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_grupos',$datos);
	}
	
	//controlador  eventos
	public function ConstruirListaEventosNoticias(){
		$listas=InvEventosNoticias::all(); //traer registros
		$paginacion=InvEventosNoticias::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_eventos_noticias',$datos);
	}

	//controlador investigadores
	public function ConstruirListaInvestigadores(){
		$listas=InvInvestigadoresExternos::all(); //traer registros
		$paginacion=InvInvestigadoresExternos::paginate(20);
		$crear_paginacion=$paginacion->links();


		for($i = 0; $i< count($paginacion); $i++)
			{
				$paginacion[$i]->nombre_persona ="";
				$persona = Persona::where("cedula","=", $paginacion[$i]->cedula_persona)->get();
		

				if($persona && count($persona)>0)
				{
					$paginacion[$i]->nombre_persona = $persona[0]->nombre1 ." ". $persona[0]->apellido1 ." ". $persona[0]->apellido2;  
				}				
			}




		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_investigadores',$datos);
	}


	public function ActivarDesactivar($id,$estado){
			
		$form_grupo=InvGrupos::find($id); //de donde necesito

		if (is_null($form_grupo)==false ){
			if($estado==1){
			$form_grupo->estado_activacion=0;
		}
		else {
			   $form_grupo->estado_activacion=1;
			}
			$form_grupo->save();
			return Response::json(array("respuesta"=>true,
										"estado" =>	$form_grupo->estado_activacion
										));

		}
		return Response::json(array("respuesta"=>false));

	}//	
}
