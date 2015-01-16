@extends('administrador.panel_admin')

@section('cuerpo')

<form id="form-grupos">
<fieldset>
        
 <div id="titulo-listalineas" id="cuadro"> 
    <h2>Listado Lineas</h2>
  </div>

<div id="tabla-listalineas">
  <table id="listalineas">
    <thead>
      <tr><th colspan="3">LINEAS</th></tr>
      <tr>
        <th>#</th>
        <th colspan="2">NOMBRE DE LA LINEA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td id="nombre-linea"><a href="">Este es el nombre del grupo 1 de investigacion o de estudio de la universidad de los llanos</a></td>
        <td>
          <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
          <a href="#" class="button">Eliminar</a>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td id="nombre-linea"><a href="">Linea 2</a></td>
        <td>
          <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
          <a href="#" class="button">Eliminar</a>
        </td>
      </tr>
    </tbody>
  </table>
  <nav>
  <ul class="pager">
    <li><a href="#" style=" background: #276b6f;
      background: -webkit-linear-gradient(top,#276B6F,#5BA9AE);
      background: -moz-linear-gradient(top,#276B6F,#5BA9AE);
      background: -o-linear-gradient(top,#276B6F,#5BA9AE);  
      background: linear-gradient(to bottom,#276B6F,#5BA9AE);  
      filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#276B6F, endColorstr=#5BA9AE);
      text-decoration: none;
      font-weight: bold;
      color:#fff">Anterior</a></li> 
    <li><a href="#" style=" background: #276b6f;
      background: -webkit-linear-gradient(top,#276B6F,#5BA9AE);
      background: -moz-linear-gradient(top,#276B6F,#5BA9AE);
      background: -o-linear-gradient(top,#276B6F,#5BA9AE);  
      background: linear-gradient(to bottom,#276B6F,#5BA9AE);  
      filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#276B6F, endColorstr=#5BA9AE);
      text-decoration: none;
      font-weight: bold;
      color:#fff">Siguiente</a></li>
  </ul>
</nav>
</div>
</fieldset>
</form>
@stop