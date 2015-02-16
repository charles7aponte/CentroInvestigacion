<?php


class ControlInfoProductos extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_producto){

		// recibimos el id con la variable de arriba
		
		$productos= InvProductos::find($id_producto);


		$datos = array('productos' =>$productos);

		return View::make("inf_productos",$datos);
	}
	
}
