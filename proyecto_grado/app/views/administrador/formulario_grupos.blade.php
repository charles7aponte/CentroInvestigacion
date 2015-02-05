@extends('administrador.panel_admin')


@section('css-nuevos')
    {{-- datepicker --}}
    <link rel="stylesheet" href="{{URL::to('css/')}}/datepicker.css">
@stop

@section('javascript-nuevos')
   
    <script type="text/javascript" src="{{URL::to('/js')}}/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{{URL::to('/js')}}/locales/bootstrap-datepicker.es.js"></script>

    <script type="text/javascript" src="{{URL::to('/js')}}/recursos/formulariogrupos.js"></script>
    <script type="text/javascript" src="{{URL::to('/js')}}/recursos/formulariolineas.js"></script>
    <script type="text/javascript" src="{{URL::to('/js')}}/recursos/formulariointegrantes-lineasgrupos.js"></script>
@stop


@section('javascript-nuevos2')
    <script src="{{URL::to('js/')}}/fechas_formularios.js" type="text/javascript"></script>
    
    <script type="text/javascript">
         $('.date').datepicker()
    </script>
@stop


@section('cuerpo')
<div>  
    <form id="form-grupos" autocomplete="on" 
      enctype="multipart/form-data" 
      action="{{URL::to('creacion/formulariogrupos')}}" method="POST">

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

        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo grupo</h2></div>
            <ul>
                <fieldset>  
                    <li class="@if($errors->has('nombre')) has-error @endif">
                      <label for="nombre" >Nombre del grupo: </label>
                        <input type="text" id="nombre" name="nombre"  value="{{Input::old('nombre')}}" required="required"/>                
                         @if ($errors->has('nombre')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre') }}</p> 
                         @endif
                    </li> 

                    <li class="@if($errors->has('coord')) has-error @endif">
                      <label for="coord">Coordinador:</label>
                        <input type="text" id="coord" name="coord" value="" required="required"/>
                        <input type="hidden" id="cedula-persona" name="cedula-persona" value="" />
                          @if ($errors->has('coord')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('coord') }}</p> 
                         @endif
                    </li>

                    <li class="@if($errors->has('email')) has-error @endif">
                      <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{Input::old('email')}}" required="required" />
                          @if ($errors->has('email')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('email') }}</p> 
                         @endif          
                    </li>

                    <li class="@if($errors->has('pagina')) has-error @endif">
                      <label for="pagina">P&aacute;gina web:</label>
                        <input type="text" id="pagina" name="pagina" value="{{Input::old('pagina')}}"  autofocus="autofocus" />
                         @if ($errors->has('pagina')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('pagina') }}</p> 
                         @endif                        
                    </li>

                    <li class="@if($errors->has('telefono')) has-error @endif">
                      <label for="telefono">Tel&eacute;fono:</label>
                        <input type="tel" id="telefono" name="telefono" value="{{Input::old('telefono')}}"/>
                         @if ($errors->has('telefono')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('telefono') }}</p> 
                         @endif                   
                    </li>

                    <li class="@if($errors->has('direccion')) has-error @endif">
                      <label for="direccion">Direcci&oacute;n:</label>
                        <input type="text" id="direccion" name="direccion" value="{{Input::old('direccion')}}" required="required"/>
                         @if ($errors->has('direccion')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('direccion') }}</p>
                         @endif                     
                    </li>

                    <li><label for="creacion-grupo">Año de creaci&oacute;n:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" style="cursor:pointer" 
                                            readonly id="creacion-grupo" class="date form-control" data-format="dd/MM/yyyy" name="creacion-grupo" value="{{Input::old('creacion-grupo')}}" required="required" />
                                             @if ($errors->has('creacion')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('creacion-grupo') }}</p> @endif
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>    
                    </li>

                    <li class="@if($errors->has('unidad')) has-error @endif">
                      <label for="unidad">Unidad academica:</label>
                        <select required="required" name="unidad">
                          <option value="Departamento de biologia y quimica">
                            Departamento de biolog&iacute;a y qu&iacute;mica</option>
                          <option value="Departamento de matematicas y fisica">
                            Departamento de matem&aacute;ticas y f&iacute;sica</option>
                          <option value="Escuela de ingenieria">
                            Escuela de ingenier&iacute;a</option>
                          <option value="Instituto de ciencias ambientales">
                            Instituto de ciencias ambientales</option>
                        </select>
                         @if ($errors->has('unidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('unidad') }}</p> 
                         @endif                        
                    </li>

                    <li class="@if($errors->has('categoria')) has-error @endif">
                      <label for="categoria">Categor&iacute;a:</label>
                        <select required="required" name="categoria">
                          <option value="A1">A1</option>
                          <option value="A2">A2</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="reconocido">Reconocido</option>
                          <option value="institucional-unillanos">Institucional-Unillanos</option>
                          <option value="no reconocido">No reconocido</option>
                        </select>
                         @if ($errors->has('categoria')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('categoria') }}</p>
                         @endif                        
                    </li>

                    <li ><label for="tipo">Tipo:</label> 
                        <select name="tipo" required="required">
                              @if(isset($tipos))
                                @foreach($tipos as $tipo)
                                    <option value="{{$tipo['id']}}" > {{$tipo['tipo_grupo']}}</option>
                                @endforeach
                              @endif    

                        </select>
                    </li> 
                </fieldset>
            </ul>
            
                <fieldset>                   
                    <div class="row">
                        <div class="col-md-2"><label>Integrantes: </label></div>
                         <div class="col-md-2"> 
                            <input type="button"  data-toggle="modal" data-target="#myModal-integrantes" id="botones-especiales" value="Agregar/Ver Integrantes">
                        </div>
                    </div>
                    <!--haciendo una modal para agregar integrantes-->
                    <div class="modal fade" id="myModal-integrantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog"  style="width:960px">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                            </button>
                            <!--Agregando nuevos integrantes-->
                            <label  style="width:inherit">Integrante: </label>
                             <input type="text" id="integrantes-grupos"  value="" style="width:500px;"/>
                             <button type="button" class="btn btn-primary"  
                                id="bton_integrantes-grupos"
                              style="background:#1A6D71; display:none;"><span class="glyphicon glyphicon-plus"></span> Agregar</button> 
                          </div>
                          
                          <div class="modal-body">
                            <table  data-url="/examples/bootstrap_table/data" data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                            id="tabla-integrantes-grupos">
                              <thead>
                                <tr><th colspan="3">INTEGRANTES DEL GRUPO</th></tr>
                                <tr>
                                  <th># DOCUMENTO</th>
                                  <th colspan="2">Nombres y Apellidos</th>
                                </tr>
                              </thead>

                              <tbody>

                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="guardar-cambios" style="background:#1A6D71">Guardar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--*******************************************
                    ******************-->

                    <div class="row">
                        <div class="col-md-2"><label>Lineas: </label></div>
                         <div class="col-md-2"> 
                            <input type="button"  data-toggle="modal" data-target="#myModal-lineas" id="botones-especiales" value="Agregar/Ver Lineas">
                        </div>
                    </div>
                    <!--haciendo una modal para agregar lineas-->
                    <div class="modal fade" id="myModal-lineas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog"  style="width:960px">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                            </button>

                            <!--Agregando nuevas lineas-->
                            <label  style="width:inherit">L&iacute;nea: </label>
                             <input type="text" id="linea-grupos"  value="" />
                             <button type="button" class="btn btn-primary"  
                                id="bton_linea-grupos"
                              style="background:#1A6D71; display:none; width:inherit"><span class="glyphicon glyphicon-plus"></span> Agregar</button> 
                          </div>
                          
                          <div class="modal-body">
                            <table  data-url="/examples/bootstrap_table/data" data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" id="tabla-lineas-grupos">
                              <thead>
                                <tr><th colspan="3">L&iacute;neas</th></tr>
                                <tr>
                                  <th>C&oacute;digo</th>
                                  <th colspan="2">Nombre</th>
                                </tr>
                              </thead>

                              <tbody>
                            
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="guardar-cambios1" style="background:#1A6D71">Guardar</button>
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
                        <li class="@if($errors->has('objetivos')) has-error @endif">
                          <label for="objetivos">Objetivos:</label>
                          <textarea id="objetivos" name="objetivos" required="required" value="{{Input::old('objetivos')}}"></textarea>
                           @if ($errors->has('objetivos')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('objetivos') }}</p> 
                           @endif
                        </li>  

                        <li class="@if($errors->has('gruplac')) has-error @endif">
                          <label for="gruplac">Link Gruplac: </label>
                            <input type="text" id="gruplac" name="gruplac" value="{{Input::old('gruplac')}}"/>
                           @if ($errors->has('gruplac')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('gruplac') }}</p> 
                           @endif                            
                        </li>

                        <li class="@if($errors->has('logog')) has-error @endif">
                          <label for="logog">Logo del grupo:</label>
                            <input type="file"  id="logog" name="logog"  required="required" value="{{Input::old('logog')}}" />
                           @if ($errors->has('logog')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('logog') }}</p> 
                           @endif                            
                        </li>

                        <li class="@if($errors->has('afiche')) has-error @endif">
                          <label for="afiche">Ruta del afiche: </label>
                            <input type="file" id="afiche" name="afiche"/>
                          @if ($errors->has('afiche')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('afiche') }}</p> 
                          @endif                            
                        </li>

                        <li class="@if($errors->has('img1')) has-error @endif">
                          <label for="img1">Imagen 1: </label>
                            <input type="file"  id="img1" name="img1" value="{{Input::old('img1')}}"/>
                          @if ($errors->has('img1')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('img1') }}</p> 
                          @endif 
                        </li>

                        <li class="@if($errors->has('img2')) has-error @endif">
                          <label for="img2">Imagen 2: </label>
                            <input type="file"  id="img2" name="img2" value="{{Input::old('img2')}}" />
                          @if ($errors->has('img2')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('img2') }}</p> 
                         @endif
                        </li> 

                </fieldset> 
            </ul>   
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-grupo" type="submit" >
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear grupo
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