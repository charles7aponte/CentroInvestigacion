<?php


class ControlInfoPersonas extends Controller {
	

	public function CargarInfoPrincipales($cedula){

		$docentes=array();
		$integrantes=Persona::find($cedula);
		$universidades=array();

		if($integrantes)
		{
			$docentes=Docente::where("cedula","=",$integrantes->cedula)->get();
			$universidades=InvUniversidades::all();


		}	

				foreach ($docentes as $key => $lista) {
			$nombreuniversidades=InvUniversidades::find($lista->inv_unidad_academica);
			$nombre_grupo = $nombre_grupo->nombre_unidad;
			$paginacion[$key]->nombre_unidad_academica=$nombre_grupo; 

		}

		//tieen datos en  docentes si es un docente .  y de ese modo para los otros .. la relacion es la q manda la parada .. 
		// la otra seria consultar los perficiles pero tendriamos q saber el nombre exacto q tiene .. s
		// cual te parece mejor ?o mas bn perfiles para docentes noo.. pero para investigadores si y estudiantes ... es q la ficha del docnete es totalmente difereente
		// ok 
		if(count($docentes)>0){// esto se hace si es un docente 
			$docentes=$docentes[0];
		}

		if(count($universidades)>0){// esto se hace si es un docente 
			$universidades=$universidades[0];
		}

			$datos = array('datos_integrantes' =>$integrantes,
				'docente'=>$docentes,
				'lista_universidades' =>$universidades

			);

			return View::make("inf_personas_docentes",$datos);
	}
//en el blade para quitar o poner la parte q es de estduainte o docente necesitaria traer perfil verdad¡ no .. pero no creo q gastemo mucho recuros ... una desicion q no afecta mucho .. ah plo


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
	
