<?php


class ControlInfoConvocatorias extends Controller {

	public $listaEstadoProyecto=array('Aprobado'=>0,'evaluacion'=>0,'Rechazado'=>0);



	public function CargarInfoPrincipales($id_convocatoria){

		$convocatorias= InvConvocatorias::find($id_convocatoria);


		foreach ($this->listaEstadoProyecto as $keyestado => $integrante) {


			$temporal=$this->ContarProyectosporEstado($id_convocatoria, $keyestado);

			$this->listaEstadoProyecto[$keyestado]=$temporal['count'];
		}

		$datos = array('convocatorias' =>$convocatorias,
						'Lista_estadoproyectos'=>$this->listaEstadoProyecto
		 );

	

		return View::make("inf_convocatorias",$datos);

	}

	public function ContarProyectosporEstado($id_convocatoria, $estado){
		//$id_convocatoria=(string) $id_convocatoria;

		$listaProyectosporEstado=DB::select(DB::raw("select count(*)
					from inv_proyectos
					where  inv_numero_convocatoria='$id_convocatoria' and estado_proyecto=lower(trim('$estado')) ")
					);
		
		if($listaProyectosporEstado && count($listaProyectosporEstado)>0)
		{
			return  array('count'=>$listaProyectosporEstado[0]->count);
		}	

		return array('count'=>0);


	}	
}
