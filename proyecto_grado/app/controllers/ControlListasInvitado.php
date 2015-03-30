<?php

class ControlListasInvitado extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
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
		

		return View::make('invitado/lista_lineas_invitado',$datos);
	}

	//controlador convocatorias 

	public function ConstruirListaConvocatorias($titulo=null){
		$paginacion=array();
		$numeropaginacion=Input::get('page',1);

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
			'titulo'=>$titulo,
			'numeropagina' =>$numeropaginacion);
		 return View::make('invitado/lista_convocatorias_invitado',$datos);
	}



	//controlador grupos
	public function ConstruirListaGrupos(){
	
		$paginacion=InvGrupos::where("estado_activacion","=","1")->orderBy('inv_unidad_academica')->paginate(20);//traer registros
		$numeropaginacion=Input::get('page',1);
		//echo $numeropaginacion;
		foreach ($paginacion as $key => $lista) {
			$nombre_grupo=InvUnidadesAcademicas::find($lista->inv_unidad_academica);
			$nombre_grupo = $nombre_grupo->nombre_unidad;
			$paginacion[$key]->nombre_unidad_academica=$nombre_grupo; 

		}

		foreach ($paginacion as $key => $lista1) {
			$nombre_coordinador=Persona::find($lista1->director_grupo);
			$nombre_coordinador= $nombre_coordinador->nombre1." ".$nombre_coordinador->apellido1." ".$nombre_coordinador->apellido2;
			$paginacion[$key]->nombre_coordinador_grupo=$nombre_coordinador; 
		}
		
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion);
		
		return View::make('invitado/lista_grupos_invitado',$datos);
	}
	
	//controlador  eventos
	public function ConstruirListaEventosNoticias(){
		$listas_noticias=InvEventosNoticias::where("tipo","=","Noticia")->paginate(20); //traer registros
		$paginacion=InvEventosNoticias::paginate(20);
		$crear_paginacion=$paginacion->links();
		$numeropaginacion=Input::get('page',1);

		echo $listas_noticias;

		if(count($listas_noticias)>0){

			$datos= array(
			'campo_lista'=>$listas_noticias,
			'links'=>$crear_paginacion,
			'numeropagina'=>$numeropaginacion);
		
		return View::make('invitado/lista_noticias_invitado',$datos);	
		}

	}



		//$tipo puede ser "noticia", "evento"
		public function cargarListaNoticiasEventos($tipo)
		{

			if($tipo=="noticia")
			{
				//hace sus respectivas consulta y proceso q le corresponda
				return View::make('inf_personas_docentes');	//el trato de abri esta vista no existe 
			}

			if($tipo=="evento")
			{
				//hace sus respectivas consulta y proceso q le corresponda
				return View::make('inf_lista_integrantes_grupos');
			}

			return View::make('inf_personas_docentes');
		}
}
