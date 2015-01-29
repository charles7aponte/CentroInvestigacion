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
    <form id="form-proyectos" autocomplete="on"  enctype="multipart/form-data" action="{{URL::to('creacion/formularioproyectos')}}" method="post">
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


        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nuevo proyecto</h2></div>
            <ul>
                <fieldset> 

                    <li class="@if($errors->has('nombre-proyecto')) has-error @endif">
                        <label for="nombre-proyecto">Nombre del proyecto:</label>
                        <input type="text" id="nombre-proyecto" name="nombre-proyecto" required="required" value="{{Input::old('nombre-proyecto')}}" /> 
                         @if ($errors->has('nombre-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre-proyecto') }}</p> @endif
                    </li>   
                    <li><label for="estado-proy">Estado:</label> 
                        <select name="estado-proy" required="required">
                            <option value=""></option>
                            <option value="aprobado">Aprobado</option>
                            <option value="rechazado">Rechazado</option>
                            <option value="evaluacion">En evaluaci&oacute;n</option>
                        </select>

                        @if ($errors->has('estado-proy')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('estado-proy') }}</p> @endif

                    </li>
                    <li><label for="fecha-proyecto">Fecha de inicio:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" style="cursor:pointer" 
                                            readonly id="fecha-proyecto" class="date form-control" data-format="dd/MM/yyyy" name="creacion_proyecto" value="{{Input::old('creacion_proyecto')}}" required="required" />
                                             @if ($errors->has('creacion_proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('creacion_proyecto') }}</p> @endif
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>    
                    </li>
                    <li><label for="convocatoria-proyecto">Convocatoria:</label> 
                        <select name="convocatoria-proyecto" required="required">
                              @if(isset($convocatorias))
                                @foreach($convocatorias as $convocatoria)
                                    <option value="{{$convocatoria['numero_convocatoria']}}" > {{$convocatoria['titulo_convocatoria']}}</option>
                                @endforeach
                              @endif    

                        
                        </select>

                        @if ($errors->has('convocatoria-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('convocatoria-proyecto') }}</p> @endif
                    </li> 
                    <li><label for="linea-proyecto">Linea del proyecto:</label> 
                        <select name="linea-proyecto" required="required">

                          @if(isset($lineas))
                                @foreach($lineas as $linea)
                                    <option value="{{$linea['id_lineas']}}" > {{$linea['nombre_linea']}}</option>
                                @endforeach
                          @endif  
                            
                        </select>

                        @if ($errors->has('linea-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('linea-proyecto') }}</p> @endif
                    </li> 
                    <li><label for="grupo1-proyecto">Grupo 1 del proyecto:</label> 
                        <select name="grupo1-proyecto" required="required">

                          @if(isset($grupos))
                                @foreach($grupos as $grupo)
                                    <option value="{{$grupo['codigo_grupo']}}" > {{$grupo['nombre_grupo']}}</option>
                                @endforeach
                          @endif 
                        </select>

                        @if ($errors->has('grupo1-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('grupo1-proyecto') }}</p> @endif
                    </li> 
                    <li><label for="grupo2-proyecto">Grupo 2 del proyecto:</label> 
                        <select name="grupo2-proyecto">

                          @if(isset($grupos1))
                                @foreach($grupos1 as $grupo1)
                                    <option value="{{$grupo1['codigo_grupo']}}" > {{$grupo1['nombre_grupo']}}</option>
                                @endforeach
                          @endif 
                      
                        </select>

                        @if ($errors->has('grupo2-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('grupo2-proyecto') }}</p> @endif
                    </li> 
                    <li><label for="obj-proyecto">Objetivo general:</label>
                        <textarea id="obj-proyecto" name="obj-proyecto" required="required">{{Input::old('obj-proyecto')}}</textarea>
                        @if ($errors->has('obj-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('obj-proyecto') }}</p> @endif
                    </li>

                    <div class="row">
                        <li>
                            <div class="col-md-2"><label>Integrantes: </label></div>
                             <div class="col-md-2"> 
                                <input style="margin-left: 31px;" type="button"  data-toggle="modal" data-target="#myModal-integrantes-proyecto" id="botones-especiales" value="Agregar/Ver Integrantes">
                            </div>
                        </li>
                    </div>

                    <!--haciendo una modal para agregar integrantes-->
                    <div class="modal fade" id="myModal-integrantes-proyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog"  style="width:960px">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                            </button>
                            <!--Agregando nuevos integrantes-->
                            <li style="margin-top: 15px;">
                                <label  style="width:inherit">Integrante: </label>
                                    <input type="text" id="integrantes-proyectos" name="integrantes-proyecto" value="" ></br>
                            </li>    
                            <li>
                                <label  style="width:inherit">Tiempo dedicado: </label>
                                    <input type="text" id="tiempo-proyecto" name="tiempo-proyecto" value="">
                            </li> 
                             <button type="button" class="btn btn-primary" ng-click="buscarUsuarios()" style="background:#1A6D71"><span class="glyphicon glyphicon-plus"></span> Agregar</button> 
                          </div>
                          
                          <div class="modal-body">
                            <table  data-url="/examples/bootstrap_table/data" data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                            id="tabla-integrantes-proyectos">
                              <thead>
                                <tr><th colspan="4">INTEGRANTES DEL GRUPO</th></tr>
                                <tr>
                                  <th>Documento</th>
                                  <th colspan="1">Nombres y Apellidos</th>
                                  <th>Tiempo dedicado</th>
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
                </fieldset>
            </ul>
                
            <ul>
                <fieldset>
                    <li><label for="actaini-proyectos">Archivo del Acta de inicio: </label>
                        <input type="file" id="actaini-proyectos" name="actaini-proyectos" value="{{Input::old('actaini-proyectos')}}"/>
                        @if ($errors->has('actaini-proyectos')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('actaini-proyectos') }}</p> @endif
                    </li>     
                    <li><label for="propuesta-proyecto">Archivo de la propuesta: </label>
                        <input type="file" id="propuesta-proyecto" name="propuesta-proyecto" value="{{Input::old('propuesta-proyecto')}}" />
                        @if ($errors->has('propuesta-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('propuesta-proyecto') }}</p> @endif
                    </li>  
                    <li><label for="informe-proyecto">Archivo del informe final: </label>
                        <input type="file" id="informe-proyecto" name="informe-proyecto" value="{{Input::old('informe-proyecto')}}" />
                        @if ($errors->has('informe-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('informe-proyecto') }}</p> @endif
                    </li>      
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-proyecto" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear proyecto
                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="reset">
                        <img alt="mal" src="images/ml.png" width="16" height="16" />
                        Borrar todo
                    </th>
                </thead>
            </table>  
    </form>    
</div>  
@stop    