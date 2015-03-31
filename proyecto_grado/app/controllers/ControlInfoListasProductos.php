<?php

class ControlInfoListasProductos extends Controller {


	//controlador lineas
	public function ConstruirListaIntegrantesProductos($idproducto, $idperfil){

		$productos =InvProductos::find($idproducto);
		$listaintegrantesproductos= array();
		$paginacion="";


		$perfil=InvPerfiles::find($idperfil);

		$listaParticipanteProductos= InvParticipacionProductos::where("inv_codigo_producto","=",$idproducto)->lists('cedula_persona');
		$invPerfil = InvPersonaPerfil::where("codperfil","=",$idperfil)->lists("cedula");

	
		//validamos q tengan elementos 
		if(count($listaParticipanteProductos)>0 && count($invPerfil))
		{
			$listaintegrantesproductos= $listaPersonas = Persona::whereIn("cedula",$listaParticipanteProductos)
							->whereIn("cedula",$invPerfil )	
							->paginate(20);
		}
	

		if(count($listaintegrantesproductos)>0)
		{
			$paginacion=$listaintegrantesproductos->links();

		}
		$datos= array(
			'lista_integrante_producto'=>$listaintegrantesproductos,
			'lista_nombre_productos' =>$productos,
			'registro_perfiles' =>$perfil,
			'links'=>$paginacion
			);


		return View::make('administrador/inf_lista_integrantes_productos',$datos);
	}

}
