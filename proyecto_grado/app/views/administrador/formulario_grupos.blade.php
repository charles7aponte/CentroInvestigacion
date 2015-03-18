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

  <script type="text/javascript">
        function eliminacionArchivo1(idBLoque1, idBloque2, idHidden){

            $("#"+idBLoque1).hide();
            $("#"+idBloque2).show();
            $("#"+idHidden).val('si');

        }
  </script>
@stop


@section('cuerpo')
 
<!-- datos quemados del mismo formulario en su propia tabla-->
<?php
  $tipo_categoria=array('A1','A2','A','B','C','D','reconocido','institucional-unillanos','no reconocido');
?>

<div> 

  <form id="form-grupos" autocomplete="on" enctype="multipart/form-data"
     @if(isset($grupos))
        action="{{URL::to('edicion/formulariogrupos')}}"
     @else
        action="{{URL::to('creacion/formulariogrupos')}}"
        <?php 
        $grupos = null;
        ?>
     @endif 

  method="post">   

    <!-- en caso de no existir el id-->
        @if(isset($accion) && $accion=="editar")
              
            @if(!isset($grupos) || !$grupos)
                <fieldset style="margin-bottom: 2px;
                        margin-top: 5px;
                        padding: 2px;">

                        <div  style="margin: 0px;" class="alert alert-danger">No existe el Grupo</div> 
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


        @if(isset($grupos['codigo_grupo']))

            <input type="hidden" name="id_grupos" value="{{$grupos['codigo_grupo']}}">
        @endif

        <div id="titulo"><h2>
           
            @if(isset($grupos['codigo_grupo']))
              <li class="glyphicon glyphicon-pencil" style="font-size: 20px;"></li>
              Edicion Grupos
            @else 
                <img alt="new" src="images/nuevo.png" width="16" height="16" />
                 Crear Grupo
            @endif

        </h2></div>
        <ul>
                <fieldset>  
                    <li class="@if($errors->has('nombre')) has-error @endif">
                      <label for="nombre" >Nombre del grupo: </label>
                        <input type="text" id="nombre" name="nombre"  value="{{ Input::old('nombre')!=null? Input::old('nombre'): (isset($grupos['nombre_grupo'])? $grupos['nombre_grupo']:'')}}" required="required"/>                
                         @if ($errors->has('nombre')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre') }}</p> 
                         @endif
                    </li> 

                    <li class="@if($errors->has('coord')) has-error @endif" >
                        <label for="coord">Coordinador:</label>
                        <input type="text" id="coor-linea" name="coord" value="{{isset($grupos['nombre_director'])? $grupos['nombre_director']:''}}" /> 
                        <input type="hidden" id="cedula-persona" name="cedula-persona" value="{{isset($grupos['director_grupo'])? $grupos['director_grupo']:''}}"/>
                            <span id="advertencias">
                                <p>*Ingrese el n&uacute;mero de documento o nombres y espere a que el autocompletado lo muestre.</p>
                            </span> 
                         @if ($errors->has('coord')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('coord') }}</p> @endif
                    </li>

                    <li class="@if($errors->has('email')) has-error @endif">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" required="required" value="{{Input::old('email')!=null? Input::old('email'):(isset($grupos['email'])? $grupos['email']:'')}}" /> 
                         @if ($errors->has('email')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('email') }}</p> @endif 
                    </li>

                    <li class="@if($errors->has('pagina')) has-error @endif">
                      <label for="pagina">P&aacute;gina web:</label>

                        <input type="text" id="pagina" name="pagina" required="required" value="{{Input::old('pagina')!=null? Input::old('pagina'):(isset($grupos['pagina_web'])? $grupos['pagina_web']:'')}}" /> 
                         @if ($errors->has('email')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('email') }}</p> @endif 
                                      
                    </li>

                    <li class="@if($errors->has('telefono')) has-error @endif">
                      <label for="telefono">Tel&eacute;fono:</label>
                      <input type="tel" id="telefono" name="telefono" value="{{ Input::old('telefono')!=null? Input::old('telefono'): (isset($grupos['telefono'])? $grupos['telefono']:'')}}"/>
                         @if ($errors->has('telefono')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('telefono') }}</p> 
                         @endif                   
                    </li>

                    <li class="@if($errors->has('direccion')) has-error @endif">
                      <label for="direccion">Direcci&oacute;n:</label>
                      <input type="text" id="direccion" name="direccion" value="{{ Input::old('direccion')!=null? Input::old('direccion'): (isset($grupos['direccion_grupo'])? $grupos['direccion_grupo']:'')}}"/>
                         @if ($errors->has('telefono')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('telefono') }}</p> 
                         @endif                 
                    </li>

                    <li><label for="creacion-grupo">Año de creaci&oacute;n:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" style="cursor:pointer" 
                                            readonly id="creacion-grupo" class="date form-control" data-format="yyyy-mm-dd" name="creacion-grupo" value="{{ Input::old('creacion-grupo')!=null? Input::old('creacion-grupo'): (isset($grupos['ano_creacion'])? $grupos['ano_creacion']:'')}}" required="required" />
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
                        <select required="required" name="unidad" value="{{Input::old('unidad')!=null? Input::old('unidad'): (isset($grupos['unidad_academica'])? $grupos['unidad_academica']:'')}}">

                            @if(isset($tipo_unidades_academicas))
                                @foreach($tipo_unidades_academicas as $tipo_unidad_academica)
                                  @if(isset($grupos['inv_unidad_academica']) && $tipo_unidad_academica['id_unidad'] == $grupos['inv_unidad_academica'])
                                    <option value="{{$tipo_unidad_academica['id_unidad']}}" selected> {{$tipo_unidad_academica['nombre_unidad']}}</option>
                                  @else 
                                    <option value="{{$tipo_unidad_academica['id_unidad']}}"> {{$tipo_unidad_academica['nombre_unidad']}}</option>
                                  @endif
                                @endforeach
                            @endif    
                        </select>
                         @if ($errors->has('unidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('unidad') }}</p>@endif                        
                    </li>

                    <li class="@if($errors->has('categoria')) has-error @endif">
                      <label for="categoria">Categor&iacute;a:</label>

                        <select  required="required" name="categoria" value="{{Input::old('categoria')!=null? Input::old('categoria'): (isset($grupos['categoria'])? $grupos['categoria']:'')}}">

                          @foreach ($tipo_categoria as $elemento)

                            @if(isset($grupos['categoria']) && $elemento==$grupos['categoria'])
                                <option value="{{$elemento}}" selected>{{$elemento}}</option>
                            @else 
                                <option value="{{$elemento}}">{{$elemento}}</option>
                            @endif         
                          @endforeach
                        </select>
                         @if ($errors->has('categoria')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('categoria') }}</p>@endif                        
                    </li>

                    <li><label for="tipo">Tipo:</label> 
                        <select name="tipo" required="required">

                              @if(isset($tipos))
                                @foreach($tipos as $tipo)
                                  @if(isset($grupos['inv_tipo_grupos']) && $tipo['id'] == $grupos['inv_tipo_grupos'])
                                    <option value="{{$tipo['id']}}" selected> {{$tipo['tipo_grupo']}}</option>
                                  @else 
                                    <option value="{{$tipo['id']}}"> {{$tipo['tipo_grupo']}}</option>
                                  @endif
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
                              <span id="advertencias">
                                <p>*Ingrese el número de documento o nombres y espere a que el autocompletado lo muestre.
                                </p>
                              </span>
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

                                @if(isset($integrantes))
                                  @foreach($integrantes as $personagrupos)
                                      <tr id="integrantemodal_{{$personagrupos->cedula}}">
                                        <td><input type="hidden" data-info="1" name="integrantes[]" value="1">{{$personagrupos->cedula}}</td> 
                                        <td>{{$personagrupos->datos_personales}}</td> 
                                        <td><a href="#" onclick="eliminarModalIntegranteGrupo('{{$grupos['codigo_grupo']}}','{{$personagrupos->cedula}}')" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>   
                                      </tr>

                                  @endforeach
                                @endif

                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="guardar-cambios" style="background:#1A6D71">Guardar</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  <!--Modal de Verificacion de Eliminar integrantes grupos-->
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

                    <!--modal 2 de lineas-->

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
                                style="background:#1A6D71; display:none; width:inherit"><span class="glyphicon glyphicon-plus"></span> Agregar
                              </button> 
                              <span id="advertencias">
                                <p>*Ingrese el nombre de la línea y espere a que el autocompletado lo muestre.
                                </p>
                              </span>
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
                                @if(isset($lineasintegrantes))
                                @foreach($lineasintegrantes as $personalineas)
                                    <tr id="lineamodal_{{$personalineas->id_lineas}}">
                                      <td><input type="hidden" data-info="1" name="integrantes[]" value="1">{{$personalineas->id_lineas}}</td> 
                                      <td>{{$personalineas->nombre_linea}}</td> 
                                      <td><a href="#" onclick="eliminarModalLineaGrupo('{{$grupos['codigo_grupo']}}','{{$personalineas->id_lineas}}')" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>   
                                    </tr>

                                @endforeach
                                @endif
                                                 
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="guardar-cambios1" style="background:#1A6D71">Guardar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Modal de Verificacion de Eliminar lineas grupos-->
                  <div>    
                   <div class="modal fade bs-example-modal-lg" id="eliminar-linea" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
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
                          <button type="button" class="btn btn-primary" onclick="eliminarLineaamodal();"
                          style=" border-radius: 5px; background: #1A6D71; border-color:white; color:white;">Aceptar</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div><!-- /.modal-content -->
                      </div>
                    </div>
                  </div>

                </fieldset>
            </ul> 

        <ul>
          <fieldset>
              <li class="@if($errors->has('objetivos')) has-error @endif">
                <label for="objetivos">Objetivos:</label>
                <textarea id="objetivos" name="objetivos" required="required">{{Input::old('objetivos')!=null? Input::old('objetivos'): (isset($grupos['objetivos'])? $grupos['objetivos']:'')}}</textarea>
                 @if ($errors->has('objetivos')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('objetivos') }}</p> 
                 @endif
              </li>  

              <li class="@if($errors->has('gruplac')) has-error @endif">
                <label for="gruplac">Link Gruplac: </label>
                  <input type="text" id="gruplac" name="gruplac" value="{{ Input::old('gruplac')!=null? Input::old('gruplac'): (isset($grupos['link_gruplac'])? $grupos['link_gruplac']:'')}}"/>
                 @if ($errors->has('gruplac')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('gruplac') }}</p> 
                 @endif                            
              </li>


              <li class="@if($errors->has('logog')) has-error @endif">
                        <label for="logog">Logo del grupo:</label>
                        
                         
                        <div id="block1_archivo1" style="@if(!(isset($grupos) &&  $grupos['logo_grupo']!="")) display:none @endif">
                            <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo1', 'block2_archivo1', 'id_indicador_cambio_archivo_logo')">
                            <a  target="_blank" href="{{URL::to('archivos_db/grupos')}}/{{$grupos['logo_grupo']}}">Descargar archivo </a>
                            <input  type="hidden" id="id_indicador_cambio_archivo_logo" name="edicion_dct-logo"  value="no">
                        </div>

                         <div id="block2_archivo1" style="@if((isset($grupos) &&  $grupos['logo_grupo']!="")) display:none @endif"> 
                            <input type="file" id="logog" name="logog" value="{{ Input::old('logog')!=null? Input::old('logog'): (isset($grupos['logo_grupo'])? $grupos['logo_grupo']:'')}}" />
                            @if ($errors->has('logog')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('logog') }}</p> @endif
                        </div>
              </li>

              <li class="@if($errors->has('afiche')) has-error @endif">
                        <label for="afiche">Ruta del afiche:</label>
                         
                        <div id="block1_archivo1" style="@if(!(isset($grupos) &&  $grupos['ruta_afiche']!="")) display:none @endif">
                            <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo1', 'block2_archivo1', 'id_indicador_cambio_archivo_afiche')">
                            <a  target="_blank" href="{{URL::to('archivos_db/grupos')}}/{{$grupos['ruta_afiche']}}">Descargar archivo </a>
                            <input  type="hidden" id="id_indicador_cambio_archivo_afiche" name="edicion_afiche-grupo"  value="no">
                        </div>

                        <div id="block2_archivo1" style="@if((isset($grupos) &&  $grupos['ruta_afiche']!="")) display:none @endif"> 
                            <input type="file" id="afiche" name="afiche" value="{{ Input::old('afiche')!=null? Input::old('afiche'): (isset($grupos['ruta_afiche'])? $grupos['ruta_afiche']:'')}}" />
                            @if ($errors->has('afiche')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('afiche') }}</p> @endif
                        </div>
              </li>

              <li class="@if($errors->has('img1')) has-error @endif">
                      <label for="afiche">Imagen1:</label>
                        <div id="block1_archivo2" style="@if(!(isset($grupos) &&  $grupos['imagen1']!="")) display:none @endif">
                            <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo2', 'block2_archivo2', 'id_indicador_cambio_archivo_img1')">
                            <a  target="_blank" href="{{URL::to('archivos_db/grupos')}}/{{$grupos['imagen1']}}">descargar archivo </a>
                            <input  type="hidden" id="id_indicador_cambio_archivo_img1" name="edicion_img1-grupo"  value="no">
                        </div>

                        <div id="block2_archivo2" style="@if((isset($grupos) &&  $grupos['imagen1']!="")) display:none @endif">
                            <input type="file" id="img1" name="img1" value="{{ Input::old('img1')!=null? Input::old('img1'): (isset($grupos['imagen1'])? $grupos['imagen1']:'')}}" />
                            @if ($errors->has('img1')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('img1') }}</p> @endif
                        </div>
              </li> 

              <li class="@if($errors->has('img2')) has-error @endif">
                         <label for="afiche">Imagen2:</label>

                        <div id="block1_archivo2" style="@if(!(isset($grupos) &&  $grupos['imagen2']!="")) display:none @endif">
                            <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo2', 'block2_archivo2', 'id_indicador_cambio_archivo_img2')">
                            <a  target="_blank" href="{{URL::to('archivos_db/grupos')}}/{{$grupos['imagen2']}}">Descargar archivo </a>
                            <input  type="hidden" id="id_indicador_cambio_archivo_img2" name="edicion_img2-grupo"  value="no">
                        </div>

                        <div id="block2_archivo2" style="@if((isset($grupos) &&  $grupos['imagen1']!="")) display:none @endif">
                            <input type="file" id="img2" name="img2" value="{{ Input::old('img2')!=null? Input::old('img2'): (isset($grupos['imagen2'])? $grupos['imagen2']:'')}}" />
                            @if ($errors->has('img2')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('img2') }}</p> @endif
                        </div>
              </li> 
          </fieldset> 
        </ul>   
        
        <table id="botones-formularios">
            <thead>
                <th id="crear">
                    <button id="crear-grupo" type="submit" >
                      @if(isset($grupos['codigo_grupo']))
                          <li class="glyphicon glyphicon-pencil" style="color:rgb(66, 66, 66); font-size: 17px;"></li>
                            Editar Grupo
                        @else 
                          <img alt="bien"  src="images/bn.png" width="16" height="16" />
                            Crear Grupo
                      @endif
                    </button>
                </th>
                <th id="borrar">
                    <button id="reset-button" type="button" onclick="limpiaForm('#form-grupos')" >
                    <img alt="mal" src="{{URL::to('/images/ml.png')}}" width="16" height="16" />
                    Limpiar Formulario
                </th>
            </thead>
        </table> 
    </form>    
</div>  
@stop    