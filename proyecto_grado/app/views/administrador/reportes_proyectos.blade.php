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
		background: none repeat scroll 0 0 #F3F3F3;
  		border-radius: 5px;
  		border-bottom: 1px solid #DCDCDC;
		width: auto;
 		margin-top:30px;"> 
        <h2>Productividad de Proyectos Por lineas, Seg&uacute;n el periodo acad&eacute;mico</h2>
    </div>

    <fieldset>
    	<?php 
    		$contador=0;
    	?>
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
			            <th>Proyecto</th>
			            <th>Nombre Linea</th>
			            <th>Periodo</th>
        			</tr>
    			</thead>
    			<tbody>	

    				@foreach($reporteproyectos as $key1 =>$datostabuladosproyectos)


    					@foreach($datostabuladosproyectos as $key2 =>$datostabuladoslineas)
	    			

	        				@for($i=0; $i<count($datostabuladoslineas);$i++)
			    				
				    				<tr>
					        			<td rowspan="{{$datostabuladosproyectos}}">
					        				{{$key1}}
					        			</td>

					        			<td rowspan="{{count($datostabuladoslineas)}}">
					        				{{$key2}}
					        			</td>



				        				<td>{{$datostabuladoslineas[$i]['periodo']}}</td>
				        			</tr>
		        			@endfor
						@endforeach
        			@endforeach
    			</tbody>
			</table>
    	</div>
    </fieldset>
</div>		
@stop
