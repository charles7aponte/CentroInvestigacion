<?php

class ControlProductividad extends Controller {

	public function CrearProductos($id_unidad){

		$unidades_academicas=InvUnidadesAcademicas::all();
		$unidadproducto=$this->productividad_unidad($id_unidad);
		//print_r($unidadproducto);

		$datos = array('lista_unidades'=>$unidades_academicas,);
		return View::make("invitado/productividad_unidad",$datos);
			
	}

	public function productividad_unidad($id_unidad){

		$listaProductividadUnidades=	DB::select(DB::raw("select isp.nombre_subtipo_producto,itp.nombre_tipo_producto,isp.id_subtipo_producto,itp.id_tipo_producto,count(*)
		from inv_grupos ig, inv_productos ip, inv_subtipo_productos isp, inv_tipo_productos itp
		where itp.id_tipo_producto=isp.inv_id_tipo_producto and isp.id_subtipo_producto=ip.inv_subtipo_producto and ig.codigo_grupo=ip.inv_codigo_grupo and ig.inv_unidad_academica=$id_unidad
		group by isp.nombre_subtipo_producto,itp.nombre_tipo_producto,isp.id_subtipo_producto,itp.id_tipo_producto"));
	

		$totalUnidad=array();
		foreach ($listaProductividadUnidades as $key => $productividad){
			if( $productividad)
			{
				if (isset($totalUnidad[$productividad->nombre_tipo_producto])==false){
					$totalUnidad[$productividad->nombre_tipo_producto]=array();
				}
					
					$totalUnidad[$productividad->nombre_tipo_producto][$productividad->nombre_subtipo_producto]=$productividad->count;				
			}
		}

		return $totalUnidad;
	}
}
