<?php


class ControlInfoPersonas extends Controller {
	

	public function CargarInfoPrincipales($cedula){

		// recibimos el id con la variable de arriba
		
		$integrantes=Persona::find($cedula);
		$investigadores=InvInvestigadoresExternos::all();

		
		$datos = array('datos_integrantes' =>$integrantes

			);

	return View::make("inf_personas",$datos);

	}
}
