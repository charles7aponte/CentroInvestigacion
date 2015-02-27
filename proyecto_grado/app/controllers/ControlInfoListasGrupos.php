<?php

class ControlInfoListasGrupos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */






	//controlador lineas
	public function ConstruirListaIntegrantesGrupos($idgrupo, $idperfil){

		$grupos = InvGrupos::find($idgrupo);

		$perfil  = InvPerfiles::find($idperfil);
			$listaintegrantesgrupos =null;
	
			if($perfil)
			{
				$listaParticipanteGrupos = InvParticipacionGrupos::where("codigo_inv_codigo_grupo","=",$idgrupo)->get("cedula");
				$invPerfil = InvPersonaPerfil::where("codperfil","=",$idperfil)->get("cedula");
				
				$listaintegrantesgrupos= $listaPersonas = Persona::whereIn("cedula",$listaParticipanteGrupos)
							->whereIn("cedula",$listaParticipanteGrupos)
							->get();
			}


		/*$listaintegrantesgrupos=DB::select(DB::raw("select ps.cedula, ps.nombre1, ps.nombre2, ps.apellido1, ps.apellido2, pf.nombreperfil
				from persona ps, perfil pf, personaperfil pp, inv_participacion_grupos ipg
				where ipg.cedula_persona=ps.cedula and ps.cedula=pp.cedula and pp.codperfil=pf.codperfil 
				and ipg.inv_codigo_grupo=$idgrupo and pf.codperfil=$idperfil")
		);
		//print_r( $listaintegrantesgrupos);*/


		$datos= array(
			'lista_integrantes_grupos'=>$listaintegrantesgrupos,
			'lista_nombre_grupos' =>$grupos
			);


		//return View::make('inf_lista_integrantes_grupos',$datos);

/*

		$paginacion=InvLineas::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		//print_r($a);
		return View::make('administrador/lista_lineas',$datos);*/

	}

	//lista de proyectos por grupos
	public function ConstruirListaProyectosGrupos($idgrupo){

		$grupos = InvGrupos::find($idgrupo);

		$listaproyectosgrupos=DB::select(DB::raw("select codigo_proyecto, nombre_proyecto
			from inv_grupos iv, inv_proyectos ip
			where iv.codigo_grupo=ip.inv_codigo_grupo and iv.codigo_grupo=$idgrupo"
			));

		$datos=array(
			'lista_proyectos_grupos' =>$listaproyectosgrupos,
			'lista_nombre_grupos' =>$grupos
			);

		return View::make('inf_lista_proyectos_grupos',$datos);
	}

	//lista de productos por  grupos
	public function ContruirListaProductosGrupos($idgrupo,$idsubtipo){
		$grupos=InvGrupos::find($idgrupo);
		$listaproductosgrupos=DB::select(DB::raw("select ip.codigo_producto, ip.nombre_producto, isp.nombre_subtipo_producto
			from inv_grupos ig, inv_participacion_productos ipp, inv_productos ip, inv_subtipo_productos isp
			where ig.codigo_grupo=ipp.inv_codigo_grupo 
			and ipp.inv_codigo_producto=ip.codigo_producto and isp.id_subtipo_producto=ip.inv_subtipo_producto
			and ig.codigo_grupo=$idgrupo and ip.inv_subtipo_producto=$idsubtipo"
			));
		
		$datos=array(
			'lista_productos_grupos' =>$listaproductosgrupos,
			'lista_nombre_grupos' =>$grupos 
			);

		return View::make('inf_lista_productos_grupos',$datos);

	}
}
