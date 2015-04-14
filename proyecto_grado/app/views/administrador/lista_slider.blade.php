@extends('administrador.panel_admin')

@section("javascript-nuevos")
  <script src="js/recursos/eliminar_datos.js" type="text/javascript"></script> 
  <script >
      URL='formularioslider/eliminar/';
      fila_info="#dato_slider_";
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

        <!--modal descripcion-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel" style="background:none;"><b>Descripci&oacute;n</b></h4>
          </div>
          <div class="modal-body">
            <div id="contenido_modal">
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>


    <form id="form-slider">
        
       <div id="titulo-listalineas" id="cuadro"> 
          <h2>Lista de Imagénes</h2>
        </div>

      <div id="tabla-slider">
          <table id="listalineas">
            <thead>
              <tr><th colspan="5"  style=" border-radius: 5px; background: #1A6D71;
                  background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
                  background: -moz-linear-gradient(top,#1A6D71,#122d3e);
                  background: -o-linear-gradient(top,#1A6D71,#122d3e);  
                  background: linear-gradient(to bottom,#1A6D71,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">IMAGENES DEL SLIDER</th></tr>
              <tr>
                <th> </th>
                <th>ARCHIVO</th>
                <th>DESCRIPCIÓN</th>
                <th></th>
              </tr>
            </thead>
            <?php
            $contador=(20*$numeropagina)-19;
            ?>

            <tbody>
              @if(isset($campo_lista))
                @foreach ($campo_lista as $campo)
                  @if($campo['estado_activacion']==1 ) 
                    <tr id="dato_slider_{{$campo['id_slider']}}"  
                    @if($campo['estado_activacion']==0) 
                    style="background:#BDBDBD"
                    @endif>

                      <td style="width:100px;">
                        <b> 
                          {{$contador++}}
                        </b>
                      </td> 

                      <td>
                         @if($campo['ruta_imagen']!="")
                            <a href="{{URL::to('archivos_db/slider/')}}/{{$campo['ruta_imagen']}}" target="_blank">
                                <i class="glyphicon glyphicon-picture"></i>
                                  Imagen ({{$campo['ruta_imagen']}})
                            <p></p>
                          @endif
                      </td>
                      <td style="width:120px;">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" 
                         data-info="{{{$campo['descripcion']}}}"
                         onclick="cargarmodal_descripcion(this);"
                         style="height:30px; width:120px; background:#E3E7E5;border-color:#E3E7E5; margin-right:15px; font-size:12px; color:#333;" >
                         Ver descripci&oacute;n
                        </button>
                    </td>

                      <td style="width:92px;">
                        <b onclick="eliminartipo({{$campo['id_slider']}})">
                        <a href="#" onclick="return false" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                        </b> 
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
    </form>
</div>
@stop