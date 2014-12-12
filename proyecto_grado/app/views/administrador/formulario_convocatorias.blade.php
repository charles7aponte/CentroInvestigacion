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
    <form id="form-convocatorias" autocomplete="on"  action="{{URL::to('creacion/formularioconvocatorias')}}" method="post">
        
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



        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Crear nueva convocatoria</h2></div>
            <ul>
                <fieldset> 

                    <li class="@if($errors->has('titulo-conv')) has-error @endif">
                    <label for="titulo-conv">T&iacute;tulo:</label>
                        <input type="text" id="titulo-conv" name="titulo-conv" value="{{Input::old('titulo-conv')}}" required="required"/> 
                         @if ($errors->has('titulo-conv')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('titulo-conv') }}</p> @endif
                    </li>    
                    <li><label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado" value="" required="required"/>
                    </li>    
                    <li><label for="fecha-apert">Fecha de apertura:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" style="cursor:pointer"   
                                            readonly id="fecha-apertura" class="date form-control" data-format="dd/MM/yyyy" name="fecha-apertura" value="" required="required" /> 
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>    
                    </li>
                    <li><label for="fecha-cierre">Fecha de cierre:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" 
                                            style="cursor:pointer"   
                                            readonly id="fecha-cierre" class="date form-control" data-format="dd/MM/yyyy" name="fecha-cierre" value="" required="required" /> 
                                            
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </li>
                    <li><label for="telefono">Tel&eacute;fono:</label>
                        <input type="tel" id="telefono" name="telefono" value=""/>
                    </li>
                    <li><label for="email-conv">Email:</label>
                        <input type="email" id="email-conv" name="email-conv" value="" required="required"/>
                    </li>
                    <li><label for="pag-conv">P&aacute;gina web:</label>
                        <input type="text" id="pag-conv" name="pag-conv" value=""/>
                    </li>
                    <li><label for="dirigida-conv">Dirigida a:</label>
                        <input type="text" id="dirigida-conv" name="dirigida-conv" value="" required="required" />
                    </li>
                    <li><label for="desc-conv">Descripci&oacute;n:</label>
                        <textarea id="desc-conv" name="desc-conv" required="required"></textarea>
                    </li> 
                    <li><label for="cuantia-conv">Cuant&iacute;a:</label>
                        <span class="glyphicon glyphicon-usd"></span><input type="text" id="cuantia-conv" name="cuantia-conv" value="" />
                    </li>
                </fieldset>
            </ul>
            <ul>
                <fieldset>
                    <li><label for="dcto-conv">Documento de la convocatoria: </label>
                        <input type="file" id="dcto-conv" name="dcto-conv" />
                    </li>     
                </fieldset> 
            </ul>   
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-convocatoria" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear convocatoria
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