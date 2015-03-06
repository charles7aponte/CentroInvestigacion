<?php

class ControlInfoListasLineas extends Controller {


	//lista de proyectos por lineas
	public function ConstruirListaProyectosLineas($idlineas){

		$lineas= InvLineas::find($idlineas);
		$listaproyectoslineas=InvProyectos::where("inv_id_linea","=",$idlineas)->paginate(25);


		$paginacion=$listaproyectoslineas->links();
		$datos=array(
			'lista_proyectos_lineas' =>$listaproyectoslineas,
			'lista_nombre_lineas' =>$lineas,
			'campo_lista'=>$listaproyectoslineas,
			'links'=>$paginacion
			);

		return View::make('inf_lista_proyectos_lineas',$datos);
	}


	//lista productos por lineas
	public function ContruirListaProductosLineas($idlinea,$idsubtipo){
		$lineas= InvLineas::find($idlinea);
		$productos= InvSubtipoProductos::find($idsubtipo);
		$paginacion="";

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
			'links'=>$paginacion
			);

		return View::make('inf_lista_productos_lineas',$datos);
	}

}
