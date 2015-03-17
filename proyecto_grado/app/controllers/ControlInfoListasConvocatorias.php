<?php

class ControlInfoListasConvocatorias extends Controller {


	//lista de proyectos por lineas
	public function ConstruirListaProyectosConvocatorias($idconvocatoria,$estadop){
		$convocatorias=InvConvocatorias::find($idconvocatoria);
		$paginacion="";

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
			'links'=>$paginacion
			);

		return View::make('inf_lista_proyectos_convocatorias',$datos);
	}

}
