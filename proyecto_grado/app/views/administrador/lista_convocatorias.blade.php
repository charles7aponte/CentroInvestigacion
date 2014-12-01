@extends('administrador.panel_admin')

@section('cuerpo')
<div id="tabla-listaconvocatorias">
  <table id="listaconvocatorias">
    <thead>
      <tr><th colspan="3">CONVOCATORIAS</th></tr>
      <tr>
        <th>#</th>
        <th colspan="2">T&iacute;Titulo de la convocatoria</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td id="nombre-grupo"><a href="">Este es el nombre del grupo 1 de investigacion o de estudio de la universidad de los llanos</a></td>
        <td>
          <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
          <a href="#" class="button">Inhabilitar</a>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td id="nombre-grupo"><a href="">Grupo 2</a></td>
        <td>
          <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
          <a href="#" class="button">Inhabilitar</a>
        </td>
      </tr>
    </tbody>
  </table>
  <nav>
  <ul class="pager">
    <li><a href="#">Anterior</a></li>
    <li><a href="#">Siguiente</a></li>
  </ul>
</nav>
</div>
@stop


