<?php

class ControlInfoListasGrupos extends Controller {


	//controlador lineas
	public function ConstruirListaIntegrantesGrupos($idgrupo, $idperfil){

		$grupos =InvGrupos::find($idgrupo);
		$paginacion="";

/*
		$perfil=InvPerfiles::find($idperfil);
		$listaintegrantesgrupos = array();

		$listaParticipanteGrupos = InvParticipacionGrupos::where("inv_codigo_grupo","=",$idgrupo)->lists('cedula_persona');
		$invPerfil = InvPersonaPerfil::where("codperfil","=",$idperfil)->lists("cedula");*/
				//$invPerfil1= InvInvestigadoresExternos::where("codperfil","=",$idperfil)->lists("cedula");
		$listaintegrantesgrupos=DB::select(DB::raw("select *
				from persona p, inv_participacion_grupos ipg, personaperfil pp, perfil pf
				where p.cedula=ipg.cedula_persona and pp.cedula=p.cedula and pp.codperfil=pf.codperfil
				and pf.codperfil=$idperfil and inv_codigo_grupo=$idgrupo;"));

				/*$listaintegrantesgrupos= $listaPersonas = Persona::whereIn("cedula",$listaParticipanteGrupos)
							->paginate(2);
			

		if(count($listaintegrantesgrupos)>0)
		{
			$paginacion=$listaintegrantesgrupos->links();

		}*/
		$datos= array(
			'lista_integrantes_grupos'=>$listaintegrantesgrupos,
			'lista_nombre_grupos' =>$grupos,
			//'registro_perfiles' =>$perfil,
			//'links'=>$paginacion
			);


		return View::make('inf_lista_integrantes_grupos',$datos);
	}


	//lista de proyectos por grupos
	public function ConstruirListaProyectosGrupos($idgrupo){

		$grupos = InvGrupos::find($idgrupo);

		$listaproyectosgrupos=InvProyectos::where("inv_codigo_grupo","=",$idgrupo)->paginate(25);

		$paginacion=$listaproyectosgrupos->links();
		$datos=array(
			'lista_proyectos_grupos' =>$listaproyectosgrupos,
			'lista_nombre_grupos' =>$grupos,
			'campo_lista'=>$listaproyectosgrupos,'links'=>$paginacion
			);

		return View::make('inf_lista_proyectos_grupos',$datos);
	}

	//lista de productos por  grupos
	public function ContruirListaProductosGrupos($idgrupo,$idsubtipo){
		$grupos = InvGrupos::find($idgrupo);
		$subtipo=InvSubtipoProductos::find($idsubtipo);
		$paginacion="";

		$productos=InvProductos::where("inv_codigo_grupo","=",$idgrupo)
						->where("inv_subtipo_producto","=",$idsubtipo)
						->paginate(25);

		for($i=0;$i< count($productos);$i++){
			$productos[$i]->nombre_subtipo_producto=$subtipo['nombre_subtipo_producto'];
		}				

		if(count($productos)>0)
		{
			$paginacion=$productos->links();

		}
		
		$datos=array(
			'lista_productos_grupos' =>$productos,
			'lista_nombre_grupos' =>$grupos,
			'links'=>$paginacion
			);

		return View::make('inf_lista_productos_grupos',$datos);

	}
}
