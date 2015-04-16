<?php


class ControlInfoEventosNoticiasInvitado extends Controller {

	public function CargarInfoPrincipales($id_evento){
		
		$eventos_noticias=InvEventosNoticias::where("id_evento","=",$id_evento)->get();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();
		$unidades_academicas=InvUnidadesAcademicas::all();
		
		if(count($eventos_noticias)>0){$eventos_noticias=$eventos_noticias[0];}

		$datos = array('info_eventos'=> $eventos_noticias,
					   'lista_documentos' =>$documentos,
					   'lista_unidades'=>$unidades_academicas);

		return View::make("invitado/inf_eventos_noticias_invitado",$datos);
	}	
}
