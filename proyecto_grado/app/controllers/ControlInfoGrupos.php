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

		//recuerdas como recibiamos esos datos el blade ?? como q? osea en el blade?. si. cuando usamos el issetsi . listo abre .. y mustra los datos .. estan en un array de nombre $convocatoria['nombre_columna'] dale en el blade
	}
	
}
