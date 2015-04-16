<?php


class ControlPaginaInicio extends Controller {

	public function CrearPagina(){

		$eventos_noticias=InvEventosNoticias::where("tipo","ILIKE","evento")->get();
		$unidades_academicas=InvUnidadesAcademicas::all();
		$noticias=InvEventosNoticias::where("tipo","ILIKE","noticia")->take(2)->get();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();
		$convocatorias=InvConvocatorias::where("estado","LIKE","%abiert%")->orderBy('fecha_apertura','desc')->take(5)->get();
		$imagenes_slider=InvSlider::where("estado_activacion","=","1")->get();

		$datos = array('info_eventos'=> $eventos_noticias,
						'lista_unidades'=>$unidades_academicas,
						'lista_convocatorias' =>$convocatorias,
						'lista_noticias' =>$noticias,
						'lista_documentos' =>$documentos,
						'lista_imagenes'=>$imagenes_slider
			);
		return View::make("contenido",$datos);
			
	}
}
