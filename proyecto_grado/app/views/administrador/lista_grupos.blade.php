@extends('administrador.panel_admin')

@section("javascript-nuevos")
  <script src="js/recursos/eliminar_datos.js" type="text/javascript"></script>
  <script src="js/ActivarDesactivarGrupo.js" type="text/javascript"></script>  
  <script >
      URL='formulariogrupos/eliminar/';
      fila_info="#dato_grupo_";
  </script>

@section('cuerpo')
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

  <form id="form-grupos" class="gradient">
          
    <div id="titulo-listagrupo" id="cuadro"> 
        <h2>Grupos</h2>
    </div>

    <div id="tabla-listagrupos">
      <table id="listagrupos">
        <thead>
          <tr><th colspan="5" style=" border-radius: 5px; background: #1A6D71;
                background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
                background: -moz-linear-gradient(top,#1A6D71,#122d3e);
                background: -o-linear-gradient(top,#1A6D71,#122d3e);  
                background: linear-gradient(to bottom,#1A6D71,#122d3e);  
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">GRUPOS</th></tr>
          <tr>
            <th> </th>
            <th colspan="4">NOMBRE DEL GRUPO</th>
            <th> </th>
          </tr>
        </thead>
          <tbody>
            <?php 
              $contador=1;

            ?>
            @if(isset($campo_lista))
              @foreach ($campo_lista as $campo)
                  <tr id="dato_grupo_{{$campo['codigo_grupo']}}" 
                    @if($campo['estado_activacion']==0) 
                    style="background:rgb(198, 124, 124)"
                    @endif
                   >
                    <td style="width:100px;">
                      <b>{{$contador++}}</b>
                    </td> 
                    <td>
                      <a  href="{{URL::to('grupo/id')}}/{{$campo['codigo_grupo']}}">{{$campo['nombre_grupo']}}</a>
                    </td>

                    <td style="width:92px;">
                      <a href="#"
                       data-info-estado="{{$campo['estado_activacion']}}"
                       onclick="activacion_desactivacion({{$campo['codigo_grupo']}},this)">
                       <p style="margin:0;">
                        @if($campo['estado_activacion']==0)
                        <i class="glyphicon glyphicon-ok-circle"></i> Activar
                        @else 
                        <i class="glyphicon glyphicon-remove-circle"></i> Desactivar
                        @endif
                      </p>
                     </a>
                    </td>

                    <td style="width:90px;">
                      <a href="formulariogrupos/edit/{{$campo['codigo_grupo']}}" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                    </td>
                    <td style="width:92px;">
                      <b  onclick="eliminartipo({{$campo['codigo_grupo']}})">
                      <a href="#" onclick="return false" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
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
</div>
@stop
