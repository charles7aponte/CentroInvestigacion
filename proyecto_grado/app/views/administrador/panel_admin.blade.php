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
	<link rel="stylesheet" type="text/css" href="css/admin/estilo_paneladmin.css">
	<link rel="stylesheet" type="text/css" href="css/admin/estilo_formadmin.css">
	<link rel="stylesheet" type="text/css" href="css/admin/estilo_listasadmin.css">
	<link rel="stylesheet" type="text/css" href="css/estilo_temasprincipales.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">


    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css">


	@section("css-nuevos")
	@show

	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>

	<!--javascript-->
	<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>

	<script src="js/jquery-ui.min.js" type="text/javascript"></script>

	@section("javascript-nuevos")
	@show

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Panel de administraci&oacute;n</a></h1>
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
			<li class=""><a href="formulariogrupos">Agregar nuevo grupo</a></li>
			<li class=""><a href="listadegrupos">Ver/Editar un grupo</a></li>
			<li class=""><a href="formulariotipogrupo">Agregar/Eliminar un tipo de grupo</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> L&iacute;neas y Subl&iacute;neas</h3>
		<ul class="toggle">
			<li class=""><a href="formulariolineas">Agregar nueva l&iacute;nea</a></li>
			<li class=""><a href="formulariosublineas">Agregar nueva subl&iacute;nea</a></li>
			<li class=""><a href="listadelineas">Ver/Editar una l&iacute;nea</a></li>
			<li class=""><a href="listadesublineas">Ver/Editar una subl&iacute;nea</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Participantes</h3>
		<ul class="toggle">
			<li class=""><a href="formularioinvestigadores">Agregar nuevo j&oacute;ven investigador &oacute; participante externo</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Convocatorias</h3>
		<ul class="toggle">
			<li class=""><a href="formularioconvocatorias">Crear nueva convocatoria</a></li>
			<li class=""><a href="listadeconvocatorias">Ver/Editar convocatorias</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Proyectos</h3>
		<ul class="toggle">
			<li class=""><a href="formularioproyectos">Agregar nuevo proyecto</a></li>
			<li class=""><a href="formulariofinanciamiento">Agregar Financiamiento a un proyecto</a></li>
			<li class=""><a href="listafinanciamiento">Ver/editar el financiamiento de un proyecto</a></li>
			<li class=""><a href="listadeproyectos">Ver/Editar un proyecto</a></li>
		</ul>
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Productividad</h3>
		<ul class="toggle">
			<li class=""><a href="formularioproductos"> Agregar nuevo producto</a></li>
			<li class=""><a href="listadeproductos">Ver/Editar un producto</a></li>			
			<li class=""><a href="formulariotipoproductos">Agregar/eliminar un tipo de producto</a></li>
			<li class=""><a href="formulariosubtipoproductos">Agregar/eliminar un subtipo de producto</a></li>			
		</ul>
		<h3><span class="glyphicon glyphicon-list-alt"></span> Reportes</h3>
		<ul class="toggle">
			<li class=""><a href="#"></a></li>
		</ul>
		
		<h3><span class="glyphicon glyphicon-calendar"></span> Noticias y eventos</h3>
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

