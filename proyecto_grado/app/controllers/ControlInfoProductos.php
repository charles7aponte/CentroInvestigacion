<?php


class ControlInfoProductos extends Controller {


	public function CargarInfoPrincipales($id_producto){

		$productos= InvProductos::find($id_producto);
		$subtipo=array();
		$grupo=array();
		$linea=array();
		$tipo=array();
		$entidad=array();
		

	    if($productos){
 		
			$subtipo = InvSubtipoProductos::where("id_subtipo_producto","=",$productos->inv_subtipo_producto)->get();
			$grupo=InvGrupos::where("codigo_grupo","=",$productos->inv_codigo_grupo)->get();
			$linea=InvLineas::where("id_lineas","=",$productos->inv_id_linea)->get();
			$entidad= InvEntidades::where("nit","=",$productos->inv_nit)->get();

			if(count($linea)>0)
			{
				$linea=$linea[0];
			}

			if(count($grupo)>0)
			{
				$grupo=$grupo[0];
			}

			if(count($subtipo)>0)
			{
				$subtipo=$subtipo[0];
			}

			if(count($entidad)>0)
			{
				$entidad=$entidad[0];
			}


		}


		$datos = array('productos' =>$productos,
					   'lista_subtipo' =>$subtipo,
					   'lista_grupos' =>$grupo,
					   'lista_lineas' =>$linea,
					   'lista_entidades' =>$entidad);

		return View::make("inf_productos",$datos);
	}
	
}
