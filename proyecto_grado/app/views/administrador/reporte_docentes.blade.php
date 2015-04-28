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

				        				<td>{{$datostabuladostipos[$i]['nombre_persona']}}</td>
				        				<td>{{$datostabuladostipos[$i]['cedula']}}</td>
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