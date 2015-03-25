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

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
<head>
    <title>CENTRO DE INVESTIGACIONES--(FCBI) Universidad de los llanos</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme">

    <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">


    <link rel="stylesheet" type="text/css" href="css/estilo.css"> <!--css del estilo de la pagina principal-->
    <link rel="stylesheet" type="text/css" href="css/estilo_slider.css">
    <link rel="stylesheet" type="text/css" href="css/estilo_login.css">
	

	@section('css')
	
	@show
	
    <!-- scripts -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/texto-imagenes-slider.js"></script>
    <script src="{{URL::to('js/bootstrap.js')}}" type="text/javascript"></script>
    <!--<script type="text/javascript" src="js/jquery-ui.min.js"></script>-->

    @section('css')
	
	@show

</head>
	<body>
		<div class="contenedor">		
			<!-- Cabecera -->
			<header class="capa-cabeza">
					<div id="superior-principal"></div>
				<!-- logo -->
					<div id="logo-encabezado">
						<img src="images/1.png" alt="" width="450" height="100"/>
					</div>
					<!-- Fecha -->
					<div id="fecha-encabezado">
						<p>
							{{ "Villavicencio,"." ". $dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year}}
						</p>
					</div>
					<!-- Redes sociales -->
					<div id="redes-cabecera">
						<ul> <!--poner target...abrir en otra pagina-->
						  <li><a href="#" target="_blank" class="facebook"></a></li>
					      <li><a href="#" target="_blank" class="twitter"></a></li>
					      <li><a href="#" target="_blank" class="googlemas"></a></li>
						</ul>
					</div><!--Fin redes sociales cabecera-->					
					<!-- Iniciar sesion -->
					<div id="ingreso-encabezado">

						<form action="login" id="myForm" method="POST"> 
							<a href="login" onclick="document.getElementById('myForm').submit(); return false;" title="Inicie sesion" class="popups-form-reload">
								Ingresar</a>
						</form>	

						<a href="login" class="popups-form-reload">Ingresar</a>
					</div>
			</header>



			<!-- Menu de navegacion -->
			<div class="row">
				<section id="menu">
					<ul class="nav nav-tabs">
  						<li role="presentation" class="dropdown">
    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:100px;">
      							Inicio 
    						</a>
    						<ul class="dropdown-menu" role="menu">
      							<li><a href="#">Menu 1</a></li>
      							<li><a href="#">Menu 1</a></li>
    						</ul>
 						</li>

 						<li role="presentation" class="dropdown">
    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:120px;">
      							Proyectos<span class="caret"></span>
    						</a>
    						<ul class="dropdown-menu" role="menu">
      							<li><a href="#">Menu 1</a></li>
      							<li><a href="#">Menu 1</a></li>
    						</ul>
 						</li>

 						<li role="presentation" class="dropdown">
    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:120px;">
      							Productos<span class="caret"></span>
    						</a>
    						<ul class="dropdown-menu" role="menu">
      							<li><a href="#">Menu 1</a></li>
      							<li><a href="#">Menu 1</a></li>
    						</ul>
 						</li>

 						<li role="presentation" class="dropdown">
    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:120px;">
      							Grupos<span class="caret"></span>
    						</a>
    						<ul class="dropdown-menu" role="menu">
      							<li><a href="#">Menu 1</a></li>
      							<li><a href="#">Menu 1</a></li>
    						</ul>
 						</li>

 						<li role="presentation" class="dropdown">
    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:120px;">
      							Lineas<span class="caret"></span>
    						</a>
    						<ul class="dropdown-menu" role="menu">
      							<li><a href="#">Menu 1</a></li>
      							<li><a href="#">Menu 1</a></li>
    						</ul>
 						</li>

 						<li role="presentation" class="dropdown">
    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="width:120px;">
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


			<div class="cl">&nbsp;</div>
			<!--fin menu de navegacion-->
			<!-- Slider -->
				
		    @section('contenido-principal')

		    <div id="sidebar1" class="row1">
		    	<div class="col-md-4">
		    		 <ul>
				 <li>
					<h2>Convocatorias</h2>
					<ul>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
					</ul>
					<p class="links"><a href="#" class="more">&laquo;&laquo;&nbsp;&nbsp;ver todas&nbsp;&nbsp;&raquo;&raquo;</a></p>
				 </li> 
				</div>				
			</div>

		    <div class="row2">
		
				<div class="entry">
					
					<h3>Bulleted List:</h3>
					<ul>
						<li><a href="#">Telecomunicaciones</a></li>
						<li><a href="#">Software</a></li>
						<li><a href="#">Desarrollo web</a></li>
					</ul>
					<p class="links"><a href="#" class="more">&laquo;&laquo;&nbsp;&nbsp;Read More&nbsp;&nbsp;&raquo;&raquo;</a></p>
					<h3>Noticias:</h3>
					<ol>
						<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
						<li>Phasellus nec erat sit amet nibh pellentesque congue.</li>
						<li>Cras vitae metus aliquam risus pellentesque pharetra.</li>
					</ol>
					<p class="links"><a href="#" class="more">&laquo;&laquo;&nbsp;&nbsp;Read More&nbsp;&nbsp;&raquo;&raquo;</a></p>
				</div>
			</div>

		    @show
		
		
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
	</body>
</html>	
		