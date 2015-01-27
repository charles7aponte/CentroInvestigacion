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
    <form id="form-grupos" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo J&oacute;ven investigador o Externo</h2></div>
            <ul>
                <fieldset>  
                    <li><label for="cedula">C&eacute;dula:</label>
                        <input type="text" id="cedula" name="cedula" value="" required="required"/>
                    </li>    
                    <li><label for="nombre1">Primer Nombre:</label>
                        <input type="text" id="nombre1" name="nombre1" value="" required="required"/>
                    </li>
                    <li><label for="nombre2">Segundo Nombre:</label>
                        <input type="nombre2" id="nombre2" name="nombre2" value=""/>
                    </li>
                    <li><label for="apellido1">Primer Apellido:</label>
                        <input type="text" id="apellido1" name="apellido1" value="" required="required"/>
                    </li>
                    <li><label for="apellido2">Segundo Apellido:</label>
                        <input type="text" id="apellido2" name="apellido2" value=""/>
                    </li>
                    <li><label for="direccion">Direcci&oacute;n:</label>
                        <input type="text" id="direccion" name="direccion" value=""/>
                    </li>
                    <li><label for="telefono">Tel&eacute;fono Contacto:</label>
                        <input type="tel" id="telefono" name="telefono" value=""/>
                    </li>
                    <li><label for="celular">Celular:</label>
                        <input type="text" id="celular" name="celular" value=""/>
                    </li>
                    <li><label for="email">Email:</label>
                        <input type="text" id="email" name="email" value=""/>
                    </li>
                    <li><label for="foto">Foto:</label>
                        <input type="file"  id="foto" name="foto" />
                    </li>
                    <li><label for="perfil">Perfil:</label> 
                        <select name="perfil" required="required">
                            <option value=""></option>
                            <option value="inv">Investigador</option>
                            <option value="estudio">Joven Epi</option>
                        </select>
                    </li> 
                    <li><label for="">Fecha Perfil:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" 
                                            style="cursor:pointer"   
                                            readonly id="creacion" class="date form-control" data-format="dd/MM/yyyy" name="creacion" value="" required="required" /> 
                                            
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </li>
                    <li><label for="profesion">Profesi&oacute;n:</label>
                        <input type="text" id="profesion" name="profesion" value="" required="required"/>
                    </li>
                    <li><label for="codigo_cov">C&oacute;d. Convocatoria:</label>
                        <input type="text" id="codigo_conv" name="codigo_conv" value="" required="required"/>
                    </li>
                    <li><label for="nombre_conv">Nombre Conv.</label>
                        <input type="text" id="nombre_conv" name="nombre_conv" value="" required="required"/>
                    </li>
                    <li><label for="numero_contrato">N. Contrato</label>
                        <input type="text" id="numero_contrato" name="numero_contrato" value="" required="required"/>
                    </li>
                    <li><label for="">Fecha Inicio:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" 
                                            style="cursor:pointer"   
                                            readonly id="creacion" class="date form-control" data-format="dd/MM/yyyy" name="creacion" value="" required="required" /> 
                                            
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
                                            readonly id="creacion" class="date form-control" data-format="dd/MM/yyyy" name="creacion" value="" required="required" /> 
                                            
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
    </form>    
</div>  
@stop    