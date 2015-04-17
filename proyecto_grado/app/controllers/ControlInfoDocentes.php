<?php


class ControlInfoDocentes extends Controller {
	

	public function CargarInfoPrincipales($cedula){

		$docentes=array();
		$integrantes=Persona::find($cedula);
		$universidades=array();

		if($integrantes)
		{
			$docentes=Docente::where("cedula","=",$integrantes->cedula)->get();

		}	

		if(count($docentes)>0){// esto se hace si es un docente 
			$docentes=$docentes[0];

			$docentes['nombre_univ_preg1'] =$this->NombresUniversidades($docentes->uni_preg1);//
			$docentes['nombre_univ_preg2'] =$this->NombresUniversidades($docentes->uni_preg2);
			$docentes['nombre_univ_post1'] =$this->NombresUniversidades($docentes->uni_post1);
			$docentes['nombre_univ_post2'] =$this->NombresUniversidades($docentes->uni_post2);
			$docentes['nombre_univ_post3'] =$this->NombresUniversidades($docentes->uni_post3);
		
			$datos = array('datos_integrantes' =>$integrantes,
						   'docente'=>$docentes);

			return View::make("administrador/inf_grupos",$datos);
		}
	}


	//funcion traer universidades
    public function NombresUniversidades($iduniversidad){
    	if($iduniversidad && $iduniversidad!="" )//se verifica q no sea null y q sea diferente a "" 
    	{
    		$nombre=InvUniversidades::find($iduniversidad);
    		if($nombre)
    			return $nombre->universidad;

    		return "No hay Universidad definida";	
    	}
    	else return "No hay Universidad definida";

    }
}			
