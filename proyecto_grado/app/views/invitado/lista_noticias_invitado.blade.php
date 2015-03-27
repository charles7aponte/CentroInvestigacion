@extends('administrador.panel_admin')

@section('cuerpo')
<div>
   
  <form id="form-noticias1">
          
   <div id="titulo-noticias1" id="cuadro"> 
      <h2>Noticias</h2>
    </div>
    <div id="tabla-noticias">
      <table id="listanoticias">
        <thead>
          <tr><th colspan="5" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  color:white;">NOTICIAS</th></tr>
          <tr>
            <th style="width:100px;"> </th>
            <th style="width:700px;">T&Iacute;TULO</th>
            <th style="width:100px;">FECHA</th>
          </tr>
        </thead>

        <?php
          $contador=(20*$numeropagina)-19;
        ?>
        <tbody>
            @if(isset($campo_lista))
              @foreach ($campo_lista as $campo)
                  <tr>
                    <td style="width:100px;">
                      <b>{{$contador++}}</b>
                    </td> 
                    <td style="width:700px;">
                      <a href="">{{$campo['titulo_evento']}}</a>
                    </td>
                    <td style="width:100px;">
                      <?php 

                            $fecha= new DateTime($campo['fecha']);
                            echo $fecha->format(' d')."/".$fecha->format('m')."/".$fecha->format('Y');
                      ?>
                    </td>
                  </tr>
              @endforeach
            @endif
      </table>

          <div style="margin-left:30px; margin-right:30px;"> 
              {{$links}}
          </div>
      </div>
    </div>
  </form>
</div>
@stop