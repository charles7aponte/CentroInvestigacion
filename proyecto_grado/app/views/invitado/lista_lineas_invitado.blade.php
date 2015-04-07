@extends('panel_cuerpo')

@section("javascript-nuevos")
  <script src="js/recursos/eliminar_datos.js" type="text/javascript"></script> 
  <script >
      URL='formulariolineas/eliminar/';
      fila_info="#dato_linea_";
  </script>

@section('contenido-principal')
<div>
    
    <form id="form-lineas1">
        
       <div id="titulo-listalineas1" id="cuadro"> 
          <h2>L&iacute;neas</h2>
        </div>

      <div id="tabla-listalineas1">
          <table id="listalineas1">
            <thead>
              <tr><th colspan="3"  style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  color:white;">L&Iacute;NEAS</th></tr>
              <tr>
                <th> </th>
                <th >NOMBRE DE LA L&Iacute;NEA</th>
                <th>UNIDAD ACADÉMICA</th>
              </tr>
            </thead>
            <?php
            $contador=(20*$numeropagina)-19;
            ?>

            <tbody>
              @if(isset($campo_lista))
                @foreach ($campo_lista as $campo)
                  @if($campo['estado']==1 ) 
                    <tr id="dato_linea_{{$campo['id_lineas']}}">
                      <td style="width:100px;">
                        <b> 
                          {{$contador++}}
                        </b>
                      </td> 
                      <td>
                        <a href="{{URL::to('lineainv/id')}}/{{$campo['id_lineas']}}">{{$campo['nombre_linea']}}</a>
                      </td>
                      <td>{{$campo['nombre_unidad_academica']}}</td>
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
    </form>
</div>
@stop