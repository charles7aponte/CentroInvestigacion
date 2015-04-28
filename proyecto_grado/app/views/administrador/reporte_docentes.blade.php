@extends('administrador.panel_admin')

@section('css-nuevos')
<link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">
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
    	<div style="width:100%">
	    	<label></label>
	    	<canvas id="canvas" heigth="600" width="600">
	    </div>

   		<div id="tabla-tabulados" style="margin-top:30px;margin-left:130px; margin-right:130px;">
   			<table class="table table-bordered table-hover">
    			<thead>
        			<tr>
			            <th>Unidad Acad&eacute;mica</th>
			            <th>C&eacute;dula</th>
			            <th>Nombre Docente</th>
			            <th>Nombre Producto</th>
			            <th>Tipo Producto</th>
			            <th>Soporte Producto</th>
        			</tr>
    			</thead>
    			<tbody>	


    				<?php 
    					$keyunidad="";
    					$keycedula="";
    				?>

    				@foreach($reportedocente['datos'] as $unidad =>$unidades)

    					@foreach($unidades as $cedula =>$cedulasdocentes)
	    			

	        				@for($i=0; $i<count($cedulasdocentes); $i++)
			    				
				    				<tr>

			    						@if($keyunidad!=$unidad)
					        				<td rowspan="{{$reportedocente['cantidad_productos_docente'][$unidad]}}">
					        					{{$unidad}}
					        				</td>

					        				<?php 
					        					$keyunidad=$unidad;
					        					$keycedula="";
					        				?>
				        				@endif


				        				@if($keycedula!=$cedula)
					        				<td rowspan="{{count($cedulasdocentes)}}">
					        					{{$cedula}}
					        				</td>

					        				<?php 
					        					$keycedula=$cedula;		
					        				?>
				        				@endif

				        				<td>{{$cedulasdocentes[$i]['nombre_persona']}}</td>
				        				<td>{{$cedulasdocentes[$i]['nombre_producto']}}</td>
				        				<td>{{$cedulasdocentes[$i]['nombre_tipo_producto']}}</td>
				        				<td>{{$cedulasdocentes[$i]['soporte_producto']}}</td>
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