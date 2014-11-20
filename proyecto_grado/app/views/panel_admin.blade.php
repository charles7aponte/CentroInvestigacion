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

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Panel</title>
	
	<!--css-->
	<link rel="stylesheet" type="text/css" href="css/estilo_paneladmin.css">
	<link rel="stylesheet" type="text/css" href="css/estilo_formulariogrupos.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	@section("css-nuevos")
	@show

	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>

	<!--javascript-->
	<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>

	@section("javascript-nuevos")
	@show

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Panel de administraci&oacute;n</a></h1>
			<div class="btn_view_site"><a href="index.php">Ver sitio</a></div>
		</hgroup>
	</header> <!--fin barra encabezado-->
	
	<section id="secondary_bar">
		<div class="user" >
			<!-- Split button -->
			<div class="btn-group" id="usuario-admin">
			  <button type="button" class="btn btn-default" style="padding-bottom: 1px; /* width: 100px; */height: 34px; background-color: tr;">
			  		<p id="hola-admin"><span class="glyphicon glyphicon-user"></span> <span>Hola, Administrador</span></p>
			  </button>
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			    <li><a href="#">....</a></li>
			    <li><a href="#">...</a></li>
			    <li class="divider"></li>
			    <li><a href="#">Cerrar Sesi&oacute;n</a></li>
			  </ul>
			</div>		
		</div>
			<div id="fecha">
				{{ "Villavicencio,"." ". $dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year}}
			</div>	
	</section><!-- fin de la barra secundaria-->
	
	<aside id="sidebar" class="column">
		<hr/>
		<h3>Grupos</h3>
		<ul class="toggle">
			<li class=""><a href="formulariogrupos">Agregar nuevo grupo</a></li>
			<li class=""><a href="#">Editar grupos de estudio</a></li>
			<li class=""><a href="#">Editar grupos de investigaci&oacute;n</a></li>
		</ul>
		<h3>L&iacute;neas y Subl&iacute;neas</h3>
		<ul class="toggle">
			<li class=""><a href="#">aaa</a></li>
		</ul>
		<h3>Convocatorias</h3>
		<ul class="toggle">
			<li class=""><a href="formularioconvocatorias">Crear nueva convocatoria</a></li>
		</ul>
		<h3>Proyectos</h3>
		<ul class="toggle">
			<li class=""><a href="#">aaa</a></li>
		</ul>
		<h3>Productividad</h3>
		<ul class="toggle">
			<li class=""><a href="#">aaa</a></li>
		</ul>
		<h3>Reportes</h3>
		<ul class="toggle">
			<li class=""><a href="#"></a></li>
		</ul>
		
		<h3>Noticias y eventos</h3>
		<ul class="toggle">
			<li class=""><a href="#">Agregar un evento</a></li>
			<li class=""><a href="#">Agregar una noticia</a></li>	
		</ul>
		<h3>Administrador</h3>
		<ul class="toggle">
			<li class=""><a href="#">Opciones</a></li>
			<li class=""><a href="#">Cerrar sesi&oacute;n</a></li>
		</ul>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		@section('cuerpo')
		@show
		
		<div class="clear"></div>
	</section>
	</body>

	@section("javascript-nuevos2")
	@show
</html>

