@extends('panel_cuerpo')

@section("javascript-nuevos")

@section('contenido-principal')
<div>
  <form id="form-grupos1" class="gradient">
          
    <div id="titulo-listagrupo1" id="cuadro"> 
        <h2>Grupos</h2>
    </div>

    <div id="tabla-listagrupos1">
      <table id="listagrupos1">
        <thead>
          <tr><th colspan="4" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  color:white;">GRUPOS</th></tr>
          <tr>
            <th> </th>
            <th>NOMBRE DEL GRUPO</th>
            <th>UNIDAD ACADÉMICA </th>
            <th>DIRECTOR GRUPO</th>
          </tr>
        </thead>
          <tbody>
            <?php
            $i=1;
            $contador=(20*$numeropagina)-19;
            ?>
            @if(isset($campo_lista))
              @foreach ($campo_lista as $campo)
                  <tr id="dato_grupo_{{$campo['codigo_grupo']}}"> 
                    <td style="width:auto;">
                      <b> 
                          {{$contador++;}}         
                      </b>
                    </td> 

                    <td>
                      <a  href="{{URL::to('grupoinv/id')}}/{{$campo['codigo_grupo']}}">{{$campo['nombre_grupo']}}</a>
                    </td>

                    <td>{{$campo['nombre_unidad_academica']}}</td>

                    <td><a href="">{{$campo['nombre_coordinador_grupo']}}</a></td>
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
</div>
@stop
