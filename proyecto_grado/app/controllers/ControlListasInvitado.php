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
		$unidades_academicas=InvUnidadesAcademicas::all();

			foreach ($paginacion as $key => $lista) {
			$nombre_linea=InvUnidadesAcademicas::find($lista->inv_unidad_academica);
			$nombre_linea = $nombre_linea->nombre_unidad;
			$paginacion[$key]->nombre_unidad_academica=$nombre_linea; 

		}

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'numeropagina' =>$numeropaginacion,
			'lista_unidades'=>$unidades_academicas);
		

		return View::make('invitado/lista_lineas_invitado',$datos);
	}

	//controlador convocatorias 

	public function ConstruirListaConvocatorias($titulo=null){
		$paginacion=array();
		$numeropaginacion=Input::get('page',1);
		$unidades_academicas=InvUnidadesAcademicas::all();

		if($titulo)
		{
			$paginacion=InvConvocatorias::where("titulo_convocatoria","LIKE",'%'.$titulo.'%')->paginate(20); //traer registros	
		}
		else{
			$paginacion=InvConvocatorias::paginate(20); //traer registros
		}
		
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,
			'links'=>$crear_paginacion,
			'titulo'=>$titulo,
			'numeropagina' =>$numeropaginacion,
			'lista_unidades'=>$unidades_academicas);

		 return View::make('invitado/lista_convocatorias_invitado',$datos);
	}



	//controlador grupos
	public function ConstruirListaGrupos(){
	
		$paginacion=InvGrupos::where("estado_activacion","=","1")->orderBy('inv_unidad_academica')->paginate(20);//traer registros
		$numeropaginacion=Input::get('page',1);
		$unidades_academicas=InvUnidadesAcademicas::all();
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
			'numeropagina' =>$numeropaginacion,
			'lista_unidades'=>$unidades_academicas);
		
		return View::make('invitado/lista_grupos_invitado',$datos);
	}


	//$tipo puede ser "noticia", "evento"
		public function ConstruirListaNoticiasEventos($tipo,$fecha=null)
		{
			$evento_noticia=InvEventosNoticias::where("tipo","ILIKE",$tipo)
												->where("fecha","=",$fecha)
												->paginate(20);
			$crear_paginacion=$evento_noticia->links();
			$numeropaginacion=Input::get('page',1);
			$unidades_academicas=InvUnidadesAcademicas::all();

				if($tipo=="noticia")
				{

					$datos= array(
					'campo_lista'=>$evento_noticia,
					'links'=>$crear_paginacion,
					'numeropagina'=>$numeropaginacion,
					'lista_unidades'=>$unidades_academicas,
					'tipo'=>$tipo);

					return View::make('invitado/lista_noticias_eventos_invitado',$datos);	
				}

				if($tipo=="evento")
				{

					$datos= array(
					'campo_lista'=>$evento_noticia,
					'links'=>$crear_paginacion,
					'numeropagina'=>$numeropaginacion,
					'lista_unidades'=>$unidades_academicas,
					'tipo'=>$tipo);

					
					return View::make('invitado/lista_noticias_eventos_invitado',$datos);
				}
		}	
/*
	public function ConstruirListaEventosNoticias(){

		$listas=InvEventosNoticias::where("tipo","=","noticia")->get();
		$listas1=InvEventosNoticias::where("tipo","=","Evento")->get(); //traer registros
		$numeropaginacion=Input::get('page',1);


		if(count($listas)>0){

		$datos= array(
			'campo_lista'=>$listas,
			'numeropagina'=>$numeropaginacion);
		
		return View::make('invitado/lista_noticias_invitado',$datos);
		}

		else {
			$datos= array(
			'campo_lista'=>$listas1,
			'numeropagina'=>$numeropaginacion);
		
		return View::make('invitado/lista_eventos_invitado',$datos);
		}
	}	*/

		public function ConstruirListaEventos($tipo)
		{
			$evento_noticia=InvEventosNoticias::where("tipo","ILIKE",$tipo)
												->paginate(20);
			$crear_paginacion=$evento_noticia->links();
			$numeropaginacion=Input::get('page',1);
			$unidades_academicas=InvUnidadesAcademicas::all();


				if($tipo=="evento")
				{

					$datos= array(
					'campo_lista'=>$evento_noticia,
					'links'=>$crear_paginacion,
					'numeropagina'=>$numeropaginacion,
					'lista_unidades'=>$unidades_academicas,
					'tipo'=>$tipo);

					
					return View::make('invitado/lista_noticias_eventos_invitado',$datos);
				}
				
		}
}
