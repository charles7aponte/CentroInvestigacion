@extends('administrador.panel_admin')

@section('cuerpo')

<form id="form-empresas">
        
   <div id="titulo-listaempresas" id="cuadro"> 
      <h2>Lista de Empresas</h2>
    </div>

  <div id="tabla-listaempresas">
      <table id="listaempresas">
          <thead>
            <tr>
              <th colspan="4"  style=" border-radius: 5px; background: #1A6D71;
                background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
                background: -moz-linear-gradient(top,#1A6D71,#122d3e);
                background: -o-linear-gradient(top,#1A6D71,#122d3e);  
                background: linear-gradient(to bottom,#1A6D71,#122d3e);  
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">EMPRESAS
              </th>
            </tr>
            <tr>
              <th colspan="1">NIT</th>
              <th colspan="3">NOMBRE DE LA EMPRESA</th>
            </tr>
          </thead>

          <tbody>
            @if(isset($campo_lista))
              @foreach ($campo_lista as $campo)
                <tr>
                  <td style="width:150px;">
                    <b>{{$campo['nit_empresa']}}</b>
                  </td> 
                  <td>
                    <a href="">{{$campo['nombre_empresa']}}</a>
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
</form>
@stop