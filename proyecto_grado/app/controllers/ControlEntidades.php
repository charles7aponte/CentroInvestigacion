<?php

class ControlEntidades extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nit=Input::get('nit-entidad');
		$entidad_nombre=Input::get('nombre-entidad');
		$representante=Input::get('representante-entidad');
		$tipo=Input::get('tipo-entidad');
		$descripcion=Input::get('desc-empresa');
		$email_entidad=Input::get('email-entidad');
		$pagina_entidad=Input::get('pagina-entidad');
		$telefono_entidad=Input::get('telefono-entidad');
		$celular_entidad=Input::get('celular-entidad');

		var_dump(Input::all());
	
//$entidad=new InvEntidades();


		/*objeto del modelo*/
		//$entidad=new InvEntidad();
		
		//$entidad->nit_empresa=$nit;
		/*$entidad->nombre_empresa=$entidad_nombre;
		$entidad->descripcion_empresa=$descripcion;
		$entidad->email=$email_entidad;
		$entidad->pagina_web=$pagina_entidad;
		$entidad->representante_legal=$representante;
		$entidad->telefono=$telefono_entidad;
		$entidad->celular=$celular_entidad;
		$entidad->tipo_empresa=$tipo;
		*/

		//$entidad->save();
		}

}
