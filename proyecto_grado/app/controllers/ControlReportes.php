<?php

class ControlReportes extends Controller {

	public function CrearReporteGrupos()

	{

		$lista_tipos_grupo=InvTipoGrupos::all();
		$datos_graficas=array();

		foreach ($lista_tipos_grupo as $key => $tipo_grupo) {
			$datos_graficas[$tipo_grupo->tipo_grupo] = $this->grafica_grupos($tipo_grupo->id);

		}
		
		
		$unidadgrupo = $this->consulta_tablagrupos();	
		
		
		$datos = array('reportegrupo' =>$unidadgrupo,
						'graficagrupo' =>$datos_graficas);
		return View::make("administrador/reportes_grupos",$datos);
	}


	public function CrearReporteProyectos($id_periodo=null)
	{

		$graficaproyecto =array();	
		$generarperiodo=InvPeriodos::all();



		$periodo=null;
		if($id_periodo!=null)
		{
			$periodo=InvPeriodos::find($id_periodo);
		}
		else{
			$periodo=$generarperiodo[0];
		}

		$graficaproyecto=$this->grafica_proyecto_lineas($periodo->codigo_periodo);
		$proyectolinea = $this->consulta_tablaproyectos($periodo->codigo_periodo);
					
		$datos = array('reporteproyectos' =>$proyectolinea,
						'generarperiodo'=>$generarperiodo,
						'periodo'=>$periodo,
						'graficaproyecto'=>$graficaproyecto);

		return View::make("administrador/reportes_proyectos",$datos);
	}

	public function CrearReporteProductos($id_periodo=null)

	{
		
		$generarperiodo=InvPeriodos::all();
		$graficaproducto =array();


		$periodo=null;
		if($id_periodo!=null)
		{
			$periodo=InvPeriodos::find($id_periodo);
		}
		else{
			$periodo=$generarperiodo[0];
		}	
		
		$graficaproducto=$this->grafica_producto_subtipo($periodo->codigo_periodo);
		$tablaproductos = $this->consulta_tablaproductos($periodo->codigo_periodo);

		$datos = array('reporteproducto' =>$tablaproductos,
						'generarperiodo'=>$generarperiodo,
						'periodo'=>$periodo,
						'graficaproducto'=>$graficaproducto);
		
		//print_r($datos);
		return View::make("administrador/reporte_productos",$datos);
	}

	public function CrearReporteDocentes()

	{
		$productividaddocente = $this->consulta_productividaddocente();

		$datos = array('reportedocente' =>$productividaddocente);
		//print_r($datos);
		return View::make("administrador/reporte_docentes",$datos);
	}




