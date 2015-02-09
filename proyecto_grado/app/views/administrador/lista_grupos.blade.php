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
      <h2>Grupos</h2>
  </div>

  <div id="tabla-listagrupos">
    <table id="listagrupos">
      <thead>
        <tr><th colspan="4" style=" border-radius: 5px; background: #1A6D71;
              background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
              background: -moz-linear-gradient(top,#1A6D71,#122d3e);
              background: -o-linear-gradient(top,#1A6D71,#122d3e);  
              background: linear-gradient(to bottom,#1A6D71,#122d3e);  
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">GRUPOS</th></tr>
        <tr>
          <th> </th>
          <th colspan="3">NOMBRE DEL GRUPO</th>
        </tr>
      </thead>
        <tbody>
          @if(isset($campo_lista))
          @foreach ($campo_lista as $campo)
            <tr>
              <td style="width:100px;">
                <b>{{$campo['codigo_grupo']}}</b>
              </td> 
              <td>
                <a href="{{URL::to('grupo/id')}}/{{$campo['codigo_grupo']}}">{{$campo['nombre_grupo']}}</a>
              </td>
              <td style="width:90px;">
                <a href="" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
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
