<?php


class ControlInfoEventosNoticias extends Controller {


	public function CargarInfoPrincipales($id_evento){
		
		$eventos_noticias=InvEventosNoticias::where("id_evento","=",$id_evento)->get();
		
		
		if(count($eventos_noticias)>0){
			$eventos_noticias=$eventos_noticias[0];	
		}

		$datos = array('info_eventos'=> $eventos_noticias);
		return View::make("invitado/inf_eventos_noticias_invitado",$datos);

	}

	
}
