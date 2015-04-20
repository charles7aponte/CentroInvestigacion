<?php

class ControlInfoListasGruposInvitado extends Controller {


	//controlador lineas
	public function ConstruirListaIntegrantesGrupos($idgrupo, $idperfil){

		$grupos =InvGrupos::find($idgrupo);
		$listaintegrantesgrupos= array();
		$paginacion="";
		$unidades_academicas=InvUnidadesAcademicas::all();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();


		$perfil=InvPerfiles::find($idperfil);
		$listaintegrantesgrupos = array();

		$listaParticipanteGrupos = InvParticipacionGrupos::where("inv_codigo_grupo","=",$idgrupo)->lists('cedula_persona');
		//lista de cedulas , q pertenecen a ese grupo 
		$invPerfil = InvPersonaPerfil::where("codperfil","=",$idperfil)->lists("cedula");//esta es la lista de cedulas que cumple ese perfil

	
		//validamos q tengan elementos 
		if(count($listaParticipanteGrupos)>0 && count($invPerfil))
		{
			$listaintegrantesgrupos= $listaPersonas = Persona::whereIn("cedula",$listaParticipanteGrupos)
							->whereIn("cedula",$invPerfil )	//ahora deben estar en las dos listas y usamos esa consulta q la tenimaos pendiente
							->paginate(20);
		}
	

		if(count($listaintegrantesgrupos)>0)
		{
			$paginacion=$listaintegrantesgrupos->links();

		}
		$datos= array(
			'lista_integrantes_grupos'=>$listaintegrantesgrupos,
			'lista_nombre_grupos' =>$grupos,
			'registro_perfiles' =>$perfil,
			'links'=>$paginacion,
			'lista_unidades'=>$unidades_academicas,
			'lista_documentos' =>$documentos
			);


		return View::make('invitado/inf_lista_integrantes_grupos_invitado',$datos);
	}


	//lista de proyectos por grupos
	public function ConstruirListaProyectosGrupos($idgrupo){

		$grupos = InvGrupos::find($idgrupo);
		$listaproyectosgrupos=InvProyectos::where("inv_codigo_grupo","=",$idgrupo)->paginate(25);	

	foreach ($listaproyectosgrupos as $key => $proyecto) {
		    $nombresInvestigadores="";
		    $nombresCoInvestigadores="";
		    $listaNombreInvistigadores=array();
		    $listaNombreCoInvistigadores=array();

		    //busqueda de invsitgadores principales
		    $listaCedulaParticipantesInvestigadores=InvParticipacionProyectos::where("inv_codigo_proyecto","=",$proyecto->codigo_proyecto)
		    ->where("tipo_investigador","ILIKE","investigador principal")
		    ->lists("cedula_persona"); /// como es el model para la tabal particpates proyectos porfa
		    
		    if(count($listaCedulaParticipantesInvestigadores)>0)
			{
			    $autoresInvestigadores = Persona::find($listaCedulaParticipantesInvestigadores);
			    
			    foreach ($autoresInvestigadores as $autor) {
			    		 $listaNombreInvestigadores[]=trim($autor->nombre1." ".$autor->apellido1." ".$autor->apellido2);
			    }

			    $nombresInvestigadores= implode(","." ",$listaNombreInvestigadores);
			}

		    //busqueda de los coinvest
		     $listaCedulaParticipantesCoInvestigadores=InvParticipacionProyectos::where("inv_codigo_proyecto","=",$proyecto->codigo_proyecto)
		    ->where("tipo_investigador","ILIKE","coinvestigador")
		    ->lists("cedula_persona"); 
		   	
		   	if(count($listaCedulaParticipantesCoInvestigadores)>0)
		   	{

			    $autoresCoInvestigadores = Persona::find($listaCedulaParticipantesCoInvestigadores);
			    foreach ($autoresCoInvestigadores as  $autor) {
			    		 $listaNombreCoInvestigadores[]=trim($autor->nombre1." ".$autor->apellido1);
			    }

			    $nombresCoInvestigadores= implode(","." ",$listaNombreCoInvestigadores);
		   		
		   	}



		    $listaproyectosgrupos[$key]['autor_investigadores']= $nombresInvestigadores;
		    $listaproyectosgrupos[$key]['autor_coinvestigadores']= $nombresCoInvestigadores;
		     
		}

		$unidades_academicas=InvUnidadesAcademicas::all();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();
		$numeropaginacion=Input::get('page',1);

		$paginacion=$listaproyectosgrupos->links();
		$datos=array(
			'lista_proyectos_grupos' =>$listaproyectosgrupos, 
			'lista_nombre_grupos' =>$grupos,
			'campo_lista'=>$listaproyectosgrupos,
			'links'=>$paginacion,
			'lista_unidades'=>$unidades_academicas,
			'lista_documentos' =>$documentos,
			'numeropagina' =>$numeropaginacion
			);

		return View::make('invitado/inf_lista_proyectos_grupos_invitado',$datos);
	}




	//lista de productos por  grupos
	public function ContruirListaProductosGrupos($idgrupo,$idsubtipo){
		$grupos = InvGrupos::find($idgrupo);
		$subtipo=InvSubtipoProductos::find($idsubtipo);
		$paginacion="";
		$unidades_academicas=InvUnidadesAcademicas::all();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();
		$numeropaginacion=Input::get('page',1);

		$productos=InvProductos::where("inv_codigo_grupo","=",$idgrupo)
								->where("inv_subtipo_producto","=",$idsubtipo)
								->paginate(25);

		for($i=0;$i< count($productos);$i++){
			$productos[$i]->nombre_subtipo_producto=$subtipo['nombre_subtipo_producto'];
		}				


			foreach ($productos as $key => $producto) {
		    $nombresInvestigadores="";
		    $listaNombreInvestigadores=array();

		    //busqueda de invsitgadores principales
		    $listaCedulaParticipantes=InvParticipacionProductos::where("inv_codigo_producto","=",$producto->codigo_producto)
		    																	->lists("cedula_persona"); 
		    
		    if(count($listaCedulaParticipantes)>0)
			{
			    $autoresInvestigadores = Persona::find($listaCedulaParticipantes);
			    
			    foreach ($autoresInvestigadores as $autor) {
			    		 $listaNombreInvestigadores[]=trim($autor->nombre1." ".$autor->apellido1);
			    }

			    $nombresInvestigadores= implode(","." ",$listaNombreInvestigadores);
			}
		    $productos[$key]['autor_investigadores']= $nombresInvestigadores;		     
		}


		if(count($productos)>0)
		{
			$paginacion=$productos->links();

		}


		$datos=array(
			'lista_productos_grupos' =>$productos,
			'lista_nombre_grupos' =>$grupos,
			'links'=>$paginacion,
			'lista_unidades'=>$unidades_academicas,
			'lista_documentos' =>$documentos,
			'numeropagina' =>$numeropaginacion
			);

		return View::make('invitado/inf_lista_productos_grupos_invitado',$datos);

	}
}
