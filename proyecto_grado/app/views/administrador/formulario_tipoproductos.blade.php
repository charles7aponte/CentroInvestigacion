@extends('administrador.panel_admin')


@section('cuerpo')
<div>  
    <form id="form-tipoproducto" autocomplete="on"   action="{{URL::to('creacion/formulariotipoproductos')}}" method="post">

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



        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo tipo de producto</h2></div>
                       <ul>
                <fieldset style="border-color:transparent">

                    <li class="@if($errors->has('tipo-producto')) has-error @endif">
                        <label for="tipo-producto">Nombre tipo producto:</label> 
                          <input id="tipo-producto" type="text" name="tipo-producto" value="{{Input::old('tipo-producto')}}" required="required">
                    </li>   

                    <li class="@if($errors->has('desc-tipo-producto')) has-error @endif">
                      <label for="desc-tipo-producto">Descripci&oacute;n:</label>
                        <textarea id="desc-tipo-producto" name="desc-tipo-producto">{{Input::old('desc-tipo-producto')}}</textarea>
                          @if ($errors->has('desc-tipo-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('desc-tipo-producto') }}</p> @endif 
                    </li>    
 
                </fieldset> 
            </ul> 
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-tipoproducto" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear
                        </button>
                    </th>
                </thead>
            </table>

            <ul> 
              <table id="tabla-tipo-productos" style="margin-top:40px; width:950px;">
                  <thead>
                    <tr><th colspan="4">TIPOS DE PRODUCTO</th></tr>
                    <tr>
                      <th>C&oacute;digo</th>
                      <th>Nombre del tipo de producto</th>
                      <th>Descripci&oacute;n</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>01</td>
                      <td>Estudio</td>
                      <td><button style="font-size: 12px; margin: 3px; color: white; background-color: rgb(39, 107, 111);" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Ver descripci&oacute;n</button></td>
                      <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                                  <h4 class="modal-title" id="myModalLabel">Descripci&oacute;n</h4>
                                </div>
                                <div class="modal-body">
                                  ...
                                </div>
                              </div>
                            </div>
                          </div>
                      <td>
                        <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                      </td>
                      
                    </tr>
                    <tr>
                      <td>02</td>
                      <td>Investigaci&oacute;n</td>
                      <td></td>
                      <td>
                        <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </ul>

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="guardar-tipoproducto" type="submit" style="margin-top:10px;">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Guardar 
                        </button>
                    </th>
                </thead>
            </table> 
    </form>    
</div>  
@stop    