<?php


class ControlInfoLineas extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_linea){


		$lineas= InvLineas::find($id_linea);

		//productos-subtipos por linea
		$productos=InvSubtipoProductos::all();

		foreach ($productos as $keyproducto => $producto) {

			$total_productos=$this->ContarProductosporlinea($producto->id_subtipo_producto,$id_linea);
			$productos[$keyproducto]->total = $total_productos; 			

		}

		$listadeSublineaLineas= $this->Sublineasporlinea($id_linea);
		$proyectos_lineas= $this->ContarProyectosporlinea($id_linea);
		
		$datos = array('lineas' =>$lineas, 
					   'sublineas' =>$listadeSublineaLineas,
					   'Lista_productos' =>$productos,
					   'Lista_proyectos' =>$proyectos_lineas

			);

		return View::make("inf_lineas",$datos);
	}	

	//sublineas por linea
	public function Sublineasporlinea($id_linea){	
		$listaSublineaLineas=	DB::select(DB::raw("select nombre_sublinea
				from inv_sublineas 
				where inv_id_linea=$id_linea;")
			);
		return $listaSublineaLineas;
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
}
