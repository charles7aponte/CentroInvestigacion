<?php

class ControlListas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	//controlador slider 
	public function ConstruirListaSlider(){
		$paginacion=InvSlider::where("estado_activacion","=","1")->paginate(20);
		$crear_paginacion=$paginacion->links();
		$numeropaginacion=Input::get('page',1);

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);
		

		return View::make('administrador/lista_slider',$datos);
	}

	
	//controlador lineas
	public function ConstruirListaLineas(){
		$paginacion=InvLineas::orderBy('inv_unidad_academica')->paginate(20);
		$crear_paginacion=$paginacion->links();
		$numeropaginacion=Input::get('page',1);

			foreach ($paginacion as $key => $lista) {
			$nombre_linea=InvUnidadesAcademicas::find($lista->inv_unidad_academica);
			$nombre_linea = $nombre_linea->nombre_unidad;
			$paginacion[$key]->nombre_unidad_academica=$nombre_linea; 

		}

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);
		

		return View::make('administrador/lista_lineas',$datos);
	}

	//controlador sublineas
	public function ConstruirListaSublineas(){
		$paginacion=InvSublineas::paginate(20);
		$crear_paginacion=$paginacion->links();
		$numeropaginacion=Input::get('page',1);


		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);

		return View::make('administrador/lista_sublineas',$datos);
	}

	//controlador convocatorias 

	public function ConstruirListaConvocatorias($titulo=null){
		$paginacion=array();

		if($titulo)
		{
		$paginacion=InvConvocatorias::where("titulo_convocatoria","LIKE",'%'.$titulo.'%')->paginate(20); //traer registros	
		}
	else{
		$paginacion=InvConvocatorias::paginate(20); //traer registros
		
	}
		
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion,
			'titulo'=>$titulo);
		 return View::make('administrador/lista_convocatorias',$datos);
	}

		//controlador proyectos
	public function ConstruirListaProyectos($titulo=null){
		$paginacion=array();

		if($titulo)
		{
			$paginacion=InvProyectos::where("nombre_proyecto","LIKE",'%'.$titulo.'%')->paginate(20); //traer registros	
		}
		else{
		$paginacion=InvProyectos::paginate(20); //traer registros
		
	}
		$crear_paginacion=$paginacion->links();
		$numeropaginacion=Input::get('page',1);

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);
		
		return View::make('administrador/lista_proyectos',$datos);
	}
	
			//controlador productos
	public function ConstruirListaProductos($titulo=null){
	$paginacion=array();

		if($titulo)
		{
			$paginacion=InvProductos::where("nombre_producto","LIKE",'%'.$titulo.'%')->paginate(20); //traer registros	
		}
		else{
		$paginacion=InvProductos::paginate(20); //traer registros
		
	}
		$crear_paginacion=$paginacion->links();
		$numeropaginacion=Input::get('page',1);

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);
		
		return View::make('administrador/lista_productos',$datos);
	}

				//controlador grupos
	public function ConstruirListaGrupos(){
	
		$paginacion=InvGrupos::orderBy('inv_unidad_academica')->paginate(20);//traer registros
		$numeropaginacion=Input::get('page',1);
		foreach ($paginacion as $key => $lista) {
			$nombre_grupo=InvUnidadesAcademicas::find($lista->inv_unidad_academica);
			$nombre_grupo = $nombre_grupo->nombre_unidad;
			$paginacion[$key]->nombre_unidad_academica=$nombre_grupo; 

		}
		
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);
		
		return View::make('administrador/lista_grupos',$datos);
	}
	
	//controlador  eventos
	public function ConstruirListaEventosNoticias(){
		$listas=InvEventosNoticias::all(); //traer registros
		$paginacion=InvEventosNoticias::paginate(20);
		$crear_paginacion=$paginacion->links();
		$numeropaginacion=Input::get('page',1);

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);
		
		return View::make('administrador/lista_eventos_noticias',$datos);
	}

	//controlador investigadores
	public function ConstruirListaInvestigadores(){
	//traer registros
		$paginacion=InvInvestigadoresExternos::orderBy('cedula_persona')->paginate(20);
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

		foreach ($paginacion as $key => $lista) {
			$nombre_perfil=InvPerfiles::find($lista->codperfil);
			$nombre_perfil = $nombre_perfil->nombreperfil;
			$paginacion[$key]->nombre_perfil=$nombre_perfil; 

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

	}

	//docentes
	public function ConstruirListaProductosDocentes(){

		$paginacion=array();

		$listacedulasdocente=Docente::lists('cedula');

		$paginacion=InvProductos::whereIn("autor_producto",$listacedulasdocente)->paginate(20); //traer registros
		

		foreach ($paginacion as $key => $producto) {
			$autor= Persona::where('cedula',"=",$producto->autor_producto)->get();

			if(count($autor)>0)
			{
				$autor=$autor[0];
				$paginacion[$key]['nombre_autor']=trim($autor->nombre1." ".$autor->apellido1);


			}

			if(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Admin centro investigaciones")==0){
				$producto1=InvProductos::find($producto->codigo_producto);
				$producto1->visto='1';
				$producto1->save();
			}

		}

		$crear_paginacion=$paginacion->links();

		$numeropaginacion=Input::get('page',1);

//print_r($paginacion);
		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);
		
		return View::make('administrador/lista_productos_docentes',$datos);
	}




		public function ActivarDesactivarDocente($id,$estado){
			
		$form_producto=InvProductos::find($id); //de donde necesito

		if (is_null($form_producto)==false ){
			if($estado==1){
			$form_producto->estado_activacion=0;
		}
		else {
			   $form_producto->estado_activacion=1;
			}
			$form_producto->save();
			return Response::json(array("respuesta"=>true,
										"estado" =>	$form_producto->estado_activacion
										));

		}
		return Response::json(array("respuesta"=>false));

	}//	

}

