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
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo grupo</h2></div>
            <ul>
                <fieldset>  
                    <li><label for="nombre">Nombre del grupo: </label>
                        <input type="text" id="nombre" name="nombre" value="" required="required"/>
                    </li>    
                    <li><label for="coord">Coordinador:</label>
                        <input type="text" id="coord" name="coord" value="" required="required"/>
                    </li>
                    <li><label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="" required="required" />
                    </li>
                    <li><label for="pagina">P&aacute;gina web:</label>
                        <input type="text" id="pagina" name="pagina" value=""  autofocus="autofocus" />
                    </li>
                    <li><label for="telefono">Tel&eacute;fono:</label>
                        <input type="tel" id="telefono" name="telefono" value=""/>
                    </li>
                    <li><label for="direccion">Direcci&oacute;n:</label>
                        <input type="text" id="direccion" name="direccion" value="" required="required"/>
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
                    <li><label for="unidad">Unidad acad&eacute;mica:</label>
                        <input type="text" id="unidad" name="unidad" value="" required="required"/>
                    </li>
                    <li><label for="categoria">Categor&iacute;a:</label>
                        <input type="text" id="categoria" name="categoria" value="" required="required"/>
                    </li>
                    <li><label for="tipo">Tipo:</label> 
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
                            <button type="button" class="btn btn-primary" id="guardar-cambios" style="background:#1A6D71">Guardar</button>
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
                        <li><label for="objetivos">Objetivos:</label>
                        <textarea id="objetivos" name="objetivos" required="required"></textarea>
                        </li>  
                        <li><label for="gruplac">Link Gruplac: </label>
                            <input type="text" id="gruplac" name="gruplac" />
                        </li>
                        <li><label for="logog">Logo del grupo:</label>
                            <input type="file"  id="logog" name="logog"  required="required" />
                        </li>
                        <li><label for="afiche">Ruta del afiche: </label>
                            <input type="file" id="afiche" name="afiche"/>
                        </li>
                        <li><label for="img1">Imagen 1: </label>
                            <input type="file"  id="img1" name="img1" />
                        </li>
                        <li><label for="img2">Imagen 2: </label>
                            <input type="file"  id="img2" name="img2" />
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