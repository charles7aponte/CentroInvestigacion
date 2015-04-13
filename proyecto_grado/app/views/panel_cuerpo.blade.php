<?php 
/*fecha por defecto*/
	date_default_timezone_set("America/Bogota" ) ; 
	$tiempo = getdate(time()); 
	$dia = $tiempo['wday']; 
	$dia_mes=$tiempo['mday']; 
	$mes = $tiempo['mon']; 
	$year = $tiempo['year']; 


	switch ($dia){ 
	case "1": $dia_nombre="Lunes"; break; 
	case "2": $dia_nombre="Martes"; break; 
	case "3": $dia_nombre="Mi&eacute;rcoles"; break; 
	case "4": $dia_nombre="Jueves"; break; 
	case "5": $dia_nombre="Viernes"; break; 
	case "6": $dia_nombre="S&aacute;bado"; break; 
	case "0": $dia_nombre="Domingo"; break; 
	} 
	switch($mes){ 
		case "1": $mes_nombre="Enero"; break; 
		case "2": $mes_nombre="Febrero"; break; 
		case "3": $mes_nombre="Marzo"; break; 
		case "4": $mes_nombre="Abril"; break; 
		case "5": $mes_nombre="Mayo"; break; 
		case "6": $mes_nombre="Junio"; break; 
		case "7": $mes_nombre="Julio"; break; 
		case "8": $mes_nombre="Agosto"; break; 
		case "9": $mes_nombre="Septiembre"; break; 
		case "10": $mes_nombre="Octubre"; break; 
		case "11": $mes_nombre="Noviembre"; break; 
		case "12": $mes_nombre="Diciembre"; break; 
	} 
?>

<html  lang="es" style="background-color:#eee;">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	    <title>CENTRO DE INVESTIGACIONES(FCBI) Universidad de los llanos</title>

	    <!-- css -->
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/estilo.css')}}"> <!--css del estilo de la pagina principal-->
	    {{ HTML::style('css/estilo_slider.css') }}
	    {{ HTML::script('') }}
	   
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/estilo_login.css')}}">
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.css')}}">
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.structure.css')}}">
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/invitado/estilo_listasinvitado.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('css/estilo_temasprincipales.css')}}">
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">

	    <!--<link rel="stylesheet" href="{{URL::to('css/')}}/datepicker.css">-->

		@section("css-nuevos")	
		@show
		
	    <!-- scripts -->
	    <script type="text/javascript" src="{{URL::to('js/jquery.js')}}"></script>
<!--
		<script src="{{URL::to('js/jquery-1.5.2.min.js')}}" type="text/javascript"></script>
-->
		<script src="{{URL::to('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
	    <script type="text/javascript" src="{{URL::to('js/scripts.js')}}"></script>
	 
	    <script type="text/javascript" src="{{URL::to('js/texto-imagenes-slider.js')}}"></script>
	    
	    <script src="{{URL::to('js/bootstrap.js')}}" type="text/javascript"></script>

	    <script src="{{URL::to('js/recursos/colores-graficas.js')}}" type="text/javascript"></script>

		@section("javascript-nuevos")
		@show

	</head>
		<body style="background-color:#eee;">
			<div class="contenedor"   style="  box-shadow: 0 0 15px 5px #AFAFB0;
									   -webkit-box-shadow:0 0 15px 5px #AFAFB0;
									   -moz-box-shadow: 0 0 15px 5px #AFAFB0;">		
			<!-- Cabecera -->
				<header class="capa-cabeza">
						<div id="superior-principal"></div>
					<!-- logo -->
						<div id="logo-encabezado">
							<img src="{{URL::to('images/1.png')}}" alt="" width="450" height="100"/>
						</div>
						<!-- Fecha -->
						<div id="fecha-encabezado">
							<p>
								{{ "Villavicencio,"." ". $dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year}}
							</p>
						</div>					
						<!-- Iniciar sesion -->
						<div id="ingreso-encabezado">

							<form action="login" id="myForm" method="POST"> 
								<a href="login" onclick="document.getElementById('myForm').submit(); return false;" title="Inicie sesion" class="popups-form-reload">
									<span class="glyphicon glyphicon-user"></span> Ingresar
								</a>
							</form>	
						</div>
				</header>

				<!-- Menu de navegacion -->
				<div class="row">
					<section id="menu">
						<ul class="nav nav-tabs">
	  						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle enlaces_dobles" data-toggle="dropdown" href="{{URL::to('/')}}" role="button" aria-expanded="false" style="width:148px;">
	      							Inicio 
	    						</a>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:148px;">
	      							Documentaci&oacute;n <span class="caret"></span>
	    						</a>
	    						<ul class="dropdown-menu" role="menu">
									@foreach($lista_documentos as $lista_documento)
								        @if($lista_documento['enlace_documento']!="")
			                               	<li>
			                               	<a style="white-space:pre-line; text-decoration:underline;" href="{{URL::to('archivos_db/eventosnoticias/')}}/{{$lista_documento['enlace_documento']}}" target="_blank">{{$lista_documento['titulo_evento']}}</a>
			                               	</li>
			                            @endif	
									@endforeach
	    						</ul>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle enlaces_dobles" data-toggle="dropdown" href="{{URL::to('listadegruposinv')}}" role="button" aria-expanded="false" style="width:148px;">
	      							Grupos
	    						</a>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle enlaces_dobles" data-toggle="dropdown" href="{{URL::to('listadelineasinv')}}" role="button" aria-expanded="false" style="width:148px;">
	      							Líneas
	    						</a>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:148px;">
	      							Productos <span class="caret"></span>
	    						</a>
	    						
		    						<ul class="dropdown-menu" role="menu">
		    							@foreach($lista_unidades as $lista_unidad)
		      							<li><a href="{{URL::to('/')}}/productividadunidad/{{$lista_unidad['id_unidad']}}">{{$lista_unidad['nombre_unidad']}}</a></li>	
		      							@endforeach	
		      						</ul>	
		      					
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle enlaces_dobles" 
	    						data-toggle="dropdown" 
	    						href="{{URL::to('listadeconvocatoriasinv')}}"  
	    						role="button" 
	    						aria-expanded="false" 
	    						style="width:148px;"
	    						>
	      							Convocatorias
	    						</a>
	 						</li>
						</ul>
					</section>
				</div>
				<div style="border-bottom:1px solid rgb(235, 235, 235); width:900px; margin-left:30px;"></div>

				<section>
					@section('contenido-principal')

			    	@show
				</section>	
			    <footer>
					<div id="pie-pagina">
						<div id="capa-pie">
							<p>Centro de Investigaciones, FCBI
							Universidad de los llanos. Villavicencio, Colombia - Telefono 0000000  
							Correo electronico contacto@xxxx.com</p>
						</div>
					</div>
				</footer>
			</div>


			<script>

			//esta funcion carga la direcion url que le demos
			function cambiarURL(url){
					location.href = url;
				}
			//busca todos los elementos q tenga la clase enlaces_dobles 
			$(".enlaces_dobles").click(function(){
				cambiarURL($(this).attr("href"));
			})
		    </script>
		</body>

	@section("javascript-nuevos2")

	@show	
</html>	
		