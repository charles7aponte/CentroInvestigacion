@extends('administrador.panel_admin')

@section("javascript-nuevos")
  <script src="{{URL::to('/')}}/js/recursos/eliminar_datos.js" type="text/javascript"></script> 
  <script src="{{URL::to('/')}}/js/recursos/buscador_listas.js" type="text/javascript"></script>
  <script >
      URL='{{URL::to('/')}}/formularioconvocatorias/eliminar/';
      fila_info="#dato_convocatoria_";
  </script>

@section('cuerpo')

  <form id="form-convocatorias1">
          
   <div id="titulo-listaconvocatoria1" id="cuadro"> 
      <h2>Convocatorias</h2>
   </div>
   
   <div id="buscador-lista">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input id="titulo_buscar" type="text" class="form-control" value="{{(isset($titulo) && $titulo)?$titulo:'' }}" placeholder="" >         <button id="bton_buscar_titulo" type="button" href="{{URL::to('/')}}/listadeconvocatorias/find/" 
          class="btn btn-default"
          onclick="buscar_listas()" 
          ><i class="glyphicon glyphicon-search"></i>Buscar</button>

        </div>
      </form>
    </div>

    <div id="tabla-listaconvocatorias1">
      <table id="listaconvocatorias1">
        <thead>
          <tr><th colspan="5" style="border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  color:white;">CONVOCATORIAS</th></tr>
          <tr>
            <th> </th>
            <th >T&iacute;TULO CONVOCATORIA</th>
            <th>ESTADO</th>
            <th>FECHA APERTURA</th>
            <th>FECHA CIERRE</th>
          </tr>
        </thead>
        <tbody>
            @if(isset($campo_lista))
              @foreach ($campo_lista as $campo)
                @if($campo['estado1']==1 ) 
                  <tr id="dato_sublinea_{{$campo['numero_convocatoria']}}">
                    <td style="width:100px;">
                      <b>{{$campo['numero_convocatoria']}}</b>
                    </td> 
                    <td>
                      <a href="{{URL::to('convocatoria/id')}}/{{$campo['numero_convocatoria']}}">
                        {{$campo['titulo_convocatoria']}}
                      </a>
                    </td>
                    <td style="text-transform:capitalize;">
                      {{$campo['estado']}}
                    </td>
                    <td style="text-transform:capitalize;">
                      {{$campo['fecha_apertura']}}
                    </td>
                    <td style="text-transform:capitalize;">
                      {{$campo['fecha_cierre']}}
                    </td>
                  </tr>
                @endif
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
</div>
@stop