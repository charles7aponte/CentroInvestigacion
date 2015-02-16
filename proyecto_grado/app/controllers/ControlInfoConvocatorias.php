<?php


class ControlInfoConvocatorias extends Controller {


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_convocatoria){

		// recibimos el id con la variable de arriba
		
		$convocatorias= InvConvocatorias::find($id_convocatoria);


		$datos = array('convocatorias' =>$convocatorias );

		return View::make("inf_convocatorias",$datos);

		//recuerdas como recibiamos esos datos el blade ?? como q? osea en el blade?. si. cuando usamos el issetsi . listo abre .. y mustra los datos .. estan en un array de nombre $convocatoria['nombre_columna'] dale en el blade
	}
	
}
