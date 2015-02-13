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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


	<title>Panel</title>
	
	<!--css-->
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/admin/estilo_paneladmin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/admin/estilo_formadmin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/admin/estilo_listasadmin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/estilo_temasprincipales.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">


    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.structure.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.theme.css')}}">


	@section("css-nuevos")
	@show

	<script src="{{URL::to('js/jquery-1.5.2.min.js')}}" type="text/javascript"></script>

	<!--javascript-->
	<script src="{{URL::to('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('js/hideshow.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('js/bootstrap.js')}}" type="text/javascript"></script>

	<script src="{{URL::to('js/jquery-ui.min.js')}}" type="text/javascript"></script>

	@section("javascript-nuevos")
	@show

	
</head>


<body>
	<div class="contenedor">
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="{{URL::to('index.html')}}">Panel de administraci&oacute;n</a></h1>
			<a href="index.php" class="boton negro"><span class="glyphicon glyphicon-hand-right"></span> Ver Sitio</a>
		</hgroup>
	</header> <!-- end of header bar -->
	
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
			    <li><a href="#">Registro de actividad</a></li>
			    <li><a href="#">...</a></li>
			    <li class="divider"></li>
			    <li><a href="#">Salir</a></li>
			  </ul>
			</div>		
		</div>
			<div id="fecha">
				{{ "Villavicencio,"." ". $dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year}}
			</div>	
	</section><!-- fin de la barra secundaria-->

	
	<aside id="sidebar" class="column">
		<hr/>
		<a href="administrador"><h3><span class="glyphicon glyphicon-home"></span> INICIO</h3></li></a>
		
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Grupos</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formulariogrupos')}}">Agregar nuevo grupo</a></li>
			<li class=""><a href="{{URL::to('listadegrupos')}}">Ver/Editar un grupo</a></li>
			<li class=""><a href="{{URL::to('formulariotipogrupo')}}">Agregar/Eliminar un tipo de grupo</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> L&iacute;neas y Subl&iacute;neas</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formulariolineas')}}">Agregar nueva l&iacute;nea</a></li>
			<li class=""><a href="{{URL::to('formulariosublineas')}}">Agregar nueva subl&iacute;nea</a></li>
			<li class=""><a href="{{URL::to('listadelineas')}}">Ver/Editar una l&iacute;nea</a></li>
			<li class=""><a href="{{URL::to('listadesublineas')}}">Ver/Editar una subl&iacute;nea</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Participantes</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioinvestigadores')}}">Agregar nuevo j&oacute;ven investigador &oacute; participante externo</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right')}}"></span> Convocatorias</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioconvocatorias')}}">Crear nueva convocatoria</a></li>
			<li class=""><a href="{{URL::to('listadeconvocatorias')}}">Ver/Editar convocatorias</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Proyectos</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioproyectos')}}">Agregar nuevo proyecto</a></li>
			<li class=""><a href="{{URL::to('formulariofinanciamiento')}}">Agregar Financiamiento a un proyecto</a></li>
			<li class=""><a href="{{URL::to('listafinanciamiento')}}">Ver/editar el financiamiento de un proyecto</a></li>
			<li class=""><a href="{{URL::to('listadeproyectos')}}">Ver/Editar un proyecto</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Productividad</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioproductos')}}"> Agregar nuevo producto</a></li>
			<li class=""><a href="{{URL::to('listadeproductos')}}">Ver/Editar un producto</a></li>			
			<li class=""><a href="{{URL::to('formulariotipoproductos')}}">Agregar/eliminar un tipo de producto</a></li>
			<li class=""><a href="{{URL::to('formulariosubtipoproductos')}}">Agregar/eliminar un subtipo de producto</a></li>			
		</ul>
		
		<h3><span class="glyphicon glyphicon-calendar"></span> Noticias y eventos</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioeventosnoticias')}}">Agregar un evento &oacute; Noticia</a></li>	
		</ul>

		<h3><span class="glyphicon glyphicon-list-alt"></span> Reportes</h3>
		<ul class="toggle">
			<li class=""><a href="#"></a></li>
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
	</div>
	</body>

	@section("javascript-nuevos2")
	@show
</html>

