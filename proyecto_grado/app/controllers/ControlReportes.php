<?php

class ControlReportes extends Controller {

	public function CrearReporteGrupos()

	{

		$lista_tipos_grupo=InvTipoGrupos::all();
		$datos_graficas=array();

		foreach ($lista_tipos_grupo as $key => $tipo_grupo) {
			$datos_graficas[$tipo_grupo->tipo_grupo] = $this->grafica_grupos($tipo_grupo->id);

		}
		
		
		$unidadgrupo = $this->consulta_tabla1();	
		
		
		$datos = array('reportegrupo' =>$unidadgrupo,
						'graficagrupo' =>$datos_graficas);
		return View::make("administrador/reportes_grupos",$datos);
	}


	public function CrearReporteProyectos()
	{

		$proyectolinea = $this->consulta_tablaproyectos();	
		
		
		$datos = array('reporteproyecto' =>$proyectolinea);
		return View::make("administrador/reportes_proyectos",$datos);
	}

	public function consulta_tabla1(){

		$listaGruposUnidades=DB::select(DB::raw("select ig.nombre_grupo, itg.tipo_grupo, itg.id, trim(nombre1||' '||nombre2||' '||apellido1||' '||apellido2)as nombre_persona,p.cedula,pf.nombreperfil,iua.nombre_unidad
		from inv_grupos ig, inv_tipo_grupos itg, persona p, perfil pf, inv_unidades_academicas iua, personaperfil pp,inv_participacion_grupos ipg
		where itg.id=ig.inv_tipo_grupos 
			and iua.id_unidad=ig.inv_unidad_academica 
			and pf.codperfil=pp.codperfil 
			and p.cedula=pp.cedula 
			and p.cedula=ipg.cedula_persona 
		
			and ig.codigo_grupo=ipg.inv_codigo_grupo 

		order by ig.nombre_grupo, itg.tipo_grupo"));
				
		$matrizgrupos=array();
		$contador_filas_grupo=0;

		$conta=1;
		foreach ($listaGruposUnidades as $key => $reportegrupos){
			
				if (isset($matrizgrupos[$reportegrupos->nombre_grupo])==false){
					$matrizgrupos[$reportegrupos->nombre_grupo]=array();
					$contador_filas_grupo=0;
				}
					
				if (isset($matrizgrupos[$reportegrupos->nombre_grupo][$reportegrupos->tipo_grupo])==false)
				{

				$matrizgrupos[$reportegrupos->nombre_grupo][$reportegrupos->tipo_grupo]=array();
				$conta=0;
				}

				$matrizgrupos[$reportegrupos->nombre_grupo][$reportegrupos->tipo_grupo][$conta]["nombre_persona"]=$reportegrupos->nombre_persona;
				$matrizgrupos[$reportegrupos->nombre_grupo][$reportegrupos->tipo_grupo][$conta]["cedula"]=$reportegrupos->cedula;
				$matrizgrupos[$reportegrupos->nombre_grupo][$reportegrupos->tipo_grupo][$conta]["nombreperfil"]=$reportegrupos->nombreperfil;
				$matrizgrupos[$reportegrupos->nombre_grupo][$reportegrupos->tipo_grupo][$conta]["nombre_unidad"]=$reportegrupos->nombre_unidad;
				$conta++;
				$contador_filas_grupo++;

				$matrizgrupos[$reportegrupos->nombre_grupo]["mi_#contador"]=$contador_filas_grupo;
		}
		
		return $matrizgrupos;		
	}

	public function grafica_grupos($id_tipogrupo){

		$GraficaGruposUnidades=DB::select(DB::raw("select  itg.tipo_grupo,pf.nombreperfil,iua.nombre_unidad, count(*)
		from inv_grupos ig, inv_tipo_grupos itg, persona p, perfil pf, inv_unidades_academicas iua, personaperfil pp,inv_participacion_grupos ipg
		where itg.id=ig.inv_tipo_grupos 
			and iua.id_unidad=ig.inv_unidad_academica 
			and pf.codperfil=pp.codperfil 
			and p.cedula=pp.cedula 
			and p.cedula=ipg.cedula_persona 	
			and ig.codigo_grupo=ipg.inv_codigo_grupo
			and itg.id=$id_tipogrupo
		group by  itg.tipo_grupo,pf.nombreperfil,iua.nombre_unidad"));
				
		$graficagrupos=array();
		$lista_unidades=array();

		//lista de unidades
		foreach ($GraficaGruposUnidades as $key => $graficareportegrupos){
			$lista_unidades[]=$graficareportegrupos->nombre_unidad;
		}


		$lista_unidades=array_unique($lista_unidades);

		//principio degeneracion de matriz
		foreach ($GraficaGruposUnidades as $key => $graficareportegrupos){
			
				if (isset($graficagrupos[$graficareportegrupos->nombreperfil])==false){
					$graficagrupos[$graficareportegrupos->nombreperfil]=array();
				}
					
				$graficagrupos[$graficareportegrupos->nombreperfil][$graficareportegrupos->nombre_unidad]= $graficareportegrupos->count;
		}

		foreach ($graficagrupos as $key => $graficareportegrupos){

					foreach ($lista_unidades as  $unidad){
						if(isset($graficagrupos[$key][$unidad])==false)
						{
						$graficagrupos[$key][$unidad]=0;	
						}

					}

		}	
		return $graficagrupos;		
	}

	/*public function grafica_proyecto_lineas($id_periodo){

		$GraficaProyectoLineas=DB::select(DB::raw("select count(*), il.id_lineas,il.nombre_linea,ipa.periodo
			from inv_lineas il, inv_proyectos ip, inv_periodos_academicos ipa
			where il.id_lineas=ip.inv_id_linea 	
				and ipa.fecha_inicio<=ip.fecha_proyecto 
				and ipa.fecha_fin>=ip.fecha_proyecto

				group by il.id_lineas,il.nombre_linea,ipa.periodo"));
				
		//////////////////////////////////////////////
		$graficagrupos=array();
		$lista_unidades=array();

		//lista de unidades
		foreach ($GraficaGruposUnidades as $key => $graficareportegrupos){
			$lista_unidades[]=$graficareportegrupos->nombre_unidad;
		}


		$lista_unidades=array_unique($lista_unidades);

		//principio degeneracion de matriz
		foreach ($GraficaGruposUnidades as $key => $graficareportegrupos){
			
				if (isset($graficagrupos[$graficareportegrupos->nombreperfil])==false){
					$graficagrupos[$graficareportegrupos->nombreperfil]=array();
				}
					
				$graficagrupos[$graficareportegrupos->nombreperfil][$graficareportegrupos->nombre_unidad]= $graficareportegrupos->count;
		}



		foreach ($graficagrupos as $key => $graficareportegrupos){

					foreach ($lista_unidades as  $unidad){
						if(isset($graficagrupos[$key][$unidad])==false)
						{
						$graficagrupos[$key][$unidad]=0;	
						}

					}

		}

	
		return $graficagrupos;		
	}

	*/
	public function consulta_tablaproyectos(){

		$listaProyectoLineas=DB::select(DB::raw("select ip.nombre_proyecto,il.nombre_linea,ipa.periodo
			from inv_lineas il, inv_proyectos ip, inv_periodos_academicos ipa
			where il.id_lineas=ip.inv_id_linea 	
			and ipa.fecha_inicio<=ip.fecha_proyecto 
			and ipa.fecha_fin>=ip.fecha_proyecto"));
				
		$matrizproyectos=array();

		foreach ($listaProyectoLineas as $key => $reporteproyectos){
			
				if (isset($matrizproyectos[$reporteproyectos->nombre_proyecto])==false){
					$matrizproyectos[$reporteproyectos->nombre_proyecto]=array();
				}
					
				if (isset($matrizproyectos[$reporteproyectos->nombre_proyecto][$reporteproyectos->nombre_linea])==false)
				{

				$matrizproyectos[$reporteproyectos->nombre_proyecto][$reporteproyectos->nombre_linea]=array();
				}
				$matrizproyectos[$reporteproyectos->nombre_proyecto][$reporteproyectos->nombre_linea]["periodo"]=$reporteproyectos->periodo;
		}
		
		return $matrizproyectos;		
	}
}