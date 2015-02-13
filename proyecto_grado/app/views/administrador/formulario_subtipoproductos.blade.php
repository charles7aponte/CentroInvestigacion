@extends('administrador.panel_admin')

@section("javascript-nuevos")
  <script src="js/recursos/eliminar_datos.js" type="text/javascript"></script> 
  <script>
      URL='formulariosubtipoproductos/eliminar/';
      fila_info="#dato_subtipoproducto_";
  </script>

@stop

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

      <!--Alerta de confirmar eliminacion de datos-->
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



    <form id="form-subtipoproducto" autocomplete="on"   action="{{URL::to('creacion/formulariosubtipoproductos')}}" method="post">

        @if(Session::has('mensaje_error') || Session::has('mensaje_success'))
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                @if(Session::has('mensaje_success'))    
                    <div style="margin: 0px;" class="alert alert-success">{{Session::get('mensaje_success')}}</div>
                @endif

                @if(Session::has('mensaje_error'))
                    <div  style="margin: 0px;" class="alert alert-danger">{{ Session::get('mensaje_error')}}</div>   
                @endif 
            </fieldset>
        @endif


        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo subtipo de producto</h2></div>
          <ul>
            <fieldset style="border-color:transparent">

                <li class="@if($errors->has('subtipo-producto')) has-error @endif">
                    <label for="subtipo-producto">Nombre subtipo producto:</label> 
                      <input id="subtipo-producto" type="text" name="subtipo-producto" value="{{Input::old('subtipo-producto')}}" required="required">
                      @if ($errors->has('subtipo-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('subtipo-producto') }}</p> @endif 
                </li> 

                <li><label for="subtipo-tipo-producto">Tipo de producto:</label> 
                    <select name="subtipo-tipo-producto">
                     <!--si existe .. esta variable llega del controlador, que a su vez lo pide el modelo -->
                      @if(isset($tipos))
                         @foreach ($tipos as $tipo) <!--array--- nombre del campo en la bd-->
                           <option value="{{$tipo['id_tipo_producto']}}">{{$tipo['nombre_tipo_producto']}}</option>
                         @endforeach 

                      @endif
                    </select>      
                </li>   

                <li class="@if($errors->has('desc-subtipo-producto')) has-error @endif">
                    <label for="desc-subtipo-producto">Descripci&oacute;n:</label>
                    <textarea id="desc-subtipo-producto" name="desc-subtipo-producto">{{Input::old('desc-subtipo-producto')}}</textarea>
                      @if ($errors->has('desc-subtipo-producto')) <p style="margin-left: 169px;" class="help-block">{{ $errors->first('desc-subtipo-producto') }}</p> @endif 
                </li>  
            </fieldset> 
          </ul> 
          <table id="botones-formularios">
              <thead>
                  <th id="crear">
                      <button id="crear-subtipoproducto" type="submit">
                      <img alt="bien"  src="images/bn.png" width="16" height="16" />
                      Crear
                      </button>
                  </th>
                  <th id="borrar">
                      <button id="reset-button" type="reset">
                      <img alt="mal" src="images/ml.png" width="16" height="16" />
                      Borrar campos
                    </button>
                    </th>
              </thead>
          </table>
    </form>  
      <ul> 
        <table id="tabla-subtipo-productos" style="margin-top:40px; width:950px;">
            <thead>
              <tr><th colspan="5">SUBTIPOS DE PRODUCTO</th></tr>
              <tr>
                <th>Nombre del subtipo de producto</th>
                <th>Descripci&oacute;n</th>
                <th>Tipo producto</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <!--insertando en la tabla los registros-->
                @if(isset($subtipoproductos))
                        
                   @foreach ($subtipoproductos as $subtipoproducto) <!--array- que viene del controlador-->
                    <tr id="dato_subtipoproducto_{{$subtipoproducto['id_subtipo_producto']}}">
                    <td style="width:500px;"><b>{{$subtipoproducto['id_subtipo_producto']}}.</b> {{$subtipoproducto['nombre_subtipo_producto']}}</td>
                    <td style="width:120px;">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" 
                         data-info="{{{$subtipoproducto['descripcion_subtipo_producto']}}}"
                         onclick="cargarmodal_descripcion(this);"
                         style="height:30px; width:120px; background:#E3E7E5;border-color:#E3E7E5; margin-right:15px; font-size:12px; color:#333;" >
                         Ver descripci&oacute;n
                        </button>
                    </td>
                    <td>{{$subtipoproducto['nombre_campo']}}</td>
                    <td style="width:100px;">
                     <b onclick="eliminartipo({{$subtipoproducto['id_subtipo_producto']}})" > <a href="#" onclick="return false" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                     </b>
                    </td>
                  </tr>
                   @endforeach
                @endif 
            </tbody>
          </table>
      </ul>
</div>  
@stop    