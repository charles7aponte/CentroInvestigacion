@extends('administrador.panel_admin')

@section('cuerpo')
<div>  
    <form id="form-lineas" autocomplete="on" enctype="multipart/form-data" action="{{URL::to('creacion/formulariolineas')}}"  method="post">

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

        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nueva l&iacute;nea</h2></div>
            <ul>
                <fieldset> 

                    <li class="@if($errors->has('nombre-linea')) has-error @endif">
                        <label for="nombre-linea">
                        Nombre de la l&iacute;nea:</label>
                        <input type="text" id="nombre-linea" name="nombre-linea" value="{{Input::old('nombre-linea')}}" required="required"/>
                         @if ($errors->has('nombre-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre-linea') }}</p> @endif
                    </li>

                    <li class="@if($errors->has('coor-linea')) has-error @endif" >
                        <label for="coor-linea">Coordinador de la l&iacute;nea:</label>
                        <input type="text" id="coor-linea" name="coor-linea" value="{{Input::old('coor-linea')}}" required="required"/> 
                         @if ($errors->has('coor-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('coor-linea') }}</p> @endif
                    </li>

                    <li class="@if($errors->has('objetivo-linea')) has-error @endif">
                        <label for="objetivo-linea">Objetivo de la l&iacute;nea:</label>
                        <textarea id="objetivo-linea" name="objetivo-linea" value="{{Input::old('objetivo-linea')}}"></textarea>
                         @if ($errors->has('objetivo-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('objetivo-linea') }}</p> @endif
                    </li>  

                    <li class="@if($errors->has('objetivo-estulinea')) has-error @endif">
                        <label for="objetivo-estulinea">Objeto de estudio:</label>
                        <textarea id="objetivo-estulinea" name="objetivo-estulinea" required="required" value="{{Input::old('objetivo-estulinea')}}" ></textarea>
                         @if ($errors->has('objetivo-estulinea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('objetivo-estulinea') }}</p> @endif
                    </li>   

                </fieldset>
            </ul>
            <ul>
                <fieldset>
                    <li class="@if($errors->has('defi-linea')) has-error @endif">
                        <label for="defi-linea">Definici&oacute;n de la l&iacute;nea:</label>
                        <textarea id="defi-linea" name="defi-linea" value="{{Input::old('defi-linea')}}"></textarea>
                         @if ($errors->has('defi-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('defi-linea') }}</p> @endif
                    </li>

                    <li class="@if($errors->has('archivo-linea')) has-error @endif">
                        <label for="archivo-linea">Ruta archivo: </label>
                        <input type="file" id="archivo-linea" name="archivo-linea" value="{{Input::old('archivo-linea')}}" />
                         @if ($errors->has('archivo-linea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('archivo-linea') }}</p> @endif
                    </li>      
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-linea" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear l&iacute;nea
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