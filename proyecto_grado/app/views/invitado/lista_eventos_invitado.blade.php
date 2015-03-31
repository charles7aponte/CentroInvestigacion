@extends('panel_cuerpo')

@section("javascript-nuevos")
  <script src="js/recursos/eliminar_datos.js" type="text/javascript"></script> 
  <script >
      URL='formularioeventosnoticias/eliminar/';
      fila_info="#dato_eventonoticia_";
  </script>

@section('contenido-principal')
<div>
    <!--Alerta de confirmar eliminacion de datos-->
    <div class="modal fade bs-example-modal-lg" id="eliminar-confirmar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg"  style="width:500px;margin-left:400px;" >
        <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirmaci&oacute;n</h4>
          </div>
          <div class="modal-body">
            <p>¿Esta seguro que desea eliminarlo?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="eliminacionremota();"
            style=" border-radius: 5px; background: #1A6D71; border-color:white; color:white;">Aceptar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!-- /.modal-content -->
        </div>
      </div>
    </div>


  <form id="form-eventos">
          
   <div id="titulo-listaeventos" id="cuadro"> 
      <h2>Eventos</h2>
    </div>
    <div id="tabla-eventos">
      <table id="listaeventos">
        <thead>
          <tr><th colspan="3" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  color:white;">EVENTOS</th></tr>
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
      </div>
    </div>
  </form>
</div>
@stop