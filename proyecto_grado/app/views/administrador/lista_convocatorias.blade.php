@extends('administrador.panel_admin')

@section('cuerpo')

<form id="form-convocatorias">
    <div id="titulo-listaconvocatoria" id="cuadro"> 
      <h2>Lista de Convocatorias</h2>
    </div>
      <div id="tabla-listaconvocatorias">
        <table id="listaconvocatorias">
          <thead>
            <tr><th colspan="4" style="background: #1A6D71;
                    background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
                    background: -moz-linear-gradient(top,#1A6D71,#122d3e);
                    background: -o-linear-gradient(top,#1A6D71,#122d3e);  
                    background: linear-gradient(to bottom,#1A6D71,#122d3e);  
                    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;";>CONVOCATORIAS</th></tr>
            <tr>
              <th> </th>
              <th colspan="3">Ti&iacute;tulo de la convocatoria</th>
            </tr>
          </thead>
          <tbody>
          @if(isset($campo_lista))
          @foreach ($campo_lista as $campo)
            <tr>
              <td style="width:100px;">
                <b>{{$campo['numero_convocatoria']}}</b>
              </td> 
              <td>
                <a href="">{{$campo['titulo_convocatoria']}}</a>
              </td>
              <td style="width:90px;">
                <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
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
    </div>
</form>
@stop


