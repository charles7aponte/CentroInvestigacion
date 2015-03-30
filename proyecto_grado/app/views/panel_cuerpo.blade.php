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

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es" style="background-color:#eee;">
	<head>
	    <title>CENTRO DE INVESTIGACIONES--(FCBI) Universidad de los llanos</title>
	    <meta charset="utf-8"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	    <!-- css -->
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/estilo.css')}}"> <!--css del estilo de la pagina principal-->
	    <link rel="stylesheet" type="text/css" href="css/estilo_slider.css">
	    <link rel="stylesheet" type="text/css" href="css/estilo_login.css">
	    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.css">
	    <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme">
	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/invitado/estilo_listasinvitado.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('css/invitado/estilo_temasprincipalesinvitado.css')}}">


	    <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">
	    <!--<link rel="stylesheet" href="{{URL::to('css/')}}/datepicker.css">-->

		@section('css')
		
		@show
		
	    <!-- scripts -->
	    <script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/scripts.js"></script>
	    <script type="text/javascript" src="js/texto-imagenes-slider.js"></script>
	    <script src="{{URL::to('js/bootstrap.js')}}" type="text/javascript"></script>
	    <!--<script type="text/javascript" src="{{URL::to('/js')}}/bootstrap-datepicker.js"></script>
	    <script type="text/javascript" src="{{URL::to('/js')}}/locales/bootstrap-datepicker.es.js"></script>-->
	</head>
		<body style="background-color:#eee;">
			<div class="contenedor">		
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
	    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:148px;">
	      							Inicio 
	    						</a>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:148px;">
	      							Grupos
	    						</a>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:148px;">
	      							Líneas
	    						</a>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:148px;">
	      							Convocatorias
	    						</a>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:148px;">
	      							Productos<span class="caret"></span>
	    						</a>
	    						<ul class="dropdown-menu" role="menu">
	      							<li><a href="#">Unidad academica 1</a></li>
	      							<li><a href="#">Menu 1</a></li>
	      							<li><a href="#">Menu 1</a></li>
	    						</ul>
	 						</li>

	 						<li role="presentation" class="dropdown">
	    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:148px;">
	      							Documentaci&oacute;n<span class="caret"></span>
	    						</a>
	    						<ul class="dropdown-menu" role="menu">
	      							<li><a href="#">Menu 1</a></li>
	      							<li><a href="#">Menu 1</a></li>
	    						</ul>
	 						</li>
						</ul>
					</section>
				</div>

				<section>
					@section('contenido-principal')

			    	@show
				</section>	
			    	
				<div id="pie-pagina">
					<div id="capa-pie">
						<p>
							<strong>Centro de Investigaciones, FCBI</strong>
							<br>
								Universidad de los llanos. Villavicencio, Colombia - Telefono 0000000
							<br>
								Correo electronico contacto@xxxx.com
						</p>
					</div>
				</div>
			</div>
		</body>
</html>	
		