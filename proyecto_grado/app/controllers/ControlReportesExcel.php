<?php

class ControlReportesExcel extends Controller {

	public function GenerarReporteTablas()
	{
		Excel::create('reportegrupos',function($excel){
			$excel->sheet('reportegrupos',function($sheet){
				$data=[];

				$controlReportes=new ControlReportes();

				$registros=$controlReportes->sql_consultaTablaGrupos();

				array_push($data,array('Grupo',	'Tipo Grupo'	,'N° Identificación'	,'Nombre Persona',	'Perfil',	'Unidad Acádemica'));
				foreach ($registros as $key => $registro) {
					array_push($data,array($registro->nombre_grupo,$registro->tipo_grupo, $registro->nombre_persona, $registro->cedula, $registro->nombreperfil, $registro->nombre_unidad));
				}

				//encabezado
				$sheet->cells('B2:G2',function($cells){
					$cells->setBackground('#5972FF');
					$cells->setFontcolor('#FFFFFF');

				});	



				//cuerpo de datos
				$sheet->cells('B3:G'.(count($data)+1).'',function($cells){
					$cells->setBackground('#F5F5F5');
					$cells->setAlignment('center');
					$cells->setValignment('middle');
					//$cells->setFontcolor('#FFFFFF');

				});	

				
				$sheet->fromArray($data,null,'B2',false,false);
			});
		})->download('xlsx');
	}	

	public function GenerarReporteTablaProyectos()
	{
		Excel::create('reporteproyectos',function($excel){
			$excel->sheet('reporteproyectos',function($sheet){
				$data=[];

				$controlReportes=new ControlReportes();

				$registros=$controlReportes->sql_consulta_tablaproyectos();

				array_push($data,array('Proyecto',	'Nombre Linea'	,'Periodo'));
				foreach ($registros as $key => $registro) {
					array_push($data,array($registro->nombre_proyecto,$registro->nombre_linea, $registro->periodo."-". $registro->ano));
				}

				//encabezado
				$sheet->cells('B2:D2',function($cells){
					$cells->setBackground('#5972FF');
					$cells->setFontcolor('#FFFFFF');

				});	


				//cuerpo de datos
				$sheet->cells('B3:D'.(count($data)+1).'',function($cells){
					$cells->setBackground('#F5F5F5');
					$cells->setAlignment('center');
					$cells->setValignment('middle');
					//$cells->setFontcolor('#FFFFFF');

				});	

				
				$sheet->fromArray($data,null,'B2',false,false);
			});
		})->download('xlsx');
	}	

	public function GenerarReporteTablaProductos()
	{
		Excel::create('reporteproductos',function($excel){
			$excel->sheet('reporteproductos',function($sheet){
				$data=[];

				$controlReportes=new ControlReportes();

				$registros=$controlReportes->sql_consulta_tablaproductos();

				array_push($data,array('Periodo Académico',	'Tipo Producto'	,'Subtipo Producto', 'Id Producto', 'Nombre Producto'));
				foreach ($registros as $key => $registro) {
					array_push($data,array($registro->periodo."-". $registro->ano,$registro->nombre_tipo_producto,$registro->nombre_subtipo_producto,$registro->codigo_producto,$registro->nombre_producto));
				}

				//encabezado
				$sheet->cells('B2:F2',function($cells){
					$cells->setBackground('#5972FF');
					$cells->setFontcolor('#FFFFFF');

				});	
	

				//cuerpo de datos
				$sheet->cells('B3:F'.(count($data)+1).'',function($cells){
					$cells->setBackground('#F5F5F5');
					$cells->setAlignment('center');
					$cells->setValignment('middle');
					//$cells->setFontcolor('#FFFFFF');

				});	

				
				$sheet->fromArray($data,null,'B2',false,false);
			});
		})->download('xlsx');
	}	

	public function GenerarReporteTablaDocentes()
	{
		Excel::create('reportedocente',function($excel){
			$excel->sheet('reportedocente',function($sheet){
				$data=[];

				$controlReportes=new ControlReportes();

				$registros=$controlReportes->sql_consulta_productividaddocente();

				array_push($data,array('Unidad Académica',	'Cédula'	,'Nombre Docente', 'Nombre Producto', 'Tipo Producto','Soporte Producto'));
				foreach ($registros as $key => $registro) {
					array_push($data,array($registro->nombre_unidad, $registro->cedula,$registro->nombre_persona,$registro->nombre_producto,$registro->nombre_tipo_producto,$registro->soporte_producto));
				}

				//encabezado
				$sheet->cells('B2:G2',function($cells){
					$cells->setBackground('#5972FF');
					$cells->setFontcolor('#FFFFFF');

				});		

				//cuerpo de datos
				$sheet->cells('B3:G'.(count($data)+1).'',function($cells){
					$cells->setBackground('#F5F5F5');
					$cells->setAlignment('center');
					$cells->setValignment('middle');
					//$cells->setFontcolor('#FFFFFF');

				});	

				
				$sheet->fromArray($data,null,'B2',false,false);
			});
		})->download('xlsx');
	}	
}