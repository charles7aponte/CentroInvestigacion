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
    <script type="text/javascript" src="jqueryy.js"></script>
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

<?php
  $tipo_evento=array('Evento','Noticia','Documento');

?>

<div>

    <form id="form-eventos-noticias" autocomplete="on" enctype="multipart/form-data"
     @if(isset($evento))
        action="{{URL::to('edicion/formularioeventosnoticias')}}"
     @else
        action="{{URL::to('creacion/formularioeventosnoticias')}}"
        <?php 
        $evento = null;
        ?>
     @endif 

     method="post">  
    
        <!-- en caso de no existir el id-->
        @if(isset($accion) && $accion=="editar")
              
            @if(!isset($evento) || !$evento)
                <fieldset style="margin-bottom: 2px;
                        margin-top: 5px;
                        padding: 2px;">

                        <div  style="margin: 0px;" class="alert alert-danger">NO existe el Evento, Noticia o Documento!!</div> 
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

        @if(isset($evento['id_evento']))

            <input type="hidden" name="id_evento_noticia" value="{{$evento['id_evento']}}">
        @endif

        <div id="titulo"><h2>
           
            @if(isset($evento['id_evento']))
                <li class="glyphicon glyphicon-pencil" style="font-size: 20px;"></li>
                Edicion Evento, Noticia o Documento
            @else 
                <img alt="new" src="images/nuevo.png" width="16" height="16" />
                 Crear nuevo Evento, Noticia o Documento
            @endif

        </h2></div>
            <ul>
                <fieldset> 
                <li class="@if($errors->has('titulo-even-noti')) has-error @endif">
                <label for="titulo-even-noti">T&iacute;tulo:</label>
                    <input type="text" id="titulo-even-noti" name="titulo-even-noti" value="{{Input::old('titulo-even-noti')!=null? Input::old('titulo-even-noti'): (isset($evento['titulo_evento'])? $evento['titulo_evento']:'')}}" required="required"/> 
                     @if ($errors->has('titulo-even-noti')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('titulo-even-noti') }}</p> @endif
                </li>   

               <li class="@if($errors->has('tipo-even-noti')) has-error @endif">
                <label for="tipo-even-noti">Tipo:</label>

                    <select name="tipo-even-noti" value="{{Input::old('tipo-even-noti')!=null? Input::old('tipo-even-noti'): (isset($evento['tipo'])? $evento['tipo']:'')}}">
                        @foreach ($tipo_evento as $elemento)

                            @if(isset($evento['tipo']) && $elemento==$evento['tipo'])
                                <option value="{{$elemento}}" selected>{{$elemento}}</option>
                            @else 
                                <option value="{{$elemento}}">{{$elemento}}</option>
                            @endif
                            
                        @endforeach
                    </select>

                     @if ($errors->has('tipo-even-noti')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('tipo-even-noti') }}</p> @endif
                </li> 

                <li class="@if($errors->has('desc-even-noti')) has-error @endif">
                    <label for="desc-even-noti">Descripci&oacute;n:</label>
                    <textarea id="desc-even-noti" name="desc-even-noti"  required="required">{{Input::old('desc-even-noti')!=null? Input::old('desc-even-noti'): (isset($evento['descripcion'])? $evento['descripcion']:'')}}</textarea>
                    @if ($errors->has('desc-even-noti')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('desc-even-noti') }}</p> @endif
                </li>  

                <li class="@if($errors->has('fecha-even-noti')) has-error @endif">
                    <label for="fecha-even-noti">Fecha:</label>
                    <div class="container">
                        <div class="row">
                            <div class='col-sm-5' style="padding:0px;">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type="" style="cursor:pointer"   
                                        readonly id="fecha-even-noti" class="date form-control" data-format="dd/MM/yyyy" name="fecha-even-noti" value="{{Input::old('fecha-even-noti')!=null? Input::old('fecha-even-noti'): (isset($evento['fecha'])? $evento['fecha']:'')}}" required="required" /> 
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                               
                        </div>
                    </div> 
                    @if ($errors->has('fecha-even-noti')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('fecha-even-noti') }}</p> @endif   
                </li>

                </fieldset>
            </ul>
            <ul>
                <fieldset>

                    <li class="@if($errors->has('dcto-even-noti')) has-error @endif">
                        <label for="dcto-even-noti">Documento:</label>
                       
                       <div id="block1_archivo1" style="@if(!(isset($evento) &&  $evento['enlace_documento']!="")) display:none @endif">
                            <input type="button" value="EliminarFichero" onclick="eliminacionArchivo1('block1_archivo1', 'block2_archivo1', 'id_indicador_cambio_arch_evento')">
                            <a  target="_blank" href="{{URL::to('archivos_db/eventosnoticias')}}/{{$evento['enlace_documento']}}">Descargar archivo </a>
                            
                                @if(!(isset($evento) &&  $evento['enlace_documento']!=''))   
                                    <input  type="hidden" id="id_indicador_cambio_arch_evento" name="edicion_dct-evento"  value="si">
                                @else         
                                    <input  type="hidden" id="id_indicador_cambio_arch_evento" name="edicion_dct-evento"  value="no">
                                @endif        
                        </div>

                        <div id="block2_archivo1" style="@if((isset($evento) &&  $evento['enlace_documento']!="")) display:none @endif"> 
                            <input type="file" id="dcto-even-noti" name="dcto-even-noti" value="{{Input::old('dcto-even-noti')!=null? Input::old('dcto-even-noti'): (isset($evento['enlace_documento'])? $evento['enlace_documento']:'')}}" />
                            @if ($errors->has('dcto-even-noti')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('dcto-even-noti') }}</p> @endif
                        </div>
                    </li>  
                </fieldset> 
            </ul>   
            <table id="botones-formularios">
            <thead>
                <th id="crear">
                    <button id="crear-even-noti" type="submit">
                    
                    @if(isset($evento['id_evento']))
                        <li class="glyphicon glyphicon-pencil" style="color:rgb(66, 66, 66); font-size: 17px;"></li>
                        Editar Evento o Noticia
                    @else 
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear Evento, Noticia o Documento
                    @endif
                    </button>
                </th>
                <th id="borrar">
                    <button id="reset-button" type="button" onclick="limpiaForm('#form-eventos-noticias')" >
                    <img alt="mal" src="{{URL::to('/images/ml.png')}}" width="16" height="16" />
                    Limpiar Formulario
                </th>
            </thead>
            </table>   
    </form>    
</div>  
@stop    