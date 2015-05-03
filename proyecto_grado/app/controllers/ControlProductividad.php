<?php

class ControlProductividad extends Controller {

	public function CrearProductos($id_unidad){

		$unidades_academicas=InvUnidadesAcademicas::all();
		$unidadproducto=$this->productividad_unidad($id_unidad);
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();
		//print_r($unidadproducto);

		$datos = array('lista_unidades'=>$unidades_academicas,
					   'lista_documentos' =>$documentos,
					   'unidadproducto' =>$unidadproducto);
		return View::make("invitado/productividad_unidad",$datos);
			
	}

	public function productividad_unidad($id_unidad){

		$listaProductividadUnidades=	DB::select(DB::raw("select  nombre_subtipo_producto,nombre_tipo_producto,id_subtipo_producto,id_tipo_producto,count(*)
			FROM (select distinct isp.nombre_subtipo_producto,itp.nombre_tipo_producto,
			isp.id_subtipo_producto,itp.id_tipo_producto,ip.codigo_producto

			from inv_productos ip, inv_subtipo_productos isp,
			   inv_tipo_productos itp,inv_unidades_academicas iua,docente d,inv_participacion_productos ipp

			where itp.id_tipo_producto=isp.inv_id_tipo_producto 
				and isp.id_subtipo_producto=ip.inv_subtipo_producto 
				and iua.id_unidad=$id_unidad
				and iua.id_unidad=d.unidad_acad
				and ip.codigo_producto=ipp.inv_codigo_producto
				and d.cedula=ipp.cedula_persona
			) as subconsultaunidad
			group by nombre_subtipo_producto,nombre_tipo_producto,id_subtipo_producto,id_tipo_producto"));
				

		$totalUnidad=array();
		foreach ($listaProductividadUnidades as $key => $productividad){
			if($productividad)
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
