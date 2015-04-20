<?php

class ControlInfoListasLineasInvitado extends Controller {


	//lista de proyectos por lineas
	public function ConstruirListaProyectosLineas($idlineas){

		$lineas= InvLineas::find($idlineas);
		$listaproyectoslineas=InvProyectos::where("inv_id_linea","=",$idlineas)->paginate(25);
		$unidades_academicas=InvUnidadesAcademicas::all();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();
		$numeropaginacion=Input::get('page',1);


			foreach ($listaproyectoslineas as $key => $proyecto) {
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



		    $listaproyectoslineas[$key]['autor_investigadores']= $nombresInvestigadores;
		    $listaproyectoslineas[$key]['autor_coinvestigadores']= $nombresCoInvestigadores;
		     
		}


		$paginacion=$listaproyectoslineas->links();
		$datos=array(
			'lista_proyectos_lineas' =>$listaproyectoslineas,
			'lista_nombre_lineas' =>$lineas,
			'campo_lista'=>$listaproyectoslineas,
			'links'=>$paginacion,
			'lista_unidades'=>$unidades_academicas,
			'lista_documentos' =>$documentos,
			'numeropagina' =>$numeropaginacion
			);

		return View::make('invitado/inf_lista_proyectos_lineas_invitado',$datos);
	}


	//lista productos por lineas
	public function ContruirListaProductosLineas($idlinea,$idsubtipo){
		$lineas= InvLineas::find($idlinea);
		$productos= InvSubtipoProductos::find($idsubtipo);
		$paginacion="";
		$unidades_academicas=InvUnidadesAcademicas::all();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();
		$numeropaginacion=Input::get('page',1);

		$productoslineas=InvProductos::where("inv_id_linea","=",$idlinea)
						->where("inv_subtipo_producto","=",$idsubtipo)
						->paginate(25);

		for($i=0;$i< count($productoslineas);$i++){
			$productoslineas[$i]->nombre_subtipo_producto=$productos['nombre_subtipo_producto'];
		}				

			if(count($productoslineas)>0)
			{
				$paginacion=$productoslineas->links();

			}

		foreach ($productoslineas as $key => $producto) {
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
		    $productoslineas[$key]['autor_investigadores']= $nombresInvestigadores;		     
		}
	



		$datos=array(
			'productosporlineas'=>$productoslineas,
			'lista_nombre_lineas' =>$lineas,
			'lista_subtipo'=>$productos,
			'links'=>$paginacion,
			'lista_unidades'=>$unidades_academicas,
			'lista_documentos' =>$documentos,
			'numeropagina' =>$numeropaginacion
			);

		return View::make('invitado/inf_lista_productos_lineas_invitado',$datos);
	}

}
