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
    
    <form id="form-investigadores" autocomplete="on" enctype="multipart/form-data"
     @if(isset($investigador))
        action="{{URL::to('edicion/formularioinvestigadores')}}"
     @else
        action="{{URL::to('creacion/formularioinvestigadores')}}"
        <?php 
            $investigador = null;
         
        ?>
     @endif 
    method="post">    

        <!-- en caso de no existir el id-->
        @if(isset($accion) && $accion=="editar")
              
            @if(!isset($investigador) || !$investigador)
                <fieldset style="margin-bottom: 2px;
                        margin-top: 5px;
                        padding: 2px;">

                        <div  style="margin: 0px;" class="alert alert-danger">NO existe el Investigador!!</div> 
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

        @if(isset($investigador['codinv_ext']))

            <input type="hidden" name="id_investigador" value="{{$investigador['codinv_ext']}}">
        @endif

        <div id="titulo"><h2>
           
            @if(isset($investigador['codinv_ext']))
                <li class="glyphicon glyphicon-pencil" style="font-size: 20px;"></li>
                Edicion Investigador
            @else 
                <img alt="new" src="images/nuevo.png" width="16" height="16" />
                Crear Investigador
            @endif

        </h2></div>
        <ul>
        



            @if(isset($personaiv))

                <fieldset>  
                    <li><label for="cedula">C&eacute;dula: {{$investigador['cedula_persona']}}</label>
                    </li>
                </fieldset>
            @else


            @if(isset($accion) && $accion=="editar")

                <!-- editar  formulario -->
                <fieldset> 
                 <li><label for="cedula">C&eacute;dula:</label>
                            <p style="margin-left: 169px;" class="help-block">{{$investigador['cedula_persona']}}</p>
                </li>
                  <!--fin  editar -->
            </fieldset>    

            @else
                <!-- crear formulario -->
                     <fieldset>  
                        <li><label for="cedula">C&eacute;dula:</label>
                            <input type="text" id="cedula" name="cedula" value="{{Input::old('cedula')!=null? Input::old('cedula'):''}}" required="required"/>
                             @if ($errors->has('cedula')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('cedula') }}</p> @endif
                        </li>    
                        <li><label for="nombre1">Primer Nombre:</label>
                            <input type="text" id="nombre1" name="nombre1" value="{{Input::old('nombre1')!=null? Input::old('nombre1'):''}}" required="required"/>
                            @if ($errors->has('nombre1')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre1') }}</p> @endif
                        </li>
                        <li><label for="nombre2">Segundo Nombre:</label>
                            <input type="nombre2" id="nombre2" name="nombre2" value="{{Input::old('nombre2')!=null? Input::old('nombre2'):''}}"/>
                            @if ($errors->has('nombre2')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre2') }}</p> @endif
                        </li>                   
                        <li><label for="apellido1">Primer Apellido:</label>
                            <input type="text" id="apellido1" name="apellido1" value="{{Input::old('apellido1')!=null? Input::old('apellido1'):''}}" required="required"/>
                            @if ($errors->has('apellido1')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('apellido1') }}</p> @endif 
                        </li>
                        <li><label for="apellido2">Segundo Apellido:</label>
                            <input type="text" id="apellido2" name="apellido2" value="{{Input::old('apellido2')!=null? Input::old('apellido2'):''}}"/>
                            @if ($errors->has('apellido2')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('apellido2') }}</p> @endif
                        </li>
                        <li><label for="direccion">Direcci&oacute;n:</label>
                            <input type="text" id="direccion" name="direccion" value="{{Input::old('direccion')!=null? Input::old('direccion'):''}}"/>
                            @if ($errors->has('direccion')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('direccion') }}</p> @endif
                        </li>
                        <li><label for="telefono">Tel&eacute;fono Contacto:</label>
                            <input type="tel" id="telefono" name="telefono" value="{{Input::old('telefono')!=null? Input::old('telefono'):''}}"/>
                            @if ($errors->has('telefono')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('telefono') }}</p> @endif
                        </li>
                        <li><label for="celular">Celular:</label>
                            <input type="text" id="celular" name="celular" value="{{Input::old('celular')!=null? Input::old('celular'):''}}"/>
                            @if ($errors->has('celular')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('celular') }}</p> @endif
                        </li>
                        <li><label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="{{Input::old('email')!=null? Input::old('email'):''}}"/>
                            @if ($errors->has('email')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('email') }}</p> @endif
                        </li>
                        <li class="@if($errors->has('foto')) has-error @endif">
                            <label for="foto">Foto:</label>
                            
                                <input type="file" id="foto" name="foto" value="{{Input::old('foto')!=null? Input::old('foto'): ''}}" />
                                @if ($errors->has('foto')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('foto') }}</p> @endif        
                        </li>

                        <li><label for="perfil">Perfil:</label>

                            <select name="perfil" required="required">

                            @if(isset($perfiles))
                                @foreach($perfiles as $perfilinv)
                                @if(isset($investigador['codperfil']) && $perfilinv['codperfil'] == $investigador['codperfil'])
                                 <option value="{{$perfilinv['codperfil']}}" selected>{{$perfilinv['nombreperfil']}}</option>
                                @else
                                    <option value="{{$perfilinv['codperfil']}}">{{$perfilinv['nombreperfil']}}</option>

                                @endif
                                @endforeach
                            @endif
                            </select>                          
                        </li> 
                        <li><label for="">Fecha Perfil:</label>
                            <div class="container">
                                <div class="row">
                                    <div class='col-sm-5' style="padding:0px;">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker2'>
                                                <input type="" style="cursor:pointer"  readonly id="creacion-perfil" class="date form-control" data-format="yyyy-mm-dd" name="creacion-perfil" value="{{Input::old('creacion-perfil')!=null? Input::old('creacion-perfil'):''}}" required="required" /> 
                                                @if ($errors->has('creacion-perfil')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('creacion-perfil') }}</p> @endif
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </li>
                    </fieldset>
                <!--fin  crear formulario -->

            
                @endif            

            @endif





                <fieldset>
                    <li><label for="profesion">Profesi&oacute;n:</label>
                        <input type="text" id="profesion" name="profesion" value="{{ Input::old('profesion')!=null? Input::old('profesion'): (isset($investigador['profesion'])? $investigador['profesion']:'')}}" required="required"/>
                        @if ($errors->has('profesion')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('profesion') }}</p> @endif
                    </li>

                    <li>
                        <label for="link-cvlac">Link cvlac</label>
                        <input type="text" id="link-cvlac" name="link-cvlac" value="{{ Input::old('link-cvlac')!=null? Input::old('link-cvlac'): (isset($investigador['link_cvlac'])? $investigador['link_cvlac']:'')}}" required="required" />
                        @if ($errors->has('link-cvlac')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('link-cvlac') }}</p> @endif
                    </li>
                    <li><label for="codigo_cov">C&oacute;d. Convocatoria:</label>
                        <input type="text" id="codigo_conv" name="codigo_conv" value="{{ Input::old('codigo_conv')!=null? Input::old('codigo_conv'): (isset($investigador['codconvocatoria'])? $investigador['codconvocatoria']:'')}}" />
                        @if ($errors->has('codigo_conv')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('codigo_conv') }}</p> @endif
                    </li>
                    <li><label for="nombre_conv">Convocatoria</label>
                        <input type="text" id="nombre_conv" name="nombre_conv" value="{{ Input::old('nombre_conv')!=null? Input::old('nombre_conv'): (isset($investigador['nombreconvocatoria'])? $investigador['nombreconvocatoria']:'')}}" />
                        @if ($errors->has('nombre_conv')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre_conv') }}</p> @endif
                    </li>
                    <li><label for="entidad">Entidad:</label>

                        <select name="entidad-investigadores" required="required">

                        @if(isset($entidades))
                            @foreach($entidades as $entidadinv)
                            @if(isset($investigador['nit']) && $entidadinv['nit'] == $investigador['nit'])
                                <option value="{{$entidadinv['nit']}}" selected>{{$entidadinv['razon_social']}}</option>
                            @else
                                <option value="{{$entidadinv['nit']}}">{{$entidadinv['razon_social']}}</option>
                            @endif
                            @endforeach
                        @endif
                        </select>

                    </li>
                    <li><label for="numero_contrato">Nº Contrato</label>
                        <input type="text" id="numero_contrato" name="numero_contrato" value="{{ Input::old('numero_contrato')!=null? Input::old('numero_contrato'): (isset($investigador['numerocontrato'])? $investigador['numerocontrato']:'')}}"/>
                        @if ($errors->has('numero_contrato')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('numero_contrato') }}</p> @endif
                    </li>

                    <li><label for="">Fecha Inicio:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" 
                                            style="cursor:pointer"   
                                            readonly id="creacion_inicio" class="date form-control" data-format="yyyy-mm-dd" name="creacion_inicio" value="{{ Input::old('creacion_inicio')!=null? Input::old('creacion_inicio'): (isset($investigador['fecha_inicio'])? $investigador['fecha_inicio']:'')}}" required="required" /> 
                                            @if ($errors->has('creacion_inicio')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('creacion_inicio') }}</p> @endif
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </li> 
                    <li><label for="">Fecha Fin:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" 
                                            style="cursor:pointer"   
                                            readonly id="creacion_fin" class="date form-control" data-format="yyyy-mm-dd" name="creacion_fin" value="{{ Input::old('creacion_fin')!=null? Input::old('creacion_fin'): (isset($investigador['fecha_fin'])? $investigador['fecha_fin']:'')}}" required="required" /> 
                                            @if ($errors->has('creacion_fin')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('creacion_fin') }}</p> @endif
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </li>
                </fieldset>
            </ul>

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        
                            @if(isset($investigador['codinv_ext']))
                                <button id="crear-investigador" type="submit" style=" height:36px; padding-top:1px;">
                                <li class="glyphicon glyphicon-pencil" style="color:rgb(66, 66, 66); font-size: 17px;"></li>
                                 Editar Investigadores
                                @else
                                <button id="crear-investigador" type="submit"> 
                                <img alt="bien"  src="images/bn.png" width="16" height="16">
                                 Crear Investigadores
                            @endif
                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="button" onclick="limpiaForm('#form-investigadores')" >
                        <img alt="mal" src="{{URL::to('/images/ml.png')}}" width="16" height="16">
                        Limpiar Formulario
                    </th>
                </thead>
            </table>       
    </form>    
</div>  
@stop    