<?php


class ControlInfoProyectos extends Controller {

	public $listaIntegrantesProyectos=array('Docente' => 0,'Estudiante' => 0,'Joven Investigador'=>0, 'Investigador Externo'=>0 );
	public $idperfiles=array();


	public function CargarInfoPrincipales($id_proyecto){

	$proyectos= InvProyectos::find($id_proyecto);
	$grupos=array();
	$grupos1=array();
	$lineas=array();
	$convocatorias=array();

	if($proyectos)// cuando se usa el find se asegura que se trae 1objeto o null 
	{
		//$proyectos=$proyectos[0];

		$grupos = InvGrupos::where("codigo_grupo","=",$proyectos->inv_codigo_grupo)->get();
		$grupos1= InvGrupos::where("codigo_grupo","=",$proyectos->grupo_auxiliar)->get();
		$lineas=InvLineas::where("id_lineas","=",$proyectos->inv_id_linea)->get();
		$convocatorias=InvConvocatorias::where("numero_convocatoria","=",$proyectos->inv_numero_convocatoria)->get();
		
		if(count($convocatorias)>0)
		{
			$convocatorias=$convocatorias[0];
		}

		if(count($lineas)>0)
		{
			$lineas=$lineas[0];
		}



		if(count($grupos1)>0)
		{
			$grupos1=$grupos1[0];
		}


		if(count($grupos)>0)
		{
			$grupos=$grupos[0];// tomamos el primer objeto
		}



	}
		foreach ($this->listaIntegrantesProyectos as $keyintegrante => $integrante) {


			$temporal=$this->ContarIntegrantes($keyintegrante,$id_proyecto);


			$this->listaIntegrantesProyectos[$keyintegrante]=$temporal['count'];
			$this->idperfiles[$keyintegrante]=$temporal['codperfil'];

		}


		$datos = array('proyectos' =>$proyectos,
						'Lista_integrantes'=>$this->listaIntegrantesProyectos,
						'Lista_perfiles' =>$this->idperfiles,
					    'grupos'  =>$grupos,
					    'grupos_auxiliares'  =>$grupos1,
					    'lineas'  =>$lineas, 
					    'convocatorias' =>$convocatorias 
					);

	
		return View::make("inf_proyectos",$datos);
	}


		//contar cantidad de integrantes
	public function ContarIntegrantes($perfil, $id_proyecto){
	$listaIntegrantesProyectos=DB::select(DB::raw("select count(*), pf.codperfil
				from inv_participacion_proyectos ipp, persona p, personaperfil pp, perfil pf
				where ipp.cedula_persona=p.cedula and p.cedula=pp.cedula and pf.codperfil=pp.codperfil
				and lower(trim(pf.nombreperfil)) like lower('$perfil') and ipp.inv_codigo_proyecto=$id_proyecto
				group by pf.codperfil")
			);

		if($listaIntegrantesProyectos && count($listaIntegrantesProyectos)>0)
		{


			return  array('count'=>$listaIntegrantesProyectos[0]->count, 'codperfil'=>$listaIntegrantesProyectos[0]->codperfil);
		}		

		return array('count'=>0, 'codperfil'=>0);
	}
	
}
