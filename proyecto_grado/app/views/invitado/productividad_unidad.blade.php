@extends('panel_cuerpo')

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
	    $contador=1;

	    $contador_subtipos=0;
	    $titulos= array();
    ?>

	window.onload = function(){
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

		@foreach($unidadproducto as $key1 => $unidaproductividad1)	

			var barChartData{{$contador}} = {
				labels : [" "],

				datasets : [
					@foreach($unidaproductividad1 as $key2 => $valor)
				
						{
							label:"{{$key2}}",
							fillColor : getColor({{$contador_subtipos}}),
							strokeColor : "rgba(220,220,220,0.8)",
							highlightFill: getColor({{$contador_subtipos}}),
							highlightStroke: "rgba(220,220,220,1)",
							data : [{{$valor}}]
							},

							<?php 
								$contador_subtipos++;
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
			   multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
				
			};
			
			
				var ctx{{$contador}} = document.getElementById("canvas{{$contador}}").getContext("2d");
				window.myBar{{$contador}} = new Chart(ctx{{$contador}}).Bar(barChartData{{$contador}}, optiones{{$contador}});
						



				<?php
					$contador++;
					$titulos[]=$key1; 
				?>

			@endforeach
	}

	</script>

@stop



@section('contenido-principal') 

	<div>
		<div id="titulo-productividad" id="cuadro" style="text-align:right;
  			padding-right: 30px;
  			padding-top: 10px;
  			font-family:Arial, Helvetica, sans-serif;
  			font-size: 35px;
  			color: #B40404;
  			font-weight: bold;

  			margin-right: 30px;
  			margin-left: 30px;
  			text-shadow: 1px 1px 1px #860808;
  			background: none repeat scroll 0 0 #F3F3F3;
  			border-radius: 5px;
  			border-bottom: 1px solid #DCDCDC;
 			width: auto;
 			margin-top:30px;"> 
          <h2>Productividad Por Unidad Ac&aacute;demica</h2>
    	</div>

    <fieldset>

   			@for($i=1; $i<$contador;$i++)
		        <div id="grafica-producto{{$i}}"  style="height:100%;" class="contenedor_grafica_lineas">
		        	<div>
            			<h2 style="font-size: 20px;
						  padding-left: 20px;
						  font-family: Arial, Helvetica, sans-serif;
						  font-weight: bold;
						  text-align: center;">{{$titulos[$i-1]}}</h2>
          			</div>
		          	<canvas id="canvas{{$i}}" class="grafica_lineas"></canvas>
		        </div>
		    @endfor


   		<div id="tabla-tabulados" style="margin-top:30px;margin-left:130px; margin-right:130px;">
   			<table class="table table-bordered table-hover">
    			<thead>
        			<tr style="background:#FE2945">
			            <th>Tipos</th>
			            <th>Subtipos</th>
			            <th>Cantidad</th>
        			</tr>
    			</thead>
    			<tbody style="background:#FEF6C7">
    				<?php
    					$contador_tipos=0;
    					$contador_subtipos=0;
    				?>
    				
        			<tr>
        				@foreach($unidadproducto as $key1 =>$datostabulados)

							<?php  
        						$contador_subtipos=0;
        					?>

        					@foreach($datostabulados as $key2 => $cantidad)
        						<tr>
        							@if($contador_subtipos==0)
        								<td rowspan="{{count($datostabulados)}}">{{$key1}}</td>
        							@endif

        							<td>{{$key2}}</td>
        							<td>{{$cantidad}}</td>		
        						</tr>

	        					<?php  
	        						$contador_subtipos++;
	        					?>		
        					@endforeach

        					<?php  
        						$contador_tipos++;
        					?>
        				@endforeach
        			</tr>
    			</tbody>
			</table>
    	</div>
    </fieldset>

</div>	
@stop
