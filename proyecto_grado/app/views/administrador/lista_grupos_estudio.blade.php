@extends('administrador.panel_admin')

@section('cuerpo')

<!--[if gte IE 9]> 
<style type="text/css"> 
.gradient { 
filter: none; 
} 
</style> 
<![endif]--> 


<form id="form-grupos" class="gradient">
        
  <div id="titulo-listagrupo" id="cuadro"> 
      <h2>Grupos de Estudio</h2>
  </div>

  <div id="tabla-listagrupos">
    <table id="listagrupos">
      <thead>
        <tr><th colspan="3" style=" border-radius: 5px; background: #0072BC;
              background: -webkit-linear-gradient(top,#0072BC,#122d3e);
              background: -moz-linear-gradient(top,#0072BC,#122d3e);
              background: -o-linear-gradient(top,#0072BC,#122d3e);  
              background: linear-gradient(to bottom,#0072BC,#122d3e);  
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#0072BC, endColorstr=#122d3e); color:white;">GRUPOS</th></tr>
        <tr>
          <th> </th>
          <th colspan="2">NOMBRE DEL GRUPO</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td id="nombre-grupo"><a href="grupos">Este es el nombre del grupo 1 de investigacion o de estudio de la universidad de los llanos</a></td>
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
        <ul  class="pager">
          <li id="botones">
            <a href="#" style=" border-radius: 7px; background: #0072BC;
              background: -webkit-linear-gradient(top,#0072BC,#122d3e);
              background: -moz-linear-gradient(top,#0072BC,#122d3e);
              background: -o-linear-gradient(top,#0072BC,#122d3e);  
              background: linear-gradient(to bottom,#0072BC,#122d3e);  
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#0072BC, endColorstr=#122d3e);
              text-decoration: none;
              font-weight: bold;
              color:#fff">Anterior
            </a>
          </li> 
          <li id="botones">
            <a href="#" style=" border-radius: 7px; background: #0072BC;
              background: -webkit-linear-gradient(top,#0072BC,#122d3e);
              background: -moz-linear-gradient(top,#0072BC,#122d3e);
              background: -o-linear-gradient(top,#0072BC,#122d3e);  
              background: linear-gradient(to bottom,#0072BC,#122d3e);  
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#0072BC, endColorstr=#122d3e);
              text-decoration: none;
              font-weight: bold;
              color:#fff">Siguiente
            </a>
          </li>
      </ul>
    </nav>
  </div>

</form>
@stop
