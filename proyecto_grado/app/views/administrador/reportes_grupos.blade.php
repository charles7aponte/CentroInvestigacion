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
		<div id="titulo-productividad" id="cuadro" style="text-align:right;
  			padding-right: 30px;
	  		padding-top: 10px;
	  		font-family:Arial, Helvetica, sans-serif;
	 		font-size: 35px;
	  		color: #1c7e84;
	  		font-weight: bold;

	  		margin-right: 30px;
	  		margin-left: 30px;
	  		text-shadow: 1px 1px 1px #AFEEEE;
	  		text-transform: uppercase;
			background: none repeat scroll 0 0 #F3F3F3;
	  		border-radius: 5px;
	  		border-bottom: 1px solid #DCDCDC;
			width: auto;
	 		margin-top:30px;">  
          <h2>Productividad de Investigadores, Seg&uacute;n la Unidad Acad&eacute;mica</h2>
    	</div>

    <fieldset>

    	@for($i=0; $i<$contador;$i++)
	    	<div style="width:100%">
	    		<label>{{$titulo[$i]}}</label>
	    		<canvas id="canvas{{$i}}" heigth="600" width="600">
	    	</div>
	    @endfor
   		<div id="tabla-tabulados" style="margin-top:30px;margin-left:130px; margin-right:130px;">
   			<table class="table table-bordered table-hover">
    			<thead>
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

</div>	
@stop
