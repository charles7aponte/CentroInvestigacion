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
    <script src="{{URL::to('js/')}}/recursos/formularioproyectos.js" type="text/javascript"></script>
@stop



@section('cuerpo')


<?php
    $estado_proyecto=array('aprobado','rechazado','evaluacion');
?>

<div>  

    <form id="form-proyectos" autocomplete="on" enctype="multipart/form-data"
     @if(isset($proyectos))
        action="{{URL::to('edicion/formularioproyectos')}}"
     @else
        action="{{URL::to('creacion/formularioproyectos')}}"
        <?php 
        $proyectos = null;
        ?>
     @endif 

    method="post">  

    <!-- en caso de no existir el id-->
        @if(isset($accion) && $accion=="editar")
              
            @if(!isset($proyectos) || !$proyectos)
                <fieldset style="margin-bottom: 2px;
                        margin-top: 5px;
                        padding: 2px;">

                        <div  style="margin: 0px;" class="alert alert-danger">No existe el Proyecto</div> 
                </fieldset>  
 
            @endif    
        @endif

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


        @if(isset($proyectos['codigo_proyecto']))

            <input type="hidden" name="id_proyecto" value="{{$proyectos['codigo_proyecto']}}">
        @endif

        <div id="titulo"><h2><li class="glyphicon glyphicon-pencil" style="font-size: 20px;"></li>
           
            @if(isset($proyectos['codigo_proyecto']))
              Edicion Proyectos
            @else 
                 Crear Proyecto
            @endif

        </h2></div>
   
          
            <ul>
                <fieldset> 

                    <li class="@if($errors->has('nombre-proyecto')) has-error @endif">
                        <label for="nombre-proyecto">Nombre del proyecto:</label>
                        <input type="text" id="nombre-proyecto" name="nombre-proyecto" required="required" value="{{Input::old('nombre-proyecto')!=null? Input::old('nombre-proyecto'): (isset($proyectos['nombre_proyecto'])? $proyectos['nombre_proyecto']:'')}}" /> 
                         @if ($errors->has('nombre-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre-proyecto') }}</p> @endif
                    </li>   
                    <li><label for="estado-proy">Estado:</label> 
                        <select name="estado-proy" required="required" value="{{Input::old('estado-proy')!=null? Input::old('estado-proy'): (isset($proyectos['estado_proyecto'])? $proyectos['estado_proyecto']:'')}}">
                            @foreach ($estado_proyecto as $elemento)

                            @if(isset($proyectos['estado_proyecto']) && $elemento==$proyectos['estado_proyecto'])
                                <option value="{{$elemento}}" selected>{{$elemento}}</option>
                            @else 
                                <option value="{{$elemento}}">{{$elemento}}</option>
                            @endif         
                          @endforeach
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
                                            readonly id="fecha-proyecto" class="date form-control" data-format="yyyy-mm-dd" name="creacion_proyecto" value="{{Input::old('creacion_proyecto')!=null? Input::old('creacion_proyecto'): (isset($proyectos['fecha_proyecto'])? $proyectos['fecha_proyecto']:'')}}" required="required" />
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


                                @if(isset($proyectos['inv_numero_convocatoria']) && $convocatoria['numero_convocatoria'] == $proyectos['inv_numero_convocatoria'])
                                    <option value="{{$convocatoria['numero_convocatoria']}}" selected>{{$convocatoria['titulo_convocatoria']}}</option>
                                @else

                                    <option value="{{$convocatoria['numero_convocatoria']}}"> {{$convocatoria['titulo_convocatoria']}}</option>
                                @endif
                                @endforeach
                              @endif 
                        </select>
                    </li> 
                    <li><label for="linea-proyecto">Linea del proyecto:</label> 
                        <select name="linea-proyecto" required="required">

                            @if(isset($lineas))
                                @foreach($lineas as $linea)
                                @if(isset($proyectos['inv_id_linea']) && $linea['id_lineas'] == $proyectos['inv_id_linea'])
                                    <option value="{{$linea['id_lineas']}}" selected>{{$linea['nombre_linea']}}</option>
                                @else 
                                    <option value="{{$linea['id_lineas']}}">{{$linea['nombre_linea']}}</option>
                                @endif  
                                @endforeach
                            @endif                 
                        </select>
                    </li> 
                    <li><label for="grupo1-proyecto">Grupo 1 del proyecto:</label> 
                        <select name="grupo1-proyecto" required="required">

                            @if(isset($grupos))
                                @foreach($grupos as $grupo)
                                @if(isset($proyectos['inv_codigo_grupo']) && $grupo['codigo_grupo'] == $proyectos['inv_codigo_grupo'])
                                    <option value="{{$grupo['codigo_grupo']}}" selected>{{$grupo['nombre_grupo']}}</option>
                                @else
                                    <option value="{{$grupo['codigo_grupo']}}">{{$grupo['nombre_grupo']}}</option>
                                @endif
                                @endforeach
                            @endif 
                        </select>
                    </li> 
                    <li><label for="grupo2-proyecto">Grupo 2 del proyecto:</label> 
                        <select name="grupo2-proyecto">

                            @if(isset($grupos1))
                                @foreach($grupos1 as $grupo1)
                                @if(isset($proyectos['inv_codigo_grupo']) && $grupo1['codigo_grupo'] == $proyectos['inv_codigo_grupo'])
                                    <option value="{{$grupo1['codigo_grupo']}}" selected> {{$grupo1['nombre_grupo']}}</option>
                                @else
                                    <option value="{{$grupo1['codigo_grupo']}}"> {{$grupo1['nombre_grupo']}}</option>
                                @endif
                                @endforeach
                            @endif        
                        </select>

                        @if ($errors->has('grupo2-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('grupo2-proyecto') }}</p> @endif
                    </li> 
                    <li><label for="obj-proyecto">Objetivo general:</label>
                        <textarea id="obj-proyecto" name="obj-proyecto" required="required">{{Input::old('obj-proyecto')!=null? Input::old('obj-proyecto'): (isset($proyectos['objetivo_general'])? $proyectos['objetivo_general']:'')}}</textarea>
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

                            <li>
                                <label  style="width:inherit">Tipo Investigador:</label>
                                <select name="tipo-investigador" id="tipo-investigador" required="required" style="width: 300px;
                                        margin-left: 10px;">
                                    <option value="investigador principal">Investigador Principal (IP)</option>
                                    <option value="coinvestigador">Coinvestigador (CI)</option>    
                                </select>
                            </li> 

                             <button type="button" class="btn btn-primary" id="boton-integrantes-proyectos" style="background:#1A6D71; display:none"><span class="glyphicon glyphicon-plus"></span> Agregar </button> 
                          </div>
                          
                          <div class="modal-body">
                            <table  data-url="/examples/bootstrap_table/data" data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                            id="tabla-integrantes-proyectos">
                              <thead>
                                <tr><th colspan="5">INTEGRANTES DEL PROYECTO</th></tr>
                                <tr>
                                  <th>Documento</th>
                                  <th colspan="1">Nombres y Apellidos</th>
                                  <th>Tiempo dedicado</th>
                                  <th>Tipo Investigador</th>
                                  <th></th>
                                </tr>
                              </thead>

                              <tbody>

                                @if(isset($integrantesproyecto))
                                  @foreach($integrantesproyecto as $personaproyectos)
                                      <tr id="integrantemodal_{{$personaproyectos->cedula}}">
                                        <td><input type="hidden" data-info="1" name="integrantes[]" value="1">{{$personaproyectos->cedula}}</td> 
                                        <td>{{$personaproyectos->datos_personales}}</td> 
                                        <td>{{$personaproyectos->tipo_investigador}}</td> 
                                        <td>{{$personaproyectos->dedicacion_tiempo}}</td>
                                        <td><a href="#" onclick="eliminarModalIntegranteProyecto('{{$proyectos['codigo_proyecto']}}','{{$personaproyectos->cedula}}')" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>   
                                      </tr>

                                  @endforeach
                                @endif

                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="guardar-cambios" style="background:#1A6D71">Guardar Cambios</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Modal de Verificacion de Eliminar integrantes proyectos-->
                    <div>    
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
                              <button type="button" class="btn btn-primary" onclick="eliminarintegrantemodal();"
                              style=" border-radius: 5px; background: #1A6D71; border-color:white; color:white;">Aceptar</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div><!-- /.modal-content -->
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
                        <input type="file" id="actaini-proyectos" name="actaini-proyectos" value="{{Input::old('actaini-proyectos')!=null? Input::old('actaini-proyectos'): (isset($proyectos['archivo_actainicio'])? $proyectos['archivo_actainicio']:'')}}"/>
                        @if ($errors->has('actaini-proyectos')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('actaini-proyectos') }}</p> @endif
                    </li>     
                    <li><label for="propuesta-proyecto">Archivo de la propuesta: </label>
                        <input type="file" id="propuesta-proyecto" name="propuesta-proyecto" value="{{Input::old('propuesta-proyecto')!=null? Input::old('propuesta-proyecto'): (isset($proyectos['archivo_propuesta'])? $proyectos['archivo_propuesta']:'')}}" />
                        @if ($errors->has('propuesta-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('propuesta-proyecto') }}</p> @endif
                    </li>  
                    <li><label for="informe-proyecto">Archivo del informe final: </label>
                        <input type="file" id="informe-proyecto" name="informe-proyecto" value="{{Input::old('informe-proyecto')!=null? Input::old('informe-proyecto'): (isset($proyectos['informe_final'])? $proyectos['informe_final']:'')}}" />
                        @if ($errors->has('informe-proyecto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('informe-proyecto') }}</p> @endif
                    </li>      
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-proyecto" type="submit" class="submit-button"  style="height:37px">

                        <li class="glyphicon glyphicon-pencil" style="color:rgb(66, 66, 66); font-size: 17px;"></li> 
                        @if(isset($proyectos['codigo_proyecto']))
                              Editar Proyecto
                            @else 
                                Crear Proyecto
                        @endif
                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="button" onclick="limpiaForm('#form-proyectos')" >
                        <img alt="mal" src="{{URL::to('/images/ml.png')}}" width="16" height="16" />
                        Limpiar Formulario
                    </th>
                </thead>
            </table>  
    </form>    
</div>  
@stop    