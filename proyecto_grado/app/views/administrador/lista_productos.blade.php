@extends('administrador.panel_admin')

@section('cuerpo')

<form id="form-productos">

  <div id="titulo-listaproductos" id="cuadro"> 
      <h2>Lista de Productos</h2>
    </div>

  <div id="tabla-listaproductos">
    <table id="listaproductos">
      <thead>
        <tr><th colspan="3" style="background: #1A6D71;
            background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
            background: -moz-linear-gradient(top,#1A6D71,#122d3e);
            background: -o-linear-gradient(top,#1A6D71,#122d3e);  
            background: linear-gradient(to bottom,#1A6D71,#122d3e);  
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">PRODUCTOS</th></tr>
        <tr>
          <th> </th>
          <th colspan="2">NOMBRE DEL PRODUCTO</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td id="nombre-producto"><a href="">Este es el nombre del Producto</a></td>
          <td>
            <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
            <a href="#" class="button">Eliminar</a>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td id="nombre-producto"><a href="">producto 2</a></td>
          <td>
            <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
            <a href="#" class="button">Eliminar</a>
          </td>
        </tr>
      </tbody>
    </table>
        <nav>
        <ul class="pager">
          <li id="botones"><a href="#" style="border-radius: 7px; background: #1A6D71;
            background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
            background: -moz-linear-gradient(top,#1A6D71,#122d3e);
            background: -o-linear-gradient(top,#1A6D71,#122d3e);  
            background: linear-gradient(to bottom,#1A6D71,#122d3e);  
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e);
            text-decoration: none;
            font-weight: bold;
            color:#fff">Anterior</a></li> 
          <li id="botones"><a href="#" style="border-radius: 7px; background: #1A6D71;
            background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
            background: -moz-linear-gradient(top,#1A6D71,#122d3e);
            background: -o-linear-gradient(top,#1A6D71,#122d3e);  
            background: linear-gradient(to bottom,#1A6D71,#122d3e);  
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e);
            text-decoration: none;
            font-weight: bold;
            color:#fff">Siguiente</a></li>
        </ul>
      </nav>
  </div>
</form>
@stop