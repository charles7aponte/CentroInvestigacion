<?php

class ControlInfoListasLineasInvitado extends Controller {


	//lista de proyectos por lineas
	public function ConstruirListaProyectosLineas($idlineas){

		$lineas= InvLineas::find($idlineas);
		$listaproyectoslineas=InvProyectos::where("inv_id_linea","=",$idlineas)->paginate(25);
		$unidades_academicas=InvUnidadesAcademicas::all();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();


		$paginacion=$listaproyectoslineas->links();
		$datos=array(
			'lista_proyectos_lineas' =>$listaproyectoslineas,
			'lista_nombre_lineas' =>$lineas,
			'campo_lista'=>$listaproyectoslineas,
			'links'=>$paginacion,
			'lista_unidades'=>$unidades_academicas,
			'lista_documentos' =>$documentos
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

		$datos=array(
			'productosporlineas'=>$productoslineas,
			'lista_nombre_lineas' =>$lineas,
			'lista_subtipo'=>$productos,
			'links'=>$paginacion,
			'lista_unidades'=>$unidades_academicas,
			'lista_documentos' =>$documentos
			);

		return View::make('invitado/inf_lista_productos_lineas_invitado',$datos);
	}

}
