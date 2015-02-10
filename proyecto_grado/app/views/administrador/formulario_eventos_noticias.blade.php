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
    <form id="form-eventos-noticias" autocomplete="on" 
    enctype="multipart/form-data"
     action="{{URL::to('creacion/formularioeventosnoticias')}}" method="post">
        
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



        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Crear un Evento &oacute; Noticia</h2></div>
            <ul>
                <fieldset> 
                    <li class="@if($errors->has('titulo-even-noti')) has-error @endif">
                    <label for="titulo-even-noti">T&iacute;tulo:</label>
                        <input type="text" id="titulo-even-noti" name="titulo-even-noti" value="{{Input::old('titulo-even-noti')}}" required="required"/> 
                         @if ($errors->has('titulo-even-noti')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('titulo-conv') }}</p> @endif
                    </li>   

                   <li class="@if($errors->has('tipo-even-noti')) has-error @endif">
                    <label for="tipo-even-noti">Tipo:</label>
                        <select name="tipo-even-noti">
                            <option value="Evento">Evento</option>
                            <option value="Noticia">Noticia</option>
                        </select>

                         @if ($errors->has('tipo-even-noti')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('tipo-even-noti') }}</p> @endif
                    </li> 

                    <li class="@if($errors->has('desc-even-noti')) has-error @endif">
                        <label for="desc-even-noti">Descripci&oacute;n:</label>
                        <textarea id="desc-even-noti" name="desc-even-noti"  required="required">{{Input::old('desc-even-noti')}}</textarea>
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
                                            readonly id="fecha-even-noti" class="date form-control" data-format="dd/MM/yyyy" name="fecha-even-noti" value="{{Input::old('fecha-even-noti')}}" required="required" /> 
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
                        <label for="dcto-even-noti">Documento: </label>
                        <input type="file" id="dcto-even-noti" name="dcto-even-noti" value="{{Input::old('dcto-even-noti')}}" />
                        @if ($errors->has('dcto-even-noti')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('dcto-even-noti') }}</p> @endif
                    </li> 
    
                </fieldset> 
            </ul>   
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-even-noti" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear
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