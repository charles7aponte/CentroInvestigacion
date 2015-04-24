@extends('administrador.panel_admin')

@section("javascript-nuevos")


@section('cuerpo')
<div id="reportes">
    <div class="bs-callout">
      <h4 id="titulo-reporte">Productividad de los investigadores docentes, según la unidad académica a la que pertenece.</h4>
      <p></p>
     <a href="{{URL::to('reporte/unidadgrupos/')}}" class="btn btn-default" role="button">Generar reporte</a>
    </div>
</div>

<div id="reportes">
    <div class="bs-callout">
      <h4 id="titulo-reporte">Productividad de los proyectos respecto a las Lineas, según el periodo académico.</h4>
      <p></p>
     <a href="{{URL::to('reporte/proyectolineas/')}}" class="btn btn-default" role="button">Generar reporte</a>
    </div>
</div>

<div id="reportes">
    <div class="bs-callout">
      <h4 id="titulo-reporte">Productividad de los productos, según el periodo académico.</h4>
      <p></p>
     <a href="{{URL::to('reporte/productoperiodo/')}}" class="btn btn-default" role="button">Generar reporte</a>
    </div>
</div>

<div id="reportes">
    <div class="bs-callout">
      <h4 id="titulo-reporte"></h4>
      <p></p>
     <a href="{{URL::to('reporte/unidadgrupos/')}}" class="btn btn-default" role="button">Generar reporte</a>
    </div>
</div>

@stop