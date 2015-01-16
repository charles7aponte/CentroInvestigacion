@extends('administrador.panel_admin')

@section('cuerpo')

<form id="form-sublineas">
        
 <div id="titulo-listasublineas" id="cuadro"> 
    <h2>Lista de Subl&iacute;neas</h2>
  </div>

<div id="tabla-listasublineas">
  <table id="listasublineas">
    <thead>
      <tr><th colspan="3" style=" border-radius: 5px; background: #0072BC;
                  background: -webkit-linear-gradient(top,#0072BC,#122d3e);
                  background: -moz-linear-gradient(top,#0072BC,#122d3e);
                  background: -o-linear-gradient(top,#0072BC,#122d3e);  
                  background: linear-gradient(to bottom,#0072BC,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#0072BC, endColorstr=#122d3e); color:white;">SUBL&Iacute;NEAS</th></tr>
      <tr>
        <th>#</th>
        <th colspan="2">NOMBRE DE LA SUBL&Iacute;NEA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td id="nombre-sublinea"><a href="">Este es el nombre de la sublinea</a></td>
        <td>
          <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
          <a href="#" class="button">Eliminar</a>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td id="nombre-sublinea"><a href="">Sublinea 2</a></td>
        <td>
          <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
          <a href="#" class="button">Eliminar</a>
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