@extends('panel_cuerpo')

@section('css-nuevos')
<link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">
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
    		<div style="width:700px; height:400px; background:red; margin-left:130px;margin-top:30px;">
    			<canvas id="canvas" height="450" width="600"></canvas>
   			</div>


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
            <td>Rocky</td>
            <td>Balboa</td>
            <td>rockybalboa@mail.com</td>
        </tr>
        <tr>
            <td>Peter</td>
            <td>Parker</td>
            <td>peterparker@mail.com</td>
        </tr>
        <tr>
            <td>John</td>
            <td>Rambo</td>
            <td>johnrambo@mail.com</td>
        </tr>
    </tbody>
</table>
    		</div>
    	</fieldset>
	</div>

	<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				label:"gatio",
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [1,2,3,4,5,6]
				},
			{
				label:"gatio2",
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [100,10,1,2,2,2]
			}
		]
		
	
	}
	
	
	
	
	 var optiones={
	responsive : true,
	   animation: true,
	   barValueSpacing : 5,
	   barDatasetSpacing : 1,
	   tooltipFillColor: "rgba(0,0,0,0.8)",                
	   multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
		
	};
	
	
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, optiones);
		
		document.getElementById("legendDiv").innerHTML =window.myBar.generateLegend();
	


	</script>
@stop
