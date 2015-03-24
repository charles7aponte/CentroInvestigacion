<?php


class ControlInfoPersonas extends Controller {
	

	public function CargarInfoPrincipales($cedula){

		$docentes=array();
		$integrantes=Persona::find($cedula);

		if($integrantes)
		{

			$docentes=Docente::where("cedula","=",$integrantes->cedula)->get();

		}	
		if(count($docentes)>0){
			$docentes=$docentes[0];

			$datos = array('datos_integrantes' =>$integrantes,
				'docente'=>$docentes

			);

			return View::make("inf_personas_docentes",$datos);
		}

			
//osea ... yo cargo aca para estudiantes pero el return ya no es para "inf_personas_docentes" es otro blade ... 

		/*
		pero quieres usar la misma direccion ??
		si me hago entender . 
		osea en route es otraaaa... osea es q no me hago entender..
		por ejemplo como hago para cargar en este mismo contrlador decirle .. si es docente retorne a esta ficha
		si es estudiante o investigador a esta otra ficha ...si me entendiye?
		si que pena con su merced hermosa ajajaj
		$estudiantes=Estudiante::all();
		$investigadores=InvInvestigadoresExternos::all();
	
		$datos = array('datos_integrantes' =>$integrantes,

			);*/

//los mando tambien en datos?o debo validar algo o ese se hace desde el blade? pero lo del return :/
	}
}
