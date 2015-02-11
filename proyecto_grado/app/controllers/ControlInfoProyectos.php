<?php


class ControlInfoProyectos extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_proyecto){

		// recibimos el id con la variable de arriba
		
		$proyectos= InvProyectos::find($id_proyecto);


		$datos = array('proyectos' =>$proyectos);

		return View::make("inf_proyectos",$datos);
	}
	
}
