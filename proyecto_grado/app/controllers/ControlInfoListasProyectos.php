<?php

class ControlInfoListasProyectos extends Controller {


	//controlador lineas
	public function ConstruirListaIntegrantesProyectos($idproyecto, $idperfil){

		$proyectos =InvProyectos::find($idproyecto);
		$listaintegrantesproyectos= array();
		$paginacion="";


		$perfil=InvPerfiles::find($idperfil);

		$listaParticipanteProyectos = InvParticipacionProyectos::where("inv_codigo_proyecto","=",$idproyecto)->lists('cedula_persona');
		$invPerfil = InvPersonaPerfil::where("codperfil","=",$idperfil)->lists("cedula");

	
		//validamos q tengan elementos 
		if(count($listaParticipanteProyectos)>0 && count($invPerfil))
		{
			$listaintegrantesproyectos= $listaPersonas = Persona::whereIn("cedula",$listaParticipanteProyectos)
							->whereIn("cedula",$invPerfil )	
							->paginate(20);
		}
	

		if(count($listaintegrantesproyectos)>0)
		{
			$paginacion=$listaintegrantesproyectos->links();

		}
		$datos= array(
			'lista_integrantes_proyectos'=>$listaintegrantesproyectos,
			'lista_nombre_proyectos' =>$proyectos,
			'registro_perfiles' =>$perfil,
			'links'=>$paginacion
			);


		return View::make('administrador/inf_lista_integrantes_proyectos',$datos);
	}

}
