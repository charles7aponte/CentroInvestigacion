@extends('administrador.panel_admin')

@section('cuerpo')
<div>  

    <form id="form-sublineas" autocomplete="on" enctype="multipart/form-data"
     @if(isset($sublinea))
        action="{{URL::to('edicion/formulariosublineas')}}"
     @else
        action="{{URL::to('creacion/formulariosublineas')}}"
        <?php 
        $sublinea = null;
        ?>
     @endif 

    method="post">

    <!-- en caso de no existir el id-->
        @if(isset($accion) && $accion=="editar")
              
            @if(!isset($sublinea) || !$sublinea)

                <fieldset style="margin-bottom: 2px;
                        margin-top: 5px;
                        padding: 2px;">

                        <div  style="margin: 0px;" class="alert alert-danger">No existe la sublinea</div> 
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

        @if(isset($sublinea['id_sublinea']))

            <input type="hidden" name="id_sublineas" value="{{$sublinea['id_sublinea']}}">
        @endif

        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />
           
            @if(isset($sublinea['id_sublinea']))
              Edicion Sublinea 
            @else 
                 Crear nueva Subl&iacute;nea
            @endif
        </h2></div>
            <ul>
                <fieldset> 
                    <li class="@if($errors->has('nombre-sublinea')) has-error @endif">
                        <label for="nombre-sublinea">Nombre de la subl&iacute;nea:</label>
                        <input type="text" id="nombre-sublinea" name="nombre-sublinea" value="{{ Input::old('nombre-sublinea')!=null? Input::old('nombre-sublinea'): (isset($sublinea['nombre_sublinea'])? $sublinea['nombre_sublinea']:'')}}" required="required"/> 
                        @if ($errors->has('nombre-sublinea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre-sublinea') }}</p> @endif
                    </li>

                    </li>
                    <li class="@if($errors->has('estado-sublinea')) has-error @endif">
                        <label for="estado-sublinea">Estado de la subl&iacute;nea:</label>
                        <input id="estado-sublinea" name="estado-sublinea" value="{{Input::old('estado-sublinea')!=null? Input::old('estado-sublinea'): (isset($sublinea['estado'])? $sublinea['estado']:'')}}"></input>
                        @if ($errors->has('estado-sublinea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('estado-sublinea') }}</p> @endif
                    </li>  

                    <li>
                        <label for="lineade-sublinea">L&iacute;nea: </label> 
                        <select name="lineade-sublinea" required="required">
                         <!--si existe .. esta variable llega del controlador, que a su vez lo pide el modelo -->
                          @if(isset($lineas))
                          
                             @foreach ($lineas as $linea)
                                @if(isset($sublinea['inv_id_linea']) && $linea['id_lineas'] == $sublinea['inv_id_linea'])
                                    <option value="{{$linea['id_lineas']}}"  selected>{{$linea['nombre_linea']}}</option>
                                @else 
                                    <option value="{{$linea['id_lineas']}}" >{{$linea['nombre_linea']}}</option>
                                @endif
                               
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
                        <textarea onchange="letrasCapital(this)" id="decr-sublinea" name="decr-sublinea" required="required">{{Input::old('decr-sublinea')!=null?Input::old('decr-sublinea'):(isset($sublinea['descripcion_sublinea'])?$sublinea['descripcion_sublinea']:'')}}</textarea>
                        @if ($errors->has('decr-sublinea')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('decr-sublinea') }}</p> @endif
                    </li>  
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-sublinea" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />

                         @if(isset($sublinea['id_sublinea']))
                              Editar Sublinea
                            @else 
                                Crear Sublinea
                            @endif
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