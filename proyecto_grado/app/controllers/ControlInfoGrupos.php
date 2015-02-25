<?php


class ControlInfoGrupos extends Controller {
	
	public $listaIntegrantesGrupos=array('Docente' => 0,'Estudiante' => 0,'Joven Investigador'=>0, 'Investigador Externo'=>0 );

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_grupo){

		// recibimos el id con la variable de arriba
		
		$grupos= InvGrupos::find($id_grupo)	;

		$persona = Persona::where("cedula","=",$grupos->director_grupo)->get();
		$persona=$persona[0];

		$tipo = InvTipoGrupos::where("id","=",$grupos->inv_tipo_grupos)->get();
		$tipo=$tipo[0];

		$grupos->nombre_director=$persona->nombre1." ".$persona->apellido1." ".$persona->apellido2;
		
		$grupos->tipo_grupo_="No definido. ";
		$grupos->tipo_grupo_band=0;

		if($tipo->estado==1){
			$grupos->tipo_grupo_=$tipo->tipo_grupo;	
			$grupos->tipo_grupo_band=1;
		} 
	
		
		///

		foreach ($this->listaIntegrantesGrupos as $keyintegrante => $integrante) {


			
			$this->listaIntegrantesGrupos[$keyintegrante]=$this->ContarIntegrantes($keyintegrante,$id_grupo);
		}


		$lineas_grupos= $this->Lineasporgrupos($id_grupo);
		$datos = array('grupos' =>$grupos,
					   'Lineas_grupos' =>$lineas_grupos,
					   'Lista_integrantes'=>$this->listaIntegrantesGrupos
			);
	return View::make("inf_grupos",$datos);

	}

	//consulta lineas por grupos
	public function Lineasporgrupos($id_grupo){	
		$listaLineasGrupos=	DB::select(DB::raw("select id_lineas, nombre_linea
				from inv_lineas il, inv_linea_grupos  ilg, inv_grupos ig
				where ilg.inv_codigo_grupo=$id_grupo and ilg.inv_codigo_grupo=ig.codigo_grupo and ilg.inv_id_linea=il.id_lineas;")
			);
		return $listaLineasGrupos;
	}

	//contar cantidad de integrantes
	public function ContarIntegrantes($perfil, $id_grupo){
	$listaIntegrantesGrupos=DB::select(DB::raw("select count(*) 
				from persona ps,perfil pf, personaperfil pp, inv_participacion_grupos ipg,
				inv_grupos ig
				where pp.codperfil=pf.codperfil and 
				ps.cedula=pp.cedula and ipg.cedula_persona=ps.cedula and ig.codigo_grupo=ipg.inv_codigo_grupo
				and lower(trim(nombreperfil))  like lower('$perfil') and ipg.inv_codigo_grupo=$id_grupo;")
			);

		if($listaIntegrantesGrupos && count($listaIntegrantesGrupos)>0)
		{
			return $listaIntegrantesGrupos[0]->count; 
		}		

		return 0;
	}

	
}
