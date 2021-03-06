@extends('administrador.panel_admin')

@section('css-nuevos')
<link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">
<style>
	.contenedor_grafica_lineas{
	  background: #eee;
	  display: inline-block;
	  width: 350px;
	  height: 350px;
	  margin-right: 30px;
	  margin-left: 60px;
	  margin-bottom: 20px;"
	}
</style>
@stop


@section('javascript-nuevos')

	<script src="{{URL::to('js/Chart.js')}}" type="text/javascript"></script>

	<script>

	<?php 
		$contador=0; 

		$titulo=array();

	?>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};


	window.onload = function(){

		@foreach($graficagrupo as $key1 => $tipogrupo)

			<?php 
				$contador_perfiles=0;
				$titulo[]=$key1;
			?>

		var barChartData{{$contador}} = {
				labels : [
					@foreach($tipogrupo as $fila_perfil)
						@foreach($fila_perfil as $key_nombre_unidad => $unidad_valor)

							"{{$key_nombre_unidad}}",
						@endforeach
						<?php 
							break;
						?>
					@endforeach
				], 

			datasets : [

				@foreach($tipogrupo as $key_nombre_perfil =>$fila_perfil)
					
					{
						label:"{{$key_nombre_perfil}}".trim(),
						fillColor :getColor({{$contador_perfiles}}),
						strokeColor : "rgba(220,220,220,0.8)",
						highlightFill: getColor({{$contador_perfiles}}),
						highlightStroke: "rgba(220,220,220,1)",
						data : [
								@foreach($fila_perfil as $key_nombre_unidad => $unidad_valor)
									{{$unidad_valor}},
								@endforeach								
							]
						},

						<?php 
						$contador_perfiles++;
						?>
				 @endforeach
				
			]
			
		
		}
		
		var optiones{{$contador}}={
		responsive : true,
		animation: true,
	    barValueSpacing : 5,
  	    barDatasetSpacing : 1,
	    tooltipFillColor: "rgba(0,0,0,0.8)",                
 	    multiTooltipTemplate: "perfil: <%= datasetLabel %>  cantidad:<%= value %>"
			
		};
		
		
		
			var ctx{{$contador}} = document.getElementById("canvas{{$contador}}").getContext("2d");
			window.myBar{{$contador}} = new Chart(ctx{{$contador}}).Bar(barChartData{{$contador}}, optiones{{$contador}});
			
				<?php
					$contador++;
				?>

		
		@endforeach
	}
	</script>


@stop



@section('cuerpo') 
	<div>
		@if(count($reportegrupo)>0)
		<div id="titulo-productividad" id="cuadro">		  
          <h2 style="text-align:center;
			  padding-right: 30px;
			  padding-top: 10px;
			  font-family: Arial, Helvetica, sans-serif;
			  font-size: 35px;
			  color: #122d3e;
			  font-weight: bold;
			  margin-right: 30px;
			  margin-left: 30px;
			  text-shadow: 1px 1px 1px #AFEEEE;
			  background: none repeat scroll 0 0 #F3F3F3;
			  border-radius: 5px;
			  border-bottom: 1px solid #DCDCDC;
			  width: auto;">Productividad de los Investigadores Docentes, seg&uacute;n la Unidad Acad&eacute;mica a la que pertenecen.</h2>
    	</div>

    <fieldset>

    	@for($i=0; $i<$contador;$i++)
	    	<div style="margin-left:30px; margin-top:60px;">
	    		<label>{{$titulo[$i]}}</label>
	    		<canvas id="canvas{{$i}}" heigth="600" width="600">
	    	</div>
	    @endfor

	    <div id="boton-descargar-excel">
	    	<a type="button" class="btn btn-primary btn-lg active" href="{{URL::to('reporte/generar/excel/reportegrupos/')}}" style="position: relative;
			  top: 51px;
			  left: 851px;
			  padding: 5px;
			  color: #1A6D71;
			  font-weight: bold;
			  font-size: 15px;
			  background-color:#DFECF7;
	    	  border-color: #95A1AB;"><li class="glyphicon glyphicon-download-alt"></li>Descargar</a>
	    </div>
   		<div id="tabla-tabulados" style="margin-top:60px;margin-left:88px; margin-right:67px;">
   			<table class="table table-bordered table-hover">
    			<thead  style="border-radius: 5px; background: #1A6D71;
		                background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
		                background: -moz-linear-gradient(top,#1A6D71,#122d3e);
		                background: -o-linear-gradient(top,#1A6D71,#122d3e);  
		                background: linear-gradient(to bottom,#1A6D71,#122d3e);  
		                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">
        			<tr>
			            <th>Grupo</th>
			            <th>Tipo Grupo</th>
			            <th>N° Identificaci&oacute;n</th>
			            <th>Nombre Persona</th>
			            <th>Perfil</th>
			            <th>Unidad Ac&aacute;demica</th>
        			</tr>
    			</thead>
    			<tbody>	


    				<?php 
    					$ke1_ant_grupo="";
    					$ke2_ant_tipo_grupo="";
    					$cambio_grupo=1;
    				?>

    				@foreach($reportegrupo as $key1 =>$datostabuladosgrupos)



    					@foreach($datostabuladosgrupos as $key2 =>$datostabuladostipos)
	    			

	        				@for($i=0; $i<count($datostabuladostipos);$i++)
			    				
			    				@if($key2!="mi_#contador")
				    				<tr>
				    					@if($ke1_ant_grupo!=$key1)
					        				<td rowspan="{{$datostabuladosgrupos['mi_#contador']}}">
					        					{{$key1}}
					        				</td>

					        				<?php $ke1_ant_grupo=$key1;
					        					$cambio_grupo=1;
					        				 ?>
				        				@endif


				        				@if($cambio_grupo==1 || $ke2_ant_tipo_grupo!=$key2)
					        				<td rowspan="{{count($datostabuladostipos)}}">
					        					{{$key2}}
					        				</td>

					        				<?php 
					        					$ke2_ant_tipo_grupo=$key2;
					        					$cambio_grupo=0;
					        				?>
				        				@endif

				        				<td>{{$datostabuladostipos[$i]['cedula']}}</td>
				        				<td>{{$datostabuladostipos[$i]['nombre_persona']}}</td>
				        				<td>{{$datostabuladostipos[$i]['nombreperfil']}}</td>
				        				<td>{{$datostabuladostipos[$i]['nombre_unidad']}}</td>

				        			</tr>
				        		@endif	
		        			@endfor
						@endforeach

        			@endforeach

    			</tbody>
			</table>
    	</div>
    </fieldset>
    @else
    <h2 style="font-family: Arial, Helvetica, sans-serif;
			  font-size: 15px; border-radius: 5px;
			  border-bottom: 1px solid #F87982;
			  font-weight: bold;
			  margin-left: 30px;
			  margin-right: 640px;
			  background: none repeat scroll 0 0 #F87982;
			  padding-top: 5px;
  			  padding-bottom: 5px;
  			  padding-left: 10px;
  			  color: white;">No se encuentran productos Asignados</h2>
    @endif
</div>	
@stop
