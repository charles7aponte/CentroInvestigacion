<?php


class ControlPaginaInicio extends Controller {

	public function CrearPagina(){

		$eventos_noticias=InvEventosNoticias::where("tipo","ILIKE","evento")->get();
		$unidades_academicas=InvUnidadesAcademicas::all();
		$convocatorias=InvConvocatorias::orderBy('fecha_apertura')->get();


		$datos = array('info_eventos'=> $eventos_noticias,
						'lista_unidades'=>$unidades_academicas,
						'lista_convocatorias' =>$convocatorias
			);
		return View::make("contenido",$datos);
			
	}
}
