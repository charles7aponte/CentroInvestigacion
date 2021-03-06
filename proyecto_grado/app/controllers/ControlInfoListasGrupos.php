<?php

class ControlInfoListasGrupos extends Controller {
	
	public $listaIntegrantesGrupos=array('Docente' => 0,'Estudiante' => 0,'Joven Investigador'=>0, 'Investigador Externo'=>0 );
	public $idperfiles=array();

	//controlador lineas
	public function ConstruirListaIntegrantesGrupos($idgrupo, $idperfil){

		$grupos =InvGrupos::find($idgrupo);
		$listaintegrantesgrupos= array();
		$paginacion="";


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
			'links'=>$paginacion
			);


		return View::make('administrador/inf_lista_integrantes_grupos',$datos);
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

		return View::make('administrador/inf_lista_proyectos_grupos',$datos);
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

		return View::make('administrador/inf_lista_productos_grupos',$datos);

	}
}
