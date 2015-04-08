<?php

class ControlInfoListasConvocatoriasInvitado extends Controller {


	//lista de proyectos por lineas
	public function ConstruirListaProyectosConvocatorias($idconvocatoria,$estadop){
		$convocatorias=InvConvocatorias::find($idconvocatoria);
		$paginacion="";
		$unidades_academicas=InvUnidadesAcademicas::all();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();

		$convocatorias_proyectos =InvProyectos::where("inv_numero_convocatoria","=",$idconvocatoria)
											  ->where("estado_proyecto","=",$estadop)	
											  ->paginate(20);								  
		if(count($convocatorias_proyectos)>0)
		{
		$paginacion=$convocatorias_proyectos->links();
		}

		
		$datos=array(
			'lista_proyectos_convocatorias' =>$convocatorias_proyectos,
			'lista_convocatorias' =>$convocatorias,
			'links'=>$paginacion,
			'lista_unidades'=>$unidades_academicas,
			'lista_documentos' =>$documentos
			);

		return View::make('invitado/inf_lista_proyectos_convocatorias_invitado',$datos);
	}

}