	public function sql_consultaTablaGrupos(){

			$listaGruposUnidades=DB::select(DB::raw("select ig.nombre_grupo, itg.tipo_grupo, itg.id, trim(nombre1||' '||nombre2||' '||apellido1||' '||apellido2)as nombre_persona,p.cedula,pf.nombreperfil,iua.nombre_unidad
				from inv_grupos ig, inv_tipo_grupos itg, persona p, perfil pf, inv_unidades_academicas iua, personaperfil pp,inv_participacion_grupos ipg
				where itg.id=ig.inv_tipo_grupos 
					and iua.id_unidad=ig.inv_unidad_academica 
					and pf.codperfil=pp.codperfil 
					and p.cedula=pp.cedula 
					and p.cedula=ipg.cedula_persona 
				
					and ig.codigo_grupo=ipg.inv_codigo_grupo 
					and ig.estado_activacion='1' 

				order by ig.nombre_grupo, itg.tipo_grupo"));
	
			return $listaGruposUnidades;
	}


	public function consulta_tablagrupos(){


		$listaGruposUnidades=$this->sql_consultaTablaGrupos();
				
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
			and ig.estado_activacion='1' 
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

	public function grafica_proyecto_lineas($id_periodo){

		$GraficaProyectoLineas=DB::select(DB::raw("select count(*), il.id_lineas,il.nombre_linea,ipa.periodo
			from inv_lineas il, inv_proyectos ip, inv_periodos_academicos ipa
			where il.id_lineas=ip.inv_id_linea 	
				and
				(
				 (ipa.fecha_inicio<=ip.fecha_proyecto and ipa.fecha_fin>=ip.fecha_proyecto)
				  or(ipa.fecha_inicio>=ip.fecha_proyecto and ipa.fecha_fin<=ip.fecha_finproyecto)
			      or(ipa.fecha_inicio>=ip.fecha_finproyecto and ip.fecha_finproyecto<=ipa.fecha_fin and ipa.fecha_inicio<=ip.fecha_finproyecto)
				)
				and ipa.codigo_periodo=$id_periodo

			group by il.id_lineas,il.nombre_linea,ipa.periodo"));
				

		return 	$GraficaProyectoLineas;	
	}

	public function consulta_tablaproyectos($id_periodo){

		$listaProyectoLineas=DB::select(DB::raw("select ip.nombre_proyecto,il.nombre_linea,ipa.periodo,ipa.ano
			from inv_lineas il, inv_proyectos ip, inv_periodos_academicos ipa
			where il.id_lineas=ip.inv_id_linea 	
			and
			(
				(ipa.fecha_inicio<=ip.fecha_proyecto and ipa.fecha_fin>=ip.fecha_proyecto)
				or(ipa.fecha_inicio>=ip.fecha_proyecto and ipa.fecha_fin<=ip.fecha_finproyecto)
			        or(ipa.fecha_inicio>=ip.fecha_finproyecto and ip.fecha_finproyecto<=ipa.fecha_fin and ipa.fecha_inicio<=ip.fecha_finproyecto)
			)

			and ipa.codigo_periodo=$id_periodo"));
						
		return $listaProyectoLineas;		
	}

	public function sql_consulta_tablaproyectos(){

		$listaProyectoLineas=DB::select(DB::raw("select ip.nombre_proyecto,il.nombre_linea,ipa.periodo,ipa.ano
			from inv_lineas il, inv_proyectos ip, inv_periodos_academicos ipa
			where il.id_lineas=ip.inv_id_linea 	
			and
			(
				(ipa.fecha_inicio<=ip.fecha_proyecto and ipa.fecha_fin>=ip.fecha_proyecto)
				or(ipa.fecha_inicio>=ip.fecha_proyecto and ipa.fecha_fin<=ip.fecha_finproyecto)
			        or(ipa.fecha_inicio>=ip.fecha_finproyecto and ip.fecha_finproyecto<=ipa.fecha_fin and ipa.fecha_inicio<=ip.fecha_finproyecto)
			)"));
						
		return $listaProyectoLineas;		
	}

	public function consulta_tablaproductos($id_periodo){

		$listaProductosperiodo=DB::select(DB::raw("select ipa.ano,ipa.periodo,itp.nombre_tipo_producto,isp.nombre_subtipo_producto,ip.codigo_producto,ip.nombre_producto
			from inv_periodos_academicos ipa, inv_tipo_productos itp, inv_subtipo_productos isp, inv_productos ip
			where itp.id_tipo_producto=isp.inv_id_tipo_producto
      			and isp.id_subtipo_producto=ip.inv_subtipo_producto 
      			and fecha_producto >=fecha_inicio
      			and fecha_producto <=fecha_fin
      			and ip.estado_activacion='1'

      			and ipa.codigo_periodo=$id_periodo 

			order by ipa.ano,ipa.periodo,itp.nombre_tipo_producto,isp.nombre_subtipo_producto,ip.codigo_producto,ip.nombre_producto"));
		
		$matrizproductos=array();
		$contador_tipos=array();
		$contador_registros_productos=0;
		$cantidadproductosperiodo=0;


		foreach ($listaProductosperiodo as $key => $agruparproductos)
		{
			if (isset($matrizproductos[$agruparproductos->periodo."-".$agruparproductos->ano])==false){
					$matrizproductos[$agruparproductos->periodo."-".$agruparproductos->ano]=array();
					$cantidadproductosperiodo =0;
					$contador_tipos[$agruparproductos->periodo."-".$agruparproductos->ano]=$cantidadproductosperiodo;
			}
					
			if (isset($matrizproductos[$agruparproductos->periodo."-".$agruparproductos->ano][$agruparproductos->nombre_tipo_producto])==false)
			{

				$matrizproductos[$agruparproductos->periodo."-".$agruparproductos->ano][$agruparproductos->nombre_tipo_producto]=array();
				$contador_registros_productos=0;
			}

			$matrizproductos[$agruparproductos->periodo."-".$agruparproductos->ano][$agruparproductos->nombre_tipo_producto][$contador_registros_productos]["nombre_subtipo_producto"]=$agruparproductos->nombre_subtipo_producto;
			$matrizproductos[$agruparproductos->periodo."-".$agruparproductos->ano][$agruparproductos->nombre_tipo_producto][$contador_registros_productos]["codigo_producto"]=$agruparproductos->codigo_producto;
			$matrizproductos[$agruparproductos->periodo."-".$agruparproductos->ano][$agruparproductos->nombre_tipo_producto][$contador_registros_productos]["nombre_producto"]=$agruparproductos->nombre_producto;
				
			$contador_registros_productos++;	
			$cantidadproductosperiodo++;
			$contador_tipos[$agruparproductos->periodo."-".$agruparproductos->ano]=$cantidadproductosperiodo;
				
		}				

		return array('datos'=>$matrizproductos,
				    'cantidad_productos_periodo'=>$contador_tipos);		
	}

	public function sql_consulta_tablaproductos(){

		$listaProductosperiodo=DB::select(DB::raw("select ipa.ano,ipa.periodo,itp.nombre_tipo_producto,isp.nombre_subtipo_producto,ip.codigo_producto,ip.nombre_producto
			from inv_periodos_academicos ipa, inv_tipo_productos itp, inv_subtipo_productos isp, inv_productos ip
			where itp.id_tipo_producto=isp.inv_id_tipo_producto
      			and isp.id_subtipo_producto=ip.inv_subtipo_producto 
      			and fecha_producto >=fecha_inicio
      			and fecha_producto <=fecha_fin
      			and ip.estado_activacion='1' 

			order by ipa.ano,ipa.periodo,itp.nombre_tipo_producto,isp.nombre_subtipo_producto,ip.codigo_producto,ip.nombre_producto"));
						

		return 	$listaProductosperiodo;	
	}

	public function grafica_producto_subtipo($id_periodo){

		$GraficaProductoPeriodo=DB::select(DB::raw("select ano,periodo, nombre_subtipo_producto, codigo_producto,count(*)
			from (select  distinct ipa.ano,ipa.periodo,itp.nombre_tipo_producto,isp.nombre_subtipo_producto,ip.codigo_producto,ip.nombre_producto
					from inv_periodos_academicos ipa, inv_tipo_productos itp, inv_subtipo_productos isp, inv_productos ip
					where itp.id_tipo_producto=isp.inv_id_tipo_producto
				      and isp.id_subtipo_producto=ip.inv_subtipo_producto 
				      and fecha_producto >=fecha_inicio
				      and fecha_producto <=fecha_fin
				      and codigo_periodo=$id_periodo
				      and ip.estado_activacion='1'  
					order by ipa.ano,ipa.periodo,itp.nombre_tipo_producto,isp.nombre_subtipo_producto,ip.codigo_producto,ip.nombre_producto)as pp

			group by ano,periodo, nombre_subtipo_producto, codigo_producto"));
				

		return 	$GraficaProductoPeriodo;	
	}

	public function sql_consulta_productividaddocente(){

		$listaProductividadDocente=DB::select(DB::raw("select iua.nombre_unidad,p.cedula,trim(nombre1||' '||nombre2||' '||apellido1||' '||apellido2)as nombre_persona,ip.nombre_producto,itp.nombre_tipo_producto,ip.soporte_producto
		from inv_unidades_academicas iua, docente d, persona p,inv_tipo_productos itp,inv_subtipo_productos isp,inv_productos ip,inv_participacion_productos ipp
		where iua.id_unidad=d.unidad_acad 
	      and d.cedula=ipp.cedula_persona
	      and itp.id_tipo_producto=isp.inv_id_tipo_producto
	      and isp.id_subtipo_producto=ip.inv_subtipo_producto
	      and ip.codigo_producto=ipp.inv_codigo_producto
	      and p.cedula=ipp.cedula_persona

		order by iua.nombre_unidad,ip.nombre_producto,itp.nombre_tipo_producto,ip.soporte_producto"));

		return $listaProductividadDocente;
	}

	public function consulta_productividaddocente(){

		$listaProductividadDocente=$this->sql_consulta_productividaddocente();
				
		$matrizdocente=array();
		$contadoresunidad=array();
		$contador_registros_productounidad=0;
		$cantidadproductosunidad=0;

		foreach ($listaProductividadDocente as $key => $reportedocente){
			
				if (isset($matrizdocente[$reportedocente->nombre_unidad])==false){
					$matrizdocente[$reportedocente->nombre_unidad]=array();
					$cantidadproductosunidad=0;
					$contadoresunidad[$reportedocente->nombre_unidad]=$cantidadproductosunidad;	
				}
					
				if (isset($matrizdocente[$reportedocente->nombre_unidad][$reportedocente->cedula])==false)
				{

				$matrizdocente[$reportedocente->nombre_unidad][$reportedocente->cedula]=array();
				$contador_registros_productounidad=0;
				}

				$matrizdocente[$reportedocente->nombre_unidad][$reportedocente->cedula][$contador_registros_productounidad]["nombre_persona"]=$reportedocente->nombre_persona;
				$matrizdocente[$reportedocente->nombre_unidad][$reportedocente->cedula][$contador_registros_productounidad]["nombre_producto"]=$reportedocente->nombre_producto;
				$matrizdocente[$reportedocente->nombre_unidad][$reportedocente->cedula][$contador_registros_productounidad]["nombre_tipo_producto"]=$reportedocente->nombre_tipo_producto;
				$matrizdocente[$reportedocente->nombre_unidad][$reportedocente->cedula][$contador_registros_productounidad]["soporte_producto"]=$reportedocente->soporte_producto;

				$contador_registros_productounidad++;	
				$cantidadproductosunidad++;
				$contadoresunidad[$reportedocente->nombre_unidad]=$cantidadproductosunidad;

		}
		
		return array('datos'=>$matrizdocente,
				    'cantidad_productos_docente'=>$contadoresunidad);	
	}	
}