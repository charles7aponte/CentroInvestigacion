@extends('administrador.panel_admin')

@section('javascript-nuevos')
   
    <script type="text/javascript" src="{{URL::to('/js')}}/recursos/formulariointegrantes-lineasgrupos.js"></script>
@stop    

@section('cuerpo')
<div>  

    <form id="form-sublineas" autocomplete="on" enctype="multipart/form-data" method="post" action="{{URL::to('/')}}/creacion/formulariounidadesacademicas">


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
           
                <img alt="new" src="images/nuevo.png" width="16" height="16"/> 
                 Crear nueva Unidad Académica
        </h2></div>
            <ul>
                <fieldset> 
                    <li class="@if($errors->has('nombre-unidad')) has-error @endif">
                        <label for="nombre-unidad">Nombre de la unidad:</label>
                        <input type="text" id="nombre-unidad" name="nombre-unidad"required="required"/> 
                        @if ($errors->has('nombre-unidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre-unidad') }}</p> 
                        @endif
                    </li>

                    <li class="@if($errors->has('coor-unidad')) has-error @endif" >
                        <label for="coor-unidad">Coordinador de la unidad:</label>
                        <input type="text" id="coor-linea" name="coor-unidad" /> 
                        <input type="hidden" id="cedula-persona" name="cedula-persona"/>
                            <span id="advertencias">
                                <p>*Ingrese el n&uacute;mero de documento o nombres y espere a que el autocompletado lo muestre.</p>
                            </span> 
                         @if ($errors->has('coor-unidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('coor-unidad') }}</p> @endif
                    </li>

                    <li class="@if($errors->has('descripcion_unidad')) has-error @endif">
                        <label for="descripcion_unidad">Descripción:</label>
                        <textarea id="descripcion_unidad" name="descripcion_unidad"></textarea>
                         @if ($errors->has('descripcion_unidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('descripcion_unidad') }}</p> @endif
                    </li>
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-unidad" type="submit" class="submit-button">
                                <img alt="bien"  src="images/bn.png" width="16" height="16" />
                                Crear Unidad Académica
                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="button" onclick="limpiaForm('#form-sublineas')" >
                        <img alt="mal" src="{{URL::to('/images/ml.png')}}" width="16" height="16" />
                        Limpiar Formulario
                    </th>
                </thead>
            </table>  
    </form>    
</div>  
@stop    