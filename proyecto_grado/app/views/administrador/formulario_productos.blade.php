@extends('administrador.panel_admin')

@section('css-nuevos')
    {{-- datepicker --}}
    <link rel="stylesheet" href="{{URL::to('css/')}}/datepicker.css">
@stop

@section('javascript-nuevos')
   
    <script type="text/javascript" src="{{URL::to('/js')}}/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{{URL::to('/js')}}/locales/bootstrap-datepicker.es.js"></script>

@stop

@section('javascript-nuevos2')
    <script src="{{URL::to('js/')}}/fechas_formularios.js" type="text/javascript"></script>
    
    <script type="text/javascript">
         $('.date').datepicker()
    </script>
@stop

@section('cuerpo')
<div>  
   <form id="form-productos" autocomplete="on"  enctype="multipart/form-data" action="{{URL::to('creacion/formularioproductos')}}" method="post">
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


        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nuevo producto</h2></div>
        <ul>
            <fieldset> 

                <li class="@if($errors->has('titulo-producto')) has-error @endif"><label for="titulo-producto">Nombre del producto:</label>
                    <input type="text" id="titulo-producto" name="titulo-producto" value="{{Input::old('titulo-producto')}}" required="required"> 
                    @if ($errors->has('titulo-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('titulo-producto')}}</p> @endif
                </li>    
                <li><label for="fecha-proy">Fecha:</label>
                    <div class="container">
                        <div class="row">
                            <div class='col-sm-5' style="padding:0px;">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type="" style="cursor:pointer"   
                                        readonly id="fecha-proy" class="date form-control" data-format="dd/MM/yyyy" name="creacion-producto" value="{{Input::old('creacion-producto')}}" required="required" />
                                        @if ($errors->has('creacion-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('creacion-producto') }}</p> @endif 
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                               
                        </div>
                    </div>    
                </li>
                <li><label for="subtipo-proy">Subtipo de producto:</label> 
                    <select name="subtipo-proy" required="required">
                        @if(isset($subtipos))
                        @foreach($subtipos as $subtipo)
                           <option value="{{$subtipo['id_subtipo_producto']}}" > {{$subtipo['nombre_subtipo_producto']}}</option>
                        @endforeach
                        @endif

                    </select>

                    @if ($errors->has('subtipo-proy')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('subtipo-proy') }}</p> @endif
                </li>
                <li><label for="grupo-proy">Grupo:</label> 
                    <select name="grupo-proy" required="required">
                      @if(isset($grupoproductos))
                        @foreach($grupoproductos as $grupoproducto)
                           <option value="{{$grupoproducto['codigo_grupo']}}" > {{$grupoproducto['nombre_grupo']}}</option>
                        @endforeach
                      @endif

                    </select>

                    @if ($errors->has('grupo-proy')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('grupo-proy') }}</p> @endif

                </li>
                </li>
                <li><label for="linea-proy">Linea:</label> 
                    <select name="linea-proy" required="required">
                      @if(isset($lineasproductos))
                        @foreach($lineasproductos as $lineasproducto)
                           <option value="{{$lineasproducto['id_lineas']}}" > {{$lineasproducto['nombre_linea']}}</option>
                        @endforeach
                      @endif
                    </select>

                  @if ($errors->has('linea-proy')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('linea-proy') }}</p> @endif 

                </li>
                <div class="row">
                        <li>
                            <div class="col-md-2"><label>Integrantes: </label></div>
                             <div class="col-md-2"> 
                                <input style="margin-left: 30px;" type="button"  data-toggle="modal" data-target="#myModal-integrantes-producto" id="botones-especiales" value="Agregar/Ver Integrantes">
                            </div>
                        </li>
                    </div>

                    <!--haciendo una modal para agregar integrantes-->
                    <div class="modal fade" id="myModal-integrantes-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog"  style="width:960px">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                            </button>
                            <!--Agregando nuevos integrantes-->
                            <li style="margin-top: 15px;">
                                <label  style="width:inherit">Integrante: </label>
                                    <input type="text" id="integrantes-producto" name="integrantes-producto" value="" required="required"></br>
                            </li>    
                            <li>
                                <label  style="width:inherit">Grupo participante: </label>
                                    <input type="text" id="grupo-producto" name="grupo-producto" value="" required="required">
                            </li> 
                             <button type="button" class="btn btn-primary" ng-click="buscarUsuarios()" style="background:#1A6D71"><span class="glyphicon glyphicon-plus"></span> Agregar</button> 
                          </div>
                          
                          <div class="modal-body">
                            <table  data-url="/examples/bootstrap_table/data" data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                            id="tabla-integrantes-productos">
                              <thead>
                                <tr><th colspan="4">PARTICIPANTES DEL PRODUCTO</th></tr>
                                <tr>
                                  <th>Documento</th>
                                  <th colspan="1">Nombres y Apellidos</th>
                                  <th>Grupo</th>
                                  <th></th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td>1121889765</td>
                                  <td>Pepa Pombo</td>
                                  <td></td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>1121889765</td>
                                  <td>Pepa Pombo</td>
                                  <td></td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>1121887678</td>
                                  <td>Pepito Perez Gonzalez</td>
                                  <td></td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>1121889765</td>
                                  <td>Pepa Pombo</td>
                                  <td></td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" style="background:#1A6D71">Guardar Cambios</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--*******************************************
                    ******************-->
                <li><label for="entidad-prod">Entidad:</label>
                    <input type="tel" id="entidad-prod" name="entidad-prod" value="{{Input::old('entidad-prod')}}">
                     @if ($errors->has('entidad-prod')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('entidad-prod') }}</p> @endif
                </li>
                <li><label for="reconocimiento-prod">Reconocimiento:</label>
                    <input type="text" id="reconocimiento-prod" name="reconocimiento-prod" value="{{Input::old('reconocimiento-prod')}}">
                     @if ($errors->has('reconocimiento-prod')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('reconocimiento-prod') }}</p> @endif
                </li>
                <li><label for="desc-conv">Descripci&oacute;n:</label>
                    <textarea id="desc-conv" name="desc-conv" required="required">{{Input::old('desc-conv')}}</textarea>
                     @if ($errors->has('desc-conv')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('desc-conv') }}</p> @endif
                </li> 
            </fieldset>
        </ul>
        <ul>
            <fieldset>
                <li><label for="foto-producto">Foto del producto: </label>
                    <input type="file" id="foto-producto" name="foto-producto" value="{{Input::old('foto-producto')}}">
                    @if ($errors->has('foto-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('foto-producto') }}</p> @endif
                </li> 
                <li><label for="soporte-producto">Soporte del producto: </label>
                    <input type="file" id="soporte-producto" name="soporte-producto" value="{{Input::old('soporte-producto')}}">
                    @if ($errors->has('soporte-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('soporte-producto') }}</p> @endif
                </li>  
                <li><label for="tipo-soporte-producto">Tipo de Soporte: </label>
                    <input type="text" id="tipo-soporte-producto" name="tipo-soporte-producto" value="{{Input::old('tipo-soporte-producto')}}">
                    @if ($errors->has('tipo-soporte-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('tipo-soporte-producto') }}</p> @endif
                </li> 
                <li><label for="obs-soporte">Observaciones del soporte:</label>
                    <textarea id="obs-soporte" name="obs-soporte">{{Input::old('obs-soporte')}}</textarea>
                    @if ($errors->has('obs-soporte')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('obs-soporte') }}</p> @endif
                </li>     
            </fieldset> 
        </ul>    
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-producto" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16">
                        Crear producto
                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="reset">
                        <img alt="mal" src="images/ml.png" width="16" height="16">
                        Borrar todo
                    </th>
                </thead>
            </table>
    </form>    
</div>  
@stop    