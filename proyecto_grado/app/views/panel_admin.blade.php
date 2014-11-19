<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Panel</title>
	
	<!--css-->
	<link rel="stylesheet" type="text/css" href="css/estilo_paneladmin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<!--javascript-->
	<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Panel de administraci&oacute;n</a></h1>
			<div class="btn_view_site"><a href="index.php">Ver sitio</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Hola, Administrador</p>
		</div>
	</section><!-- end of secondary bar -->
	
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
</html>

