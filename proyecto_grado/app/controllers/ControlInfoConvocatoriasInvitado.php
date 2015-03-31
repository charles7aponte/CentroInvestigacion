<?php


class ControlInfoConvocatoriasInvitado extends Controller {

	public $listaEstadoProyecto=array('Aprobado'=>0,'evaluacion'=>0,'Rechazado'=>0);
	public $idestados=array();
	

	public function CargarInfoPrincipales($id_convocatoria){
		
		$convocatorias=InvConvocatorias::where("numero_convocatoria","=",$id_convocatoria)->where("estado1","=","1")->get();
		
		
		if(count($convocatorias)>0){
			$convocatorias=$convocatorias[0];
			
		}


		foreach ($this->listaEstadoProyecto as $keyestado => $integrante) {

				$temporal=$this->ContarProyectosporEstado($id_convocatoria, $keyestado);

				$this->listaEstadoProyecto[$keyestado]=$temporal['count'];
				$this->idestados[$keyestado]=$temporal['estado_proyecto'];
		
			}

			$datos = array('convocatorias'=> $convocatorias,
				           'Lista_estadoproyectos'=> $this->listaEstadoProyecto,  
				           'Lista_estados'=> $this->idestados);


		return View::make("invitado/inf_convocatorias_invitado",$datos);

	}

	public function ContarProyectosporEstado($id_convocatoria, $estado){
		//$id_convocatoria=(string) $id_convocatoria;

		$listaProyectosporEstado=DB::select(DB::raw("select count(*), ip.estado_proyecto
					from inv_proyectos ip
					where ip.inv_numero_convocatoria='$id_convocatoria' and ip.estado_proyecto=lower(trim('$estado'))
					group by ip.estado_proyecto")
					);
		
		if($listaProyectosporEstado && count($listaProyectosporEstado)>0)
		{
			return  array('count'=>$listaProyectosporEstado[0]->count, 'estado_proyecto'=>$listaProyectosporEstado[0]->estado_proyecto);
		}	

		return array('count'=>0, 'estado_proyecto'=>0);


	}	
}
