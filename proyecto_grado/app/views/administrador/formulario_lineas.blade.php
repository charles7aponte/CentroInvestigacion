@extends('administrador.panel_admin')


@section('javascript-nuevos')
   
    <script type="text/javascript" src="{{URL::to('/js')}}/recursos/formulariointegrantes-lineasgrupos.js"></script>

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

    <form id="form-lineas" autocomplete="on" enctype="multipart/form-data"
     @if(isset($linea))
        action="{{URL::to('edicion/formulariolineas')}}"
     @else
        action="{{URL::to('creacion/formulariolineas')}}"
        <?php 
        $linea = null;
        ?>
     @endif 

     method="post">


    <!-- en caso de no existir el id-->
        @if(isset($accion) && $accion=="editar")
              
            @if(!isset($linea) || !$linea)

                 <fieldset style="margin-bottom: 2px;
                        margin-top: 5px;
                        padding: 2px;">

                        <div  style="margin: 0px;" class="alert alert-danger">NO existe la Linea!!</div> 
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


        @if(isset($linea['id_lineas']))

            <input type="hidden" name="id_linea" value="{{$linea['id_lineas']}}">
        @endif

        <div id="titulo"><h2>
           
            @if(isset($linea['id_lineas']))
                <li class="glyphicon glyphicon-pencil" style="font-size: 20px;"></li>
              Editar Linea 
            @else 
                <img alt="new" src="images/nuevo.png" width="16" height="16" />
                 Crear nueva Linea
            @endif
        </h2></div>
      
            <ul>
                <fieldset> 

                    <li class="@if($errors->has('nombre-linea')) has-error @endif">
                        <label for="nombre-linea">Nombre de la l&iacute;nea:</label>
                        <input onchange="letrasCapital(this)" type="text" id="nombre-linea" name="nombre-linea" value="{{ Input::old('nombre-linea')!=null? Input::old('nombre-linea'): (isset($linea['nombre_linea'])? $linea['nombre_linea']:'')}}" required="required"/>
                         @if ($errors->has('nombre-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre-linea') }}</p> @endif
                    </li>

                    <li class="@if($errors->has('coor-linea')) has-error @endif" >
                        <label for="coor-linea">Coordinador de la l&iacute;nea:</label>
                        <input type="text" id="coor-linea" name="coor-linea" value="{{isset($linea['nombre_coordinador'])? $linea['nombre_coordinador']:''}}" /> 
                        <input type="hidden" id="cedula-persona" name="cedula-persona" value="{{isset($linea['coordinador_linea'])? $linea['coordinador_linea']:''}}"/>
                            <span id="advertencias">
                                <p>*Ingrese el n&uacute;mero de documento o nombres y espere a que el autocompletado lo muestre.</p>
                            </span> 
                         @if ($errors->has('coor-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('coor-linea') }}</p> @endif
                    </li>

                    <li class="@if($errors->has('unidad')) has-error @endif">
                      <label for="unidad">Unidad academica:</label>
                        <select required="required" name="unidad" value="{{Input::old('unidad')!=null? Input::old('unidad'): (isset($grupos['unidad_academica'])? $grupos['unidad_academica']:'')}}">
                            
                            @if(isset($tipo_unidades_academicas))
                                @foreach($tipo_unidades_academicas as $tipo_unidad_academica)
                                  @if(isset($linea['inv_unidad_academica']) && $tipo_unidad_academica['id_unidad'] == $linea['inv_unidad_academica'])
                                    <option value="{{$tipo_unidad_academica['id_unidad']}}" selected> {{$tipo_unidad_academica['nombre_unidad']}}</option>
                                  @else 
                                    <option value="{{$tipo_unidad_academica['id_unidad']}}"> {{$tipo_unidad_academica['nombre_unidad']}}</option>
                                  @endif
                                @endforeach
                            @endif    
                        </select>
                         @if ($errors->has('unidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('unidad') }}</p>@endif                        
                    </li>

                    <li class="@if($errors->has('objetivo-linea')) has-error @endif">
                        <label for="objetivo-linea">Objetivo de la l&iacute;nea:</label>
                        <textarea id="objetivo-linea" name="objetivo-linea">{{Input::old('objetivo-linea')!=null? Input::old('objetivo-linea'):(isset($linea['objetivo_linea'])?$linea['objetivo_linea']:'')}}</textarea>
                         @if ($errors->has('objetivo-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('objetivo-linea') }}</p> @endif
                    </li>  

                    <li class="@if($errors->has('objetivo-estulinea')) has-error @endif">
                        <label for="objetivo-estulinea">Objeto de estudio:</label>
                        <textarea id="objetivo-estulinea" name="objetivo-estulinea" required="required">{{Input::old('objetivo-estulinea')!=null?Input::old('objetivo-estulinea'):(isset($linea['objetivo_estudio'])?$linea['objetivo_estudio']:'')}}</textarea>
                         @if ($errors->has('objetivo-estulinea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('objetivo-estulinea') }}</p> @endif
                    </li>   

                </fieldset>
            </ul>
            <ul>
                <fieldset>
                    <li class="@if($errors->has('defi-linea')) has-error @endif">
                        <label for="defi-linea">Definici&oacute;n de la l&iacute;nea:</label>
                        <textarea id="defi-linea" name="defi-linea">{{Input::old('defi-linea')!=null?Input::old('defi-linea'):(isset($linea['definicion_linea'])?$linea['definicion_linea']:'')}}</textarea>
                         @if ($errors->has('defi-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('defi-linea') }}</p> @endif
                    </li>

                    <li class="@if($errors->has('foto-linea')) has-error @endif">
                        <label for="foto-linea">Foto Linea: </label>
                       
                       <div id="block1_archivo1" style="@if(!(isset($linea) &&  $linea['foto_linea']!="")) display:none @endif">
                            <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo1', 'block2_archivo1', 'id_indicador_cambio_foto_linea')">
                            <a  target="_blank" href="{{URL::to('archivos_db/lineas')}}/{{$linea['foto_linea']}}">Descargar Archivo </a>
                            
                             @if(!(isset($linea) &&  $linea['foto_linea']!=''))
                                    <input  type="hidden" id="id_indicador_cambio_foto_linea" name="edicion_foto-linea"  value="si">
                                @else 
                                    <input  type="hidden" id="id_indicador_cambio_foto_linea" name="edicion_foto-linea"  value="no"> 
                                @endif
                        </div>

                        <div id="block2_archivo1" style="@if((isset($linea) &&  $linea['foto_linea']!="")) display:none @endif"> 
                            <input type="file" id="foto-linea" name="foto-linea" value="{{ Input::old('foto-linea')!=null? Input::old('foto-linea'): (isset($linea['foto_linea'])? $linea['foto_linea']:'')}}"/>
                            @if ($errors->has('foto-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('foto-linea') }}</p> @endif
                        </div>
                    </li> 


                    <li class="@if($errors->has('archivo-linea')) has-error @endif">
                        <label for="archivo-linea">Archivo Linea: </label>
                       
                       <div id="block1_archivo2" style="@if(!(isset($linea) &&  $linea['ruta_archivo']!="")) display:none @endif">
                            <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo2', 'block2_archivo2', 'id_indicador_cambio_arch_linea')">
                            <a  target="_blank" href="{{URL::to('archivos_db/lineas')}}/{{$linea['ruta_archivo']}}">Descargar Archivo </a>
                                @if(!(isset($linea) &&  $linea['ruta_archivo']!=''))
                                    <input  type="hidden" id="id_indicador_cambio_arch_linea" name="edicion_dct-linea"  value="si">
                                @else 
                                    <input  type="hidden" id="id_indicador_cambio_arch_linea" name="edicion_dct-linea"  value="no"> 
                                @endif
                        </div>

                        <div id="block2_archivo2" style="@if((isset($linea) &&  $linea['ruta_archivo']!="")) display:none @endif"> 
                            <input type="file" id="archivo-linea" name="archivo-linea" value="{{ Input::old('archivo-linea')!=null? Input::old('archivo-linea'): (isset($linea['ruta_archivo'])? $linea['ruta_archivo']:'')}}"/>
                            @if ($errors->has('archivo-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('archivo-linea') }}</p> @endif
                        </div>
                    </li> 
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        
                            @if(isset($linea['id_lineas']))
                                <button id="crear-linea" type="submit" class="submit-button" style=" height:36px; padding-top:1px;">
                                <li class="glyphicon glyphicon-pencil" style="color:rgb(66, 66, 66); font-size: 17px;"></li>
                              Editar Linea 
                            @else 
                                <button id="crear-linea" type="submit" class="submit-button">
                                <img alt="bien"  src="images/bn.png" width="16" height="16" />
                                Crear Linea
                            @endif

                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="button" onclick="limpiaForm('#form-lineas')" >
                        <img alt="mal" src="{{URL::to('/images/ml.png')}}" width="16" height="16" />
                        Limpiar Formulario
                    </th>
                </thead>
            </table>  
    </form>    
</div>  
@stop    