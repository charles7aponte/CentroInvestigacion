<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
<head>
    <title>CENTRO DE INVESTIGACIONES--(FCBI) Universidad de los llanos</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css"> <!--css del estilo de la pagina principal-->
    <link rel="stylesheet" type="text/css" href="css/estilo_slider.css">
    <link rel="stylesheet" type="text/css" href="css/estilo_login.css">
	

	@section('css')
	
	@show
	
    <!-- scripts -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/texto-imagenes-slider.js"></script>

</head>
	<body>
		<div class="body">		
			<!-- Cabecera -->
			<header class="capa-cabeza">
				<!-- logo -->
					<div id="logo-encabezado">
						<img src="images/1.png" alt="" width="450" height="100"/>
					</div>
					<!-- Fecha -->
					<div id="fecha-encabezado">
						<p>
						

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
						<a href="login" title="Inicie sesion" class="popups-form-reload">Ingresar</a>
					</div>
			</header>
			<!-- Menu de navegacion -->
			<section id="menu">
				<ul>
				  <li class="nivel1"><a href="{{URL::to('/')}}" class="nivel1">Inicio</a></li>

				  <li class="nivel1"><a href="#" class="nivel1">Menu 2</a>
				<!--[if lte IE 6]><a href="#" class="nivel1ie">Menu 2<table class="falsa"><tr><td><![endif]-->
					<ul>
						<li><a href="#">Menu 2.1</a></li>
						<li><a href="#">Menu 2.2</a></li>
						<li><a href="#">Menu 2.3</a></li>
						<li><a href="#">Menu 2.4</a></li>
					</ul>
				<!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
				  <li class="nivel1"><a href="#" class="nivel1">Menu 3</a>
				<!--[if lte IE 6]><a href="#" class="nivel1ie">Menu 3<table class="falsa"><tr><td><![endif]-->
					<ul>
						<li><a href="#">Menu 3.1</a></li>
						<li><a href="#">Menu 3.2</a></li>
					</ul>
				<!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
				  <li class="nivel1"><a href="#" class="nivel1">Menu 4</a>
				<!--[if lte IE 6]><a href="#" class="nivel1ie">Menu 4<table class="falsa"><tr><td><![endif]-->
					<ul>
						<li><a href="#">Menu 4.1</a></li>
						<li><a href="#">Menu 4.2</a></li>
						<li><a href="#">Menu 4.3</a></li>
					</ul>
				<!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
				  <li class="nivel1"><a href="#" class="nivel1">Menu 5</a>
				<!--[if lte IE 6]><a href="#" class="nivel1ie">Menu 5<table class="falsa"><tr><td><![endif]-->
					<ul>
						<li><a href="#">Menu 5.1</a></li>
						<li><a href="#">Menu 5.2</a></li>
					</ul>
				<!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
				</ul>
			</section>
			<div class="cl">&nbsp;</div>
			<!--fin menu de navegacion-->
			<!-- Slider -->
				
		    @section('contenido-principal')

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
			</div>
	</body>
</html>	
		