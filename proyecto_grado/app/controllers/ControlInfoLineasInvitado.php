<?php


class ControlInfoLineasInvitado extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_linea){

		$lineas= InvLineas::where("id_lineas","=",$id_linea)->where("estado","=","1")->get();
		$unidades=array();
		$coordinador= array();
		if(count($lineas)>0)
		{
			$lineas=$lineas[0];
			$coordinador =Persona::where("cedula","=",$lineas->coordinador_linea)->get();
			$unidades=InvUnidadesAcademicas::where("id_unidad","=",$lineas->inv_unidad_academica)->get();
		}
		else{
			$lineas=null;
		}

		

		//productos-subtipos por linea
		$productos=InvSubtipoProductos::all();

		foreach ($productos as $keyproducto => $producto) {

			$total_productos=$this->ContarProductosporlinea($producto->id_subtipo_producto,$id_linea);
			$productos[$keyproducto]->total = $total_productos; 			

		}

		$listadeSublineaLineas= $this->Sublineasporlinea($id_linea);
		$proyectos_lineas= $this->ContarProyectosporlinea($id_linea);
		$listaGruposLineas= $this->Gruposporsublinea($id_linea);
		$listaProductoTiposSubtipos=$this->ContarProductosTipos_Subtipos($id_linea);
		
		$datos = array('lineas' =>$lineas, 
					   'sublineas' =>$listadeSublineaLineas,
					   'Lista_productos' =>$productos,
					   'Lista_proyectos' =>$proyectos_lineas, 
					   'lista_grupos' => $listaGruposLineas,
					   'Lista_coordinadores'=> $coordinador,
					   'Lista_portipo' =>$listaProductoTiposSubtipos,
					   'Lista_unidades' =>$unidades

			);

		return View::make("invitado/inf_lineas_invitado",$datos);
	}	

	//sublineas por linea
	public function Sublineasporlinea($id_linea){	
		$listaSublineaLineas=DB::select(DB::raw("select nombre_sublinea , estado  , descripcion_sublinea
				from inv_sublineas 
				where inv_id_linea=$id_linea and estado1='1';")
			);
		return $listaSublineaLineas;
	}

	public function Gruposporsublinea($id_linea){
		$listaGruposLineas=DB::select(DB::raw("select *
			from inv_linea_grupos ilg, inv_grupos ig
			where ilg.inv_codigo_grupo=ig.codigo_grupo
			 and ilg.inv_id_linea =$id_linea;")
		);

		return $listaGruposLineas;
	}
	
	//contar productos por linea
	public function ContarProductosporlinea($subtipo, $id_linea){
		$listaProductosLineas=	DB::select(DB::raw("select count(*)
				from inv_productos ip, inv_subtipo_productos isp
				where isp.id_subtipo_producto=ip.inv_subtipo_producto 
				 and ip.inv_id_linea=$id_linea and ip.inv_subtipo_producto=$subtipo;")
			);

		if($listaProductosLineas && count($listaProductosLineas)>0){
			return $listaProductosLineas[0]->count;
		}
		return 0;
	}

	//proyectos por linea
	public function ContarProyectosporlinea($id_linea){
		$listaProyectosLineas=	DB::select(DB::raw("select count(*)
				from inv_proyectos ip
				where ip.inv_id_linea=$id_linea;")
			);

		if($listaProyectosLineas && count($listaProyectosLineas)>0){
			return $listaProyectosLineas[0]->count;
		}
		return 0;
	}

	//productividad por linea.... grafica 1 (tipo-subtipo-unidad academica)
	public function ContarProductosTipos_Subtipos($id_linea){
		$listaProyectosPorTipoLineas=DB::select(DB::raw("select  itp.nombre_tipo_producto, itp.id_tipo_producto, isp.nombre_subtipo_producto, isp.id_subtipo_producto, count(*)
			from inv_productos ip, inv_subtipo_productos isp, inv_tipo_productos itp
			where ip.inv_subtipo_producto=isp.id_subtipo_producto and isp.inv_id_tipo_producto=itp.id_tipo_producto 
			and ip.inv_id_linea=$id_linea
			group by itp.id_tipo_producto, isp.id_subtipo_producto;")
		);

		$total=array();
		foreach ($listaProyectosPorTipoLineas as $key => $tipos){
			if( $tipos)
			{
				if (isset($total[$tipos->nombre_tipo_producto])==false){
					$total[$tipos->nombre_tipo_producto]=array();
				}
					
					$total[$tipos->nombre_tipo_producto][$tipos->nombre_subtipo_producto]=$tipos->count;
				
				
			}
		}

		//print_r($total);
		return $total;
	}
}
