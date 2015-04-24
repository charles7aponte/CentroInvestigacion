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

    <script src="{{URL::to('js/')}}/recursos/formularioproductos.js" type="text/javascript"></script>

    <script type="text/javascript">
        function eliminacionArchivo1(idBLoque1, idBloque2, idHidden){

            $("#"+idBLoque1).hide();
            $("#"+idBloque2).show();
            $("#"+idHidden).val('si');

        }
    </script>
@stop

@section('cuerpo')

<div> 

    <form id="form-productos" autocomplete="on" enctype="multipart/form-data"
     @if(isset($productos))
        action="{{URL::to('edicion/formularioproductos')}}"
     @else
        action="{{URL::to('creacion/formularioproductos')}}"
        <?php 
        $productos = null;
        ?>
     @endif 

    method="post">  

    <!-- en caso de no existir el id-->
        @if(isset($accion) && $accion=="editar")
              
            @if(!isset($productos) || !$productos)
                <fieldset style="margin-bottom: 2px;
                        margin-top: 5px;
                        padding: 2px;">

                        <div  style="margin: 0px;" class="alert alert-danger">No existe el Producto.</div> 
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


        @if(isset($productos['codigo_producto']))

            <input type="hidden" name="id_producto" value="{{$productos['codigo_producto']}}">
        @endif

        <div id="titulo"><h2>
         
            @if(isset($productos['codigo_producto']))
              <li class="glyphicon glyphicon-pencil" style="font-size: 20px;"></li>
              Edicion Producto
            @else 
              <img alt="new" src="images/nuevo.png" width="16" height="16"/>
                 Crear Producto
            @endif

        </h2></div>

        <ul>
            <fieldset> 

                <li class="@if($errors->has('titulo-producto')) has-error @endif"><label for="titulo-producto">Nombre del producto:</label>
                    <input type="text" id="titulo-producto" name="titulo-producto" value="{{Input::old('titulo-producto')!=null? Input::old('titulo-producto'): (isset($productos['nombre_producto'])? $productos['nombre_producto']:'')}}" required="required"> 
                    @if ($errors->has('titulo-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('titulo-producto')}}</p> @endif
                </li>    
                <li><label for="fecha-proy">Fecha:</label>
                    <div class="container">
                        <div class="row">
                            <div class='col-sm-5' style="padding:0px;">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type="" style="cursor:pointer"   
                                        readonly id="fecha-proy" class="date form-control" data-format="yyyy-mm-dd" name="creacion-producto" value="{{Input::old('creacion-producto')!=null? Input::old('creacion-producto'): (isset($productos['fecha_producto'])? $productos['fecha_producto']:'')}}" required="required" />
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

                        @if(isset($productos['inv_subtipo_producto']) && $subtipo['id_subtipo_producto'] == $productos['inv_subtipo_producto'])
                           <option value="{{$subtipo['id_subtipo_producto']}}" selected> {{$subtipo['nombre_subtipo_producto']}}</option>
                        @else
                            <option value="{{$subtipo['id_subtipo_producto']}}"> {{$subtipo['nombre_subtipo_producto']}}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>

                    @if ($errors->has('subtipo-proy')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('subtipo-proy') }}</p> @endif
                </li>
                <li><label for="grupo-proy">Grupo:</label> 
                    <select name="grupo-proy" required="required">
                      @if(isset($grupoproductos))
                        @foreach($grupoproductos as $grupoproducto)

                        @if(isset($productos['inv_codigo_grupo']) && $grupoproducto['codigo_grupo'] == $productos['inv_codigo_grupo'])
                           <option value="{{$grupoproducto['codigo_grupo']}}" selected> {{$grupoproducto['nombre_grupo']}}</option>
                        @else
                            <option value="{{$grupoproducto['codigo_grupo']}}">{{$grupoproducto['nombre_grupo']}}</option>
                        @endif
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

                        @if(isset($productos['inv_id_linea']) && $lineasproducto['id_lineas'] == $productos['inv_id_linea'])
                           <option value="{{$lineasproducto['id_lineas']}}" selected> {{$lineasproducto['nombre_linea']}}</option>
                        @else
                           <option value="{{$lineasproducto['id_lineas']}}"> {{$lineasproducto['nombre_linea']}}</option>
                        @endif
                        @endforeach
                      @endif
                    </select>

                  @if ($errors->has('linea-proy')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('linea-proy') }}</p> @endif 

                </li>
                <div class="row">
                        <li>
                            <div class="col-md-2"><label>Autores: </label></div>
                             <div class="col-md-2"> 
                                <input style="margin-left: 30px;" type="button"  data-toggle="modal" data-target="#myModal-integrantes-producto" id="botones-especiales" value="Agregar/Ver Autores">
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
                                <label  style="width:inherit">Autores: </label>
                                    <input type="text" id="integrantes-producto" name="integrantes-producto" value=""></br>
                            </li>    
                            <li>
                                <label  style="width:inherit">Grupo participante: </label>

                                <select name="grupo-integrante" id="grupo-integrante">

                                    @if(isset($grupoproductos))
                                        @foreach($grupoproductos as $grupoproducto)

                                        @if(isset($productos['inv_codigo_grupo']) && $grupoproducto['codigo_grupo'] == $productos['inv_codigo_grupo'])
                                             <option value="{{$grupoproducto['codigo_grupo']}}" selected> {{$grupoproducto['nombre_grupo']}}</option>
                                        @else
                                            <option value="{{$grupoproducto['codigo_grupo']}}"> {{$grupoproducto['nombre_grupo']}}</option>
                                        @endif
                                        @endforeach
                                    @endif

                                </select>
                            </li> 
                             <button type="button" class="btn btn-primary" id="boton-integrantes-productos" style="background:#1A6D71"><span class="glyphicon glyphicon-plus"></span> Agregar</button> 
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
                                @if(isset($integrantesproducto))
                                  @foreach($integrantesproducto as $personaproductos)
                                      <tr id="integrantemodal_{{$personaproductos->cedula}}">
                                        <td><input type="hidden" data-info="{{$personaproductos->cedula}}" name="integrantes[]" value="{{$personaproductos->cedula}}">{{$personaproductos->cedula}}</td> 
                                        <td>{{$personaproductos->datos_personales}}</td> 
                                        <td><input type="hidden"  name="idgrupo[]" value="{{$personaproductos->codigo_grupo}}"> {{$personaproductos->nombre_grupo}}</td> 
                                        <td><a href="#" onclick="eliminarModalIntegranteProducto('{{$productos['codigo_producto']}}','{{$personaproductos->cedula}}')" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>   
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
                    <!--******************************************-->

                    <!--Modal de Verificacion de Eliminar integrantes productos-->
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
                    
                <li><label for="entidad-prod">Entidad:</label>
                    
                    <select name="entidad-prod" required="required">
                      @if(isset($entidadproductos))
                        @foreach($entidadproductos as $entidadproducto)

                        @if(isset($productos['inv_nit']) && $entidadproducto['nit'] == $productos['inv_nit'])
                           <option value="{{$entidadproducto['nit']}}" selected> {{$entidadproducto['razon_social']}}</option>
                        @else
                           <option value="{{$entidadproducto['nit']}}"> {{$entidadproducto['razon_social']}}</option>
                        @endif
                        @endforeach
                      @endif
                    </select>

                     @if ($errors->has('entidad-prod')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('entidad-prod') }}</p> @endif
                </li>
                <li><label for="reconocimiento-prod">Reconocimiento:</label>
                    <input type="text" id="reconocimiento-prod" name="reconocimiento-prod" value="{{Input::old('reconocimiento-prod')!=null? Input::old('reconocimiento-prod'): (isset($productos['reconocimiento_producto'])? $productos['reconocimiento_producto']:'')}}">
                     @if ($errors->has('reconocimiento-prod')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('reconocimiento-prod') }}</p> @endif
                </li>
                <li><label for="desc-conv">Descripci&oacute;n:</label>
                    <textarea id="desc-conv" name="desc-conv" required="required">{{Input::old('desc-conv')!=null? Input::old('desc-conv'): (isset($productos['observaciones_producto'])? $productos['observaciones_producto']:'')}}</textarea>
                     @if ($errors->has('desc-conv')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('desc-conv') }}</p> @endif
                </li> 
            </fieldset>
        </ul>
        <ul>
            <fieldset>
                <li><label for="foto-producto">Foto del producto: </label>

                    <div id="block1_archivo1" style="@if(!(isset($productos) &&  $productos['foto_producto']!="")) display:none @endif">
                        <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo1', 'block2_archivo1', 'id_indicador_cambio_img_producto')">
                        <a  target="_blank" href="{{URL::to('archivos_db/productos')}}/{{$productos['foto_producto']}}">Descargar Archivo </a>
                        
                          @if(!(isset($productos) &&  $productos['foto_producto']!=''))   
                              <input  type="hidden" id="id_indicador_cambio_img_producto" name="edicion_producto-foto"  value="si">
                            @else         
                              <input  type="hidden" id="id_indicador_cambio_img_producto" name="edicion_producto-foto"  value="no">
                          @endif
                    </div>

                    <div id="block2_archivo1" style="@if((isset($productos) &&  $productos['foto_producto']!="")) display:none @endif">
                        <input type="file" id="foto-producto" name="foto-producto" value="{{Input::old('foto-producto')!=null? Input::old('foto-producto'): (isset($productos['foto_producto'])? $productos['foto_producto']:'')}}">
                        @if ($errors->has('foto-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('foto-producto') }}</p> @endif
                    </div>
                </li> 

                <li><label for="soporte-producto">Soporte del producto: </label>

                    <div id="block1_archivo2" style="@if(!(isset($productos) &&  $productos['soporte_producto']!="")) display:none @endif">
                        <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo2', 'block2_archivo2', 'id_indicador_cambio_soporte_producto')">
                        <a  target="_blank" href="{{URL::to('archivos_db/productos')}}/{{$productos['soporte_producto']}}">Descargar Archivo </a>
                        
                          @if(!(isset($productos) &&  $productos['soporte_producto']!=''))   
                              <input  type="hidden" id="id_indicador_cambio_soporte_producto" name="edicion_dto-soporte"  value="si">
                            @else         
                              <input  type="hidden" id="id_indicador_cambio_soporte_producto" name="edicion_dto-soporte"  value="no">
                          @endif             
                    </div>

                    <div id="block2_archivo2" style="@if((isset($productos) &&  $productos['soporte_producto']!="")) display:none @endif">
                        <input type="file" id="soporte-producto" name="soporte-producto" value="{{Input::old('soporte-producto')!=null? Input::old('soporte-producto'): (isset($productos['soporte_producto'])? $productos['soporte_producto']:'')}}">
                        @if ($errors->has('soporte-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('soporte-producto') }}</p> @endif
                    </div>        
                </li> 

                <li><label for="tipo-soporte-producto">Tipo de Soporte: </label>
                    <input type="text" id="tipo-soporte-producto" name="tipo-soporte-producto" value="{{Input::old('tipo-soporte-producto')!=null? Input::old('tipo-soporte-producto'): (isset($productos['tipo_soporte'])? $productos['tipo_soporte']:'')}}">
                    @if ($errors->has('tipo-soporte-producto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('tipo-soporte-producto') }}</p> @endif
                </li> 
                <li><label for="obs-soporte">Observaciones del soporte:</label>
                    <textarea id="obs-soporte" name="obs-soporte">{{Input::old('obs-soporte')!=null? Input::old('obs-soporte'): (isset($productos['observaciones_soporte'])? $productos['observaciones_soporte']:'')}}</textarea>
                    @if ($errors->has('obs-soporte')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('obs-soporte') }}</p> @endif
                </li>     
            </fieldset> 
        </ul>    
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        
                        @if(isset($productos['codigo_producto']))
                            <button id="crear-producto" type="submit" style=" height:36px; padding-top:1px;">
                            <li class="glyphicon glyphicon-pencil" style="color:rgb(66, 66, 66); font-size: 17px;"></li>
                              Editar Producto
                          @else 
                            <button id="crear-producto" type="submit">
                            <img alt="bien"  src="images/bn.png" width="16" height="16" />
                              Crear Producto
                        @endif
                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="button" onclick="limpiaForm('#form-productos')" >
                        <img alt="mal" src="{{URL::to('/images/ml.png')}}" width="16" height="16">
                        Limpiar Formulario
                    </th>
                </thead>
            </table>
    </form>    
</div>  
@stop    