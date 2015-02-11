<?php


class ControlInfoGrupos extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_grupo){

		// recibimos el id con la variable de arriba
		
		$grupos= InvGrupos::find($id_grupo);


		$datos = array('grupos' =>$grupos);

		return View::make("inf_grupos",$datos);

	}
	
}
