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
    ?>

		window.onload = function(){

		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

		@foreach($unidadproducto as $key1 => $unidaproductividad1)	


			var barChartData{{$contador}} = {
				labels : ["{{$key1}}"],

				datasets : [
					@foreach($unidaproductividad1 as $key2 => $valor)
				
						{
							label:"{{$key2}}",
							fillColor : "rgba(220,220,220,0.5)",
							strokeColor : "rgba(220,220,220,0.8)",
							highlightFill: "rgba(220,220,220,0.75)",
							highlightStroke: "rgba(220,220,220,1)",
							data : [{{$valor}}]
							},
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
  			font-family:Arial, Helvetica, sans-serif;;
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
    	<!--	<div style="width:700px; height:400px; background:red; margin-left:130px;margin-top:30px;">
    			<canvas id="canvas" height="450" width="600"></canvas>
   			</div>
   		-->

   			 @for($i=1; $i<$contador;$i++)
		        <div id="grafica-producto{{$i}}" class="contenedor_grafica_lineas">
		          <canvas id="canvas{{$i}}" class="grafica_lineas"></canvas>
		        </div>
		    @endfor


   			<div id="tabla-tabulados" style="margin-top:30px;margin-left:130px; margin-right:130px;">
   				<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Tipos</th>
            <th>Subtipos</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="3">Rocky</td>
            <td>Balboa</td>
            <td>rockybalboa@mail.com</td>
        </tr>
        <tr>
    
            <td>Parker</td>
            <td>peterparker@mail.com</td>
        </tr>
        <tr>
            
            <td>Rambo</td>
            <td>johnrambo@mail.com</td>
        </tr>
    </tbody>
</table>
    		</div>
    	</fieldset>
	</div>

	
@stop
