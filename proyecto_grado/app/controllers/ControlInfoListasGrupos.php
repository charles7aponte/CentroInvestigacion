<?php

class ControlInfoListasGrupos extends Controller {


	//controlador lineas
	public function ConstruirListaIntegrantesGrupos($idgrupo, $idperfil){

		$grupos = InvGrupos::find($idgrupo);

		$perfil  = InvPerfiles::find($idperfil);
			$listaintegrantesgrupos = array();
	
			if($perfil)
			{
				$listaParticipanteGrupos = InvParticipacionGrupos::where("inv_codigo_grupo","=",$idgrupo)->lists("cedula_persona");
				$invPerfil = InvPersonaPerfil::where("codperfil","=",$idperfil)->lists("cedula");
				//$invPerfil1= InvInvestigadoresExternos::where("codperfil","=",$idperfil)->lists("cedula");
				
				$listaintegrantesgrupos= $listaPersonas = Persona::whereIn("cedula",$listaParticipanteGrupos)
							->whereIn("cedula",$listaParticipanteGrupos)
									->paginate(1);

			}


		$paginacion="";
		if(count($listaintegrantesgrupos)>0)
		{
			$paginacion=$listaintegrantesgrupos->links();

		}
		$datos= array(
			'lista_integrantes_grupos'=>$listaintegrantesgrupos,
			'lista_nombre_grupos' =>$grupos,
			'registro_perfiles' =>$perfil,
			'campo_lista'=>$listaintegrantesgrupos,
			'links'=>$paginacion
			);


		return View::make('inf_lista_integrantes_grupos',$datos);
	}


	//lista de proyectos por grupos
	public function ConstruirListaProyectosGrupos($idgrupo){

		$grupos = InvGrupos::find($idgrupo);

		$listaproyectosgrupos=InvProyectos::where("inv_codigo_grupo","=",$idgrupo)->paginate(1);

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
