<?php


class ControlInfoGrupos extends Controller {
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_grupo){

		// recibimos el id con la variable de arriba
		
		$grupos= InvGrupos::find($id_grupo)	;

		$persona = Persona::where("cedula","=",$grupos->director_grupo)->get();
		$persona=$persona[0];

		$tipo = InvTipoGrupos::where("id","=",$grupos->inv_tipo_grupos)->get();
		$tipo=$tipo[0];

		$grupos->nombre_director=$persona->nombre1." ".$persona->apellido1." ".$persona->apellido2;
		
		$grupos->tipo_grupo_="No definido. ";
		$grupos->tipo_grupo_band=0;

		if($tipo->estado==1){
			$grupos->tipo_grupo_=$tipo->tipo_grupo;	
			$grupos->tipo_grupo_band=1;
		} 
	

		$datos = array('grupos' =>$grupos);

		return View::make("inf_grupos",$datos);

	}

	
	public function Lineasporgrupos($id_grupo){
		$grupos= InvLineaGrupos::find($id_grupo);	

	}

	
}
