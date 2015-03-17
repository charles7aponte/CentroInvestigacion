@extends('administrador.panel_admin')

@section('cuerpo')

<form id="form-proyectos">
        
   <div id="titulo-listaproyectos" id="cuadro"> 
      <h2>Lista de Proyectos</h2>
    </div>

   <div id="buscador-lista">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="">
          <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>Buscar</button>
        </div>
      </form>
    </div>

  <div id="tabla-listaproyectos">
      <table id="listaproyectos">
        <thead>
          <tr><th colspan="5"  style=" border-radius: 5px; background: #1A6D71;
              background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
              background: -moz-linear-gradient(top,#1A6D71,#122d3e);
              background: -o-linear-gradient(top,#1A6D71,#122d3e);  
              background: linear-gradient(to bottom,#1A6D71,#122d3e);  
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">PROYECTOS</th></tr>
          <tr>
            <th> </th>
            <th colspan="4">NOMBRE DEL PROYECTO</th>
          </tr>
        </thead>

        <tbody>
           @if(isset($campo_lista))
          @foreach ($campo_lista as $campo)
            <tr>
              <td style="width:100px;">
                <b>{{$campo['codigo_proyecto']}}</b>
              </td> 
              <td>
                <a href="{{URL::to('proyecto/id')}}/{{$campo['codigo_proyecto']}}">{{$campo['nombre_proyecto']}}</a>
              </td>
              <td style="width:90px;">
                <a href="formularioproyectos/edit/{{$campo['codigo_proyecto']}}" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
              </td>
              <td style="width:155px;">
                <a href="formulariofinanciamiento/edit/{{$campo['codigo_proyecto']}}" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar Financiamiento</a>
              </td>
              <td style="width:90px;">
                <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
              </td>
            </tr>
          @endforeach
          @endif
        </tbody>
      </table>

        <div style="margin-left:30px; margin-right:30px;"> 
            {{$links}}
        </div>
  </div>
</form>
@stop