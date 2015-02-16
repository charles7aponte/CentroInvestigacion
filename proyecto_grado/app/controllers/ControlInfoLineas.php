<?php


class ControlInfoLineas extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_linea){


		$lineas= InvLineas::find($id_linea);


		$datos = array('lineas' =>$lineas );

		return View::make("inf_lineas",$datos);
	}
		
	
}
