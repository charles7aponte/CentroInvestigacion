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


	<script type="text/javascript">

		var URL_SERVIDOR ="{{URL::to('/')}}";

	</script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


	<title>Panel de administracion</title>
	
	<!--css-->
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/admin/estilo_paneladmin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/admin/estilo_formadmin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/admin/estilo_listasadmin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/invitado/estilo_listasinvitado.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/estilo_temasprincipales.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.structure.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.theme.css')}}">

    <style>
    .ui-autocomplete-loading {
	    background: white url("{{URL::to('/')}}/images/ui-anim_basic_16x16.gif") right center no-repeat !important;
	    background-color:#4B5F9B;
	  }
    </style>

	@section("css-nuevos")
	@show

	<script src="{{URL::to('js/jquery-1.5.2.min.js')}}" type="text/javascript"></script>

	<!--javascript-->
	<script src="{{URL::to('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('js/hideshow.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('js/bootstrap.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('js/cambiaracapital.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('js/limpiarformularios.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('js/jquery-ui.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('js/Chart.js')}}" type="text/javascript"type=""></script>
	<script src="{{URL::to('js/recursos/colores-graficas.js')}}" type="text/javascript"></script>

	@section("javascript-nuevos")
	@show
</head>

<body>
	<div class="contenedor">
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="{{URL::to('/')}}/index.html">Panel de administraci&oacute;n</a>
			</h1>
			<a href="{{URL::to('/')}}" class="boton negro"><span class="glyphicon glyphicon-hand-right"></span> Ver Sitio</a>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user" >
			<!-- Split button -->
			<div class="btn-group" id="usuario-admin">
			  <button type="button" class="btn btn-default" style="padding-bottom: 1px; /* width: 100px; */height: 34px; background-color: tr;">
					@if(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Docente")==0)
			  		<p id="hola-admin"><span class="glyphicon glyphicon-user"></span> <span>Hola, Docente</span></p>
			  		@elseif(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Admin centro investigaciones")==0)
			  		<p id="hola-admin"><span class="glyphicon glyphicon-user"></span> <span>Hola, Administrador</span></p>
			  		@endif
			  </button>
		
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
			  </button>

			  @if(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Admin centro investigaciones")==0)
				  <ul class="dropdown-menu" role="menu">
				    <li><a href="{{URL::to('listadeproductosdocentes')}}">Actividad de docentes</a></li>
				    <li class="divider"></li>
				    <li><a href="{{action('ControlLogin@logOut')}}">Salir</a></li>
				  </ul>
			  @else 
			 	<ul class="dropdown-menu" role="menu">
			    	<li><a href="{{action('ControlLogin@logOut')}}">Salir</a></li>
			  	</ul>
			  @endif
			</div>		
		</div>
		<div id="fecha">
			{{ "Villavicencio,"." ". $dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year}}
		</div>				

		@if(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Admin centro investigaciones")==0)
				@if(count(InvProductos::where("visto","=","0")->get())>0)
						<div id="notificaciones" style="color:red">
						<i  class="glyphicon glyphicon-bell"></i>
						</div>
					@else 
						<div id="notificaciones"  style="color:rgb(26, 109, 113)">
						<i class="glyphicon glyphicon-bell"></i>
						</div>
				@endif	
			@endif	
	</section><!-- fin de la barra secundaria-->

	
	<aside id="sidebar" class="column">
		<hr/>

		@if(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Admin centro investigaciones")==0)
		<h3><span class="glyphicon glyphicon-list-alt"></span> Reportes</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('listadereportes')}}">Generar reportes</a></li>
		</ul>

		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Unidades</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formulariounidadesacademicas')}}">Agregar nueva unidad académica</a></li>
		</ul>	
	
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Grupos</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formulariotipogrupo')}}">Agregar/Eliminar un tipo de grupo</a></li>
			<li class=""><a href="{{URL::to('formulariogrupos')}}">Agregar nuevo grupo</a></li>
			<li class=""><a href="{{URL::to('listadegrupos')}}">Ver/Editar/Eliminar un grupo</a></li>
		</ul>

		
		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> L&iacute;neas y Subl&iacute;neas</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formulariolineas')}}">Agregar nueva l&iacute;nea</a></li>
			<li class=""><a href="{{URL::to('listadelineas')}}">Ver/Editar/Eliminar una l&iacute;nea</a></li>
			<li class=""><a href="{{URL::to('formulariosublineas')}}">Agregar nueva subl&iacute;nea</a></li>
			<li class=""><a href="{{URL::to('listadesublineas')}}">Editar/Eliminar una subl&iacute;nea</a></li>
		</ul>

		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Participantes</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioinvestigadores')}}">Agregar nuevo j&oacute;ven investigador &oacute; participante externo</a></li>
			<li class=""><a href="{{URL::to('listadeinvestigadores')}}">Ver/Editar informaci&oacute;n de un j&oacute;ven investigador o participante externo</a></li>			
		</ul>

		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Convocatorias</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioconvocatorias')}}">Crear nueva convocatoria</a></li>
			<li class=""><a href="{{URL::to('listadeconvocatorias')}}">Ver/Editar/Eliminar una convocatoria</a></li>
		</ul>

		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Proyectos</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioproyectos')}}">Agregar nuevo proyecto</a></li>
			<li class=""><a href="{{URL::to('listadeproyectos')}}">Ver/Editar/Eliminar un proyecto</a></li>
			<li class=""><a href="{{URL::to('formulariofinanciamiento')}}">Agregar Financiamiento a un proyecto</a></li>
			<li class=""><a href="{{URL::to('listafinanciamiento')}}">Ver/eliminar/Editar el financiamiento de un proyecto</a></li>
		</ul>
		@endif

		<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Productos</h3>
		<ul class="toggle">

		@if(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Docente")==0 || strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Admin centro investigaciones")==0)
         
			<li class=""><a href="{{URL::to('formularioproductos')}}"> Agregar nuevo producto</a></li>
		@endif

		@if(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Admin centro investigaciones")==0)
			<li class=""><a href="{{URL::to('listadeproductos')}}">Ver/Editar un producto</a></li>	
			<li class=""><a href="{{URL::to('formulariotipoproductos')}}">Agregar/eliminar un tipo de producto</a></li>
			<li class=""><a href="{{URL::to('formulariosubtipoproductos')}}">Agregar/eliminar un subtipo de producto</a></li>			
		</ul>

		<h3><span class="glyphicon glyphicon-calendar"></span> Periodos Acad&eacute;micos</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioperiodosacademicos')}}">Agregar un Periodo Acad&eacute;mico</a></li>	
		</ul>

		<h3><span class="glyphicon glyphicon-calendar"></span> Noticias, eventos y documentos</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioeventosnoticias')}}">Agregar un nuevo evento, noticia o documento</a></li>	
			<li class=""><a href="{{URL::to('listadeeventosynoticias')}}">Ver/Editar/Eliminar un evento, noticia o documento</a></li>	
		</ul>

		<h3><span class="glyphicon glyphicon-picture"></span> Slider de imagenes</h3>
		<ul class="toggle">
			<li class=""><a href="{{URL::to('formularioslider')}}">Agregar nueva imagen</a></li>
			<li class=""><a href="{{URL::to('listaimageneslider')}}">Ver/eliminar una imagen</a></li>
		</ul>

		@endif


		@if(strnatcasecmp(trim(User::tipoUsuarioSI(Auth::user())),"Admin centro investigaciones")==0)
			<h3><span class="glyphicon glyphicon-user"></span> Administrador</h3>
				<ul class="toggle">
					<li class=""><a href="{{URL::to('listadeproductosdocentes')}}">Lista de productos agregados por el usuario docente</a></li>
					<li class=""><a href="{{action('ControlLogin@logOut')}}">Cerrar sesi&oacute;n</a></li>
				</ul>
			@else 
				<h3><span class="glyphicon glyphicon-user"></span> Docente</h3>
					<ul class="toggle">
						<li class=""><a href="{{action('ControlLogin@logOut')}}">Cerrar sesi&oacute;n</a></li>
					</ul>
		@endif			

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

