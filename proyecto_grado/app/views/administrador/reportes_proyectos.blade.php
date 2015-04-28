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
		?>


		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};



		var listalabel= [
				
				@foreach($graficaproyecto as $key => $filalinea)
				{

					label:"{{$filalinea->nombre_linea}}",
					fillColor:getColor({{$contador}}),
					strokeColor : "rgba(220,220,220,0.8)",
					highlightFill: getColor({{$contador}}),
					highlightStroke:"rgba(220,220,220,1)",
					data : [{{$filalinea->count}}],

					<?php 
					$contador++;
					?>
				},

				@endforeach
			];



		var barChartData = {
			labels : ["{{$periodo->periodo}}-{{$periodo->ano}}"],
			datasets :listalabel	
		
		}
				
		var optiones={
		responsive : true,
		   animation: true,
		   barValueSpacing : 5,
		   barDatasetSpacing : 1,
		   tooltipFillColor: "rgba(0,0,0,0.8)",                
		   multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
			
		};
		
		
		
			window.onload = function(){
			var ctx = document.getElementById("canvas").getContext("2d");
			window.myBar = new Chart(ctx).Bar(barChartData, optiones);

			var html="";
			for(var i=0; i< listalabel.length; i++ )
				{
					html+="<tr>";
					html+="<td><div style='width:10px; height:10px;background:"+listalabel[i].fillColor+"'></div></td>";
					html+="<td>"+listalabel[i].label+"</td>";
					html+="</tr>";

				}

				$("#descripcion-tabla").html(html);



		}
	</script>
@stop

@section('cuerpo') 
	
<div>

	<div class="btn-group">
    	<button type="button" class="btn btn-default dropdown-toggle"data-toggle="dropdown">
      		Seleccione Periodo
      		<span class="caret"></span>
    	</button>
    	<ul class="dropdown-menu">
    		@foreach($generarperiodo as $key => $generarperiodografica)
      		<li><a href="{{URL::to('/')}}/reporte/proyectolineas/{{$generarperiodografica->codigo_periodo}}">{{$generarperiodografica->periodo}}-{{$generarperiodografica->ano}}</a></li>
      		
      			@endforeach
    	</ul>
  	</div>

	@if(count($reporteproyectos)>0)
	<div id="titulo-productividad" id="cuadro" style="text-align:right;
  		padding-right: 30px;
  		padding-top: 10px;
  		

  		margin-right: 30px;
  		margin-left: 30px;
  		text-shadow: 1px 1px 1px #AFEEEE;
		background: none repeat scroll 0 0 #F3F3F3;
  		border-radius: 5px;
  		border-bottom: 1px solid #DCDCDC;
		width: auto;
 		margin-top:30px;"> 
        <h2  style="font-family:Arial, Helvetica, sans-serif ;
 		font-size: 35px;
  		color: #1c7e84;
  		font-weight: bold;">Productividad de Proyectos Por lineas, Seg&uacute;n el periodo acad&eacute;mico</h2>
    </div>

    <fieldset>
    		<div style="width:100%">
	    		<label></label>
	    		<canvas id="canvas" heigth="600" width="600">
	    	</div>
	    
	    <div>
	    	<table>
    			<thead>
    				<th>color</th>
    				<th>Linea</th>
    			</thead>

    			<tbody  id="descripcion-tabla">	
				    	<tr>
					        <td>1</td>
					        <td>2</td>
				        	
				        </tr>
    			</tbody>
			</table>

	    </div>
   		<div id="tabla-tabulados" style="margin-top:30px;margin-left:130px; margin-right:130px;">
   			<table class="table table-bordered table-hover">
    			<thead>
        			<tr>
			            <th>Proyecto</th>
			            <th>Nombre Linea</th>
			            <th>Periodo</th>
        			</tr>
    			</thead>
    			<tbody>	

    				@foreach($reporteproyectos as $key1 =>$datostabuladosproyectos)
				    	<tr>
					        <td>{{$datostabuladosproyectos->nombre_proyecto}}</td>
					        <td>{{$datostabuladosproyectos->nombre_linea}}</td>
				        	<td>{{$datostabuladosproyectos->periodo}}-{{$datostabuladosproyectos->ano}}</td>
				        </tr>
        			@endforeach
    			</tbody>
			</table>
    	</div>
    </fieldset>
    @else
    	no hay
    @endif
</div>		
@stop
