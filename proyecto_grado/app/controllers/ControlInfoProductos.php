<?php


class ControlInfoProductos extends Controller {


	public function CargarInfoPrincipales($id_producto){

		$productos= InvProductos::find($id_producto);
		$subtipo=array();
		$grupo=array();
		$linea=array();
		$tipo=array();
		$entidad=array();
		$listatipos="";

	    if($productos){
 		
		$listatipos=$this->tipo_producto($productos->inv_subtipo_producto);


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
					   'lista_entidades' =>$entidad,
					   'listatipos'=>$listatipos
					   );


		return View::make("inf_productos",$datos);
	}

	public function tipo_producto($idsubtipo){
		$listatipo_producto=DB::select(DB::raw("select itp.nombre_tipo_producto
					from inv_subtipo_productos isp, inv_tipo_productos itp
					where isp.inv_id_tipo_producto=itp.id_tipo_producto and isp.id_subtipo_producto=$idsubtipo")
		);

			if(count($listatipo_producto)>0){
				
				return $listatipo_producto[0]->nombre_tipo_producto;
			}
			return "No  esta definido";

	}
	
}
