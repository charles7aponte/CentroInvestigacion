<?php


class ControlInfoPersonas extends Controller {
	

	public function CargarInfoPrincipales($cedula){
		$estudiantes=array();
		$investigadores=array();
		$integrantes=Persona::find($cedula);

		if($integrantes)
		{
			$estudiantes=Estudiante::where("cedula","=",$integrantes->cedula)->get();
			$investigadores=InvInvestigadoresExternos::where("cedula_persona","=",$integrantes->cedula)->get();
		}	

		 if(count($investigadores)>0){	
		 	$investigadores=$investigadores[0];

			$datos = array('datos_integrantes' =>$integrantes,
						   'investigadores' =>$investigadores
						   //'perfil_investigadores' =>$invPerfilInvestigadores
						  );

			return View::make("administrador/inf_personas",$datos);
		}

		else {

			$estudiantes=$estudiantes[0];

			$datos = array('datos_integrantes' =>$integrantes,
						   'estudiantes' =>$estudiantes
						   //'perfil_investigadores' =>$invPerfilInvestigadores
						  );

			return View::make("administrador/inf_personas",$datos);

		}
	}
}			
