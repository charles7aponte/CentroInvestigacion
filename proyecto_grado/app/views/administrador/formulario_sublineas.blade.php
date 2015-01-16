@extends('administrador.panel_admin')

@section('cuerpo')
<div>  
    <form id="form-sublineas" autocomplete="on"   action="{{URL::to('creacion/formulariosublineas')}}" method="post">

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


        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nueva subl&iacute;nea</h2></div>
            <ul>
                <fieldset> 

                    <li class="@if($errors->has('nombre-sublinea')) has-error @endif">
                        <label for="nombre-sublinea">Nombre de la subl&iacute;nea:</label>
                        <input type="text" id="nombre-sublinea" name="nombre-sublinea" value="{{Input::old('nombre-sublinea')}}" required="required"/> 
                        @if ($errors->has('nombre-sublinea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre-sublinea') }}</p> @endif
                    </li>

                    </li>
                    <li class="@if($errors->has('estado-sublinea')) has-error @endif">
                        <label for="estado-sublinea">Estado de la subl&iacute;nea:</label>
                        <input id="estado-sublinea" name="estado-sublinea" value="{{Input::old('estado-sublinea')}}"></input>
                        @if ($errors->has('estado-sublinea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('estado-sublinea') }}</p> @endif
                    </li>  

                    <li>
                        <label for="lineade-sublinea">L&iacute;nea: </label> 
                        <select name="lineade-sublinea">
                         <!--si existe .. esta variable llega del controlador, que a su vez lo pide el modelo -->
                          @if(isset($lineas))
                          
                             @foreach ($lineas as $linea) <!--array--- nombre del campo en la bd-->
                               <option value="{{$linea['id_lineas']}}">{{$linea['nombre_linea']}}</option>
                             @endforeach 

                          @endif
                        </select>
                    </li>
                </fieldset>
            </ul>
            <ul>
                <fieldset>
                    <li class="@if($errors->has('decr-sublinea')) has-error @endif">
                        <label for="decr-sublinea">Descripci&oacute;n:</label>
                        <textarea id="decr-sublinea" name="decr-sublinea" required="required" value="{{Input::old('decr-sublinea')}}" ></textarea>
                        @if ($errors->has('decr-sublinea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('decr-sublinea') }}</p> @endif
                    </li>  
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-sublinea" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear subl&iacute;nea
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