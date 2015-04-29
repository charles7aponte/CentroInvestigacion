@extends('administrador.panel_admin')

@section("javascript-nuevos")


@section('cuerpo')
<div id="reportes">
    <div class="bs-callout">
      <h4 id="titulo-reporte">Productividad de los investigadores docentes, según la unidad académica a la que pertenece.</h4>
      <p></p>
     <a href="{{URL::to('reporte/unidadgrupos/')}}" class="btn btn-default" role="button" style="border-color:#1A6D71;">Generar reporte</a>
    </div>
</div>

<div id="reportes">
    <div class="bs-callout">
      <h4 id="titulo-reporte">Cantidad de Proyectos de acuerdo a las Lineas de profundizacion, según el periodo académico.</h4>
      <p></p>
     <a href="{{URL::to('reporte/proyectolineas/')}}" class="btn btn-default" role="button" style="border-color:#1A6D71;">Generar reporte</a>
    </div>
</div>

<div id="reportes">
    <div class="bs-callout">
      <h4 id="titulo-reporte">Cantidad de Productos, Según el periodo académico.</h4>
      <p></p>
     <a href="{{URL::to('reporte/productoperiodo/')}}" class="btn btn-default" role="button" style="border-color:#1A6D71;" >Generar reporte</a>
    </div>
</div>

<div id="reportes">
    <div class="bs-callout">
      <h4 id="titulo-reporte">productividad  de los docentes de acuerdo a su Unidad Acad&eacute;mica correspondiente.</h4>
      <p></p>
     <a href="{{URL::to('reporte/productividaddocente/')}}" class="btn btn-default" role="button" style="border-color: #1A6D71;">Generar reporte</a>
    </div>
</div>

@stop