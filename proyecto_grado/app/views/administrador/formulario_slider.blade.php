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

@stop


@section('cuerpo')

<div>

    <form id="form-eventos-noticias" autocomplete="on" enctype="multipart/form-data" action="{{URL::to('creacion/formularioslider')}}" method="post">  
    
        
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


        <div id="titulo"><h2>

                <img alt="new" src="images/nuevo.png" width="16" height="16" />
                    Agregar nueva imagen al slider   

        </h2></div>
            <ul>
                <fieldset> 
                    <li class="@if($errors->has('ruta-imagen')) has-error @endif">
                        <label for="ruta-imagen">Imagen:</label>
                        <div id="ruta-imagen" > 
                            <input type="file" id="ruta-imagen" name="ruta-imagen" value="" />
                            @if ($errors->has('ruta-imagen')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('ruta-imagen') }}</p> @endif
                        </div>
                    </li>  

                <li class="@if($errors->has('desc-slider')) has-error @endif">
                    <label for="desc-slider">Descripci&oacute;n:</label>
                    <textarea id="desc-s" name="desc-slider"></textarea>
                    @if ($errors->has('desc-slider')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('desc-slider') }}</p> @endif
                </li>  

                </fieldset>
            </ul>

            <table id="botones-formularios">
            <thead>
                <th id="crear">
                      <button id="crear-even-noti" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                            Agregar Imagen
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