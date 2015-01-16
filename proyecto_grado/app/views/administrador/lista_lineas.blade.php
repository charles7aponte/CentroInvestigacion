@extends('administrador.panel_admin')

@section('cuerpo')

<form id="form-lineas">
        
   <div id="titulo-listalineas" id="cuadro"> 
      <h2>Lista de L&iacute;neas</h2>
    </div>

  <div id="tabla-listalineas">
      <table id="listalineas">
        <thead>
          <tr><th colspan="3"  style=" border-radius: 5px; background: #0072BC;
                  background: -webkit-linear-gradient(top,#0072BC,#122d3e);
                  background: -moz-linear-gradient(top,#0072BC,#122d3e);
                  background: -o-linear-gradient(top,#0072BC,#122d3e);  
                  background: linear-gradient(to bottom,#0072BC,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#0072BC, endColorstr=#122d3e); color:white;">L&Iacute;NEAS</th></tr>
          <tr>
            <th>#</th>
            <th colspan="2">NOMBRE DE LA L&Iacute;NEA</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td id="nombre-linea"><a href="">Este es el nombre de la linea</a></td>
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