<?php


class ControlInfoGruposInvitado extends Controller {
	
	public $listaIntegrantesGrupos=array('Docente' => 0,'Estudiante' => 0,'Joven Investigador'=>0, 'Investigador Externo'=>0 );
	public $idperfiles=array();

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CargarInfoPrincipales($id_grupo){

		// recibimos el id con la variable de arriba
		
		$grupos= InvGrupos::find($id_grupo)	;
		$unidades=array();
		 if($grupos)
		 {
		 	
			$persona = Persona::where("cedula","=",$grupos->director_grupo)->get();
			$persona=$persona[0];

			$tipo = InvTipoGrupos::where("id","=",$grupos->inv_tipo_grupos)->get();
			$tipo=$tipo[0];

			$grupos->nombre_director=$persona->nombre1." ".$persona->nombre2." ".$persona->apellido1." ".$persona->apellido2;
			
			$grupos->tipo_grupo_="No definido";
			$grupos->tipo_grupo_band=0;

			$unidades=InvUnidadesAcademicas::where("id_unidad","=",$grupos->inv_unidad_academica)->get();

			if($tipo->estado==1){
				$grupos->tipo_grupo_=$tipo->tipo_grupo;	
				$grupos->tipo_grupo_band=1;
			} 
		
		 }
		

		foreach ($this->listaIntegrantesGrupos as $keyintegrante => $integrante) {


			$temporal=$this->ContarIntegrantes($keyintegrante,$id_grupo);


			$this->listaIntegrantesGrupos[$keyintegrante]=$temporal['count'];
			$this->idperfiles[$keyintegrante]=$temporal['codperfil'];

		}


		//traer subtipo por grupo
		$productos=InvSubtipoProductos::all();

		foreach ($productos as $keyproducto => $producto) {
			//$this->Contarproductos($producto->id_subtipo_producto,$id_grupo);

			$total_productos=$this->Contarproductos($producto->id_subtipo_producto,$id_grupo);
			$productos[$keyproducto]->total = $total_productos; 			

		}

		$lineas_grupos= $this->Lineasporgrupos($id_grupo);
		$proyectos_grupos= $this->ContarProyectos($id_grupo);
		
		$datos = array('grupos' =>$grupos,
					   'Lineas_grupos' =>$lineas_grupos,
					   'Lista_integrantes'=>$this->listaIntegrantesGrupos,
					   'Lista_perfiles'=> $this->idperfiles,
					   'Lista_productos' =>$productos,
					   'Lista_proyectos' =>$proyectos_grupos,
					   'Lista_unidades' =>$unidades
			);


	return View::make("invitado/inf_grupos_invitado",$datos);

	}

	//consulta lineas por grupos
	public function Lineasporgrupos($id_grupo){	
		$listaLineasGrupos=	DB::select(DB::raw("select id_lineas, nombre_linea
				from inv_lineas il, inv_linea_grupos  ilg, inv_grupos ig
				where ilg.inv_codigo_grupo=$id_grupo and ilg.inv_codigo_grupo=ig.codigo_grupo and ilg.inv_id_linea=il.id_lineas and il.estado='1';")
			);
		return $listaLineasGrupos;
	}

	//contar cantidad de integrantes
	public function ContarIntegrantes($perfil, $id_grupo){
	$listaIntegrantesGrupos=DB::select(DB::raw("select count(*), pf.codperfil
				from inv_participacion_grupos ipg, persona p, personaperfil pp, perfil pf
				where ipg.cedula_persona=p.cedula and p.cedula=pp.cedula and pf.codperfil=pp.codperfil
				and lower(trim(pf.nombreperfil)) like lower('$perfil') and ipg.inv_codigo_grupo=$id_grupo
				group by pf.codperfil")
			);

		if($listaIntegrantesGrupos && count($listaIntegrantesGrupos)>0)
		{


			return  array('count'=>$listaIntegrantesGrupos[0]->count, 'codperfil'=>$listaIntegrantesGrupos[0]->codperfil);
		}		

		return array('count'=>0, 'codperfil'=>0);
	}

	//contar cantidad de prodcutos por grupo
	public function Contarproductos($subtipo,$id_grupo){
		$listaProductosGrupos=DB::select(DB::raw("select count(*)
				from inv_productos ip, inv_subtipo_productos isp
				where ip.inv_subtipo_producto=isp.id_subtipo_producto and ip.inv_subtipo_producto=$subtipo
				and ip.inv_codigo_grupo=$id_grupo;")
		);

		if($listaProductosGrupos && count($listaProductosGrupos)>0){
			return $listaProductosGrupos[0]->count;
		}

		return 0;
	}

	//contar cantidad de proyectos por grupo
	public function ContarProyectos($id_grupo){
		$listaProyectosGrupos=DB::select(DB::raw("select count(*) 
			from inv_proyectos ip, inv_grupos ig
			where ip.inv_codigo_grupo=ig.codigo_grupo
			and ig.codigo_grupo=$id_grupo")
			);

		if($listaProyectosGrupos && count($listaProyectosGrupos)>0){
			return $listaProyectosGrupos[0]->count;
		}

		return 0;
	}
	
}
