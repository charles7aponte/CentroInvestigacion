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

	@if(isset($graficaproyecto) && $graficaproyecto)//valida si resibio datos
			

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
		@endif
	</script>
@stop

@section('cuerpo') 
	
<div>

	@if(isset($reporteproyectos) && count($reporteproyectos)>0)

	<div class="btn-group">
    	<button type="button" class="btn btn-default dropdown-toggle"data-toggle="dropdown" style="position: relative;
		    bottom: -160px;
		    left: 30px; border-color:#1A6D71;">Seleccione Periodo<span class="caret"></span>
    	</button>
    	<ul class="dropdown-menu" style="margin-top: 160px; margin-left: 28px; border-color:#1A6D71;">
    		@foreach($generarperiodo as $key => $generarperiodografica)
      			<li><a href="{{URL::to('/')}}/reporte/proyectolineas/{{$generarperiodografica->codigo_periodo}}">{{$generarperiodografica->periodo}}-{{$generarperiodografica->ano}}</a></li>
      		@endforeach
    	</ul>
  	</div>
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
			  width: auto;
			  margin-top: -13px;">Cantidad de Proyectos por Lineas de profundizacion, seg&uacute;n el periodo acad&eacute;mico</h2>
    </div>

    <fieldset>
    		@if(count($graficaproyecto)>0)<div style="width:100%">
	    		<label></label>
	    		<canvas id="canvas" width="1010px" height="260px" style=" margin-top: 140px;margin-left: 30px;">
	    	</div>
	    	else
	    	@endif
	    <div id="colores-graficas">
	    	<table style="margin-top:14px; margin-left: 49px; border:1px solid #ddd;
	    		vertical-align: bottom;
  				border-bottom: 2px solid #ddd;
  				padding-: 8px;">
    			<thead style="border-radius: 5px; background: #1A6D71;
		                background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
		                background: -moz-linear-gradient(top,#1A6D71,#122d3e);
		                background: -o-linear-gradient(top,#1A6D71,#122d3e);  
		                background: linear-gradient(to bottom,#1A6D71,#122d3e);  
		                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">
	    				<th style="padding: 5px; text-align: center;">color</th>
	    				<th style="padding: 5px; text-align: center;">Linea</th>
    			</thead>

    			<tbody  id="descripcion-tabla">	
				    	<tr>
					        <td></td>
					        <td></td>
				        	
				        </tr>
    			</tbody>
			</table>
	    </div>
	    <div id="boton-descargar-excel">
	    	<a type="button" class="btn btn-primary btn-lg active" href="{{URL::to('reporte/generar/excel/reporteproyectos')}}" style="position: relative;
			  top: 66px;
			  left: 851px;
			  padding: 5px;
			  color: #1A6D71;
			  font-weight: bold;
			  font-size: 15px;
			  background-color:#DFECF7;
	    	  border-color: #95A1AB;"><li class="glyphicon glyphicon-download-alt"></li>Descargar</a>
	    </div>
   		<div id="tabla-tabulados" style="margin-top:79px; margin-left:88px; margin-right:67px;">
   			<table class="table table-bordered table-hover">
    			<thead style="border-radius: 5px; background: #1A6D71;
		                background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
		                background: -moz-linear-gradient(top,#1A6D71,#122d3e);
		                background: -o-linear-gradient(top,#1A6D71,#122d3e);  
		                background: linear-gradient(to bottom,#1A6D71,#122d3e);  
		                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">
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
  			  color: white;">No se encuentran proyectos Asignados</h2>
    @endif
</div>		
@stop
