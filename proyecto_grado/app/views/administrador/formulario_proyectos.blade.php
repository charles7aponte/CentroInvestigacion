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
    <form id="form-proyectos" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nuevo proyecto</h2></div>
            <ul>
                <fieldset> 

                    <li><label for="nombre-proyecto">Nombre del proyecto:</label>
                        <input type="text" id="nombre-proyecto" name="nombre-proyecto" value="" required="required"/> 
                    </li>   
                    <li><label for="estado-proyecto">Estado:</label>
                        <input type="text" id="estado-proyecto" name="estado-proyecto" value="" required="requerired"/>
                    </li>
                    <li><label for="fecha-proyecto">Fecha de inicio:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" style="cursor:pointer" 
                                            readonly id="fecha-proyecto" class="date form-control" data-format="dd/MM/yyyy" name="creacion" value="" required="required" /> 
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>    
                    </li>
                    <li><label for="convocatoria-proyecto">Convocatoria:</label> 
                        <select name="convocatoria-proyecto" required="requerired">
                            <option value="">Aaaaa</option>
                            <option value="">Bbbbbb</option>
                        </select>
                    </li> 
                    <li><label for="linea-proyecto">Linea del proyecto:</label> 
                        <select name="linea-proyecto" required="requerired">
                            <option value="">Teleinformatica</option>
                            <option value="">Software</option>
                        </select>
                    </li> 
                    <li><label for="grupo1-proyecto">Grupo 1 del proyecto:</label> 
                        <select name="grupo1-proyecto">
                            <option value="">Gitecx</option>
                            <option value="">Horizonte Mediatico</option>
                        </select>
                    </li> 
                    <li><label for="grupo2-proyecto">Grupo 2 del proyecto:</label> 
                        <select name="grupo2-proyecto">
                            <option value="">Gitecx</option>
                            <option value="">Horizonte Mediatico</option>
                        </select>
                    </li> 
                    <li><label for="obj-proyecto">Objetivo general:</label>
                        <textarea id="obj-proyecto" name="obj-proyecto" required="required"></textarea>
                    </li>
                </fieldset>
            </ul>
            <ul>
                <fieldset>
                    <li><label for="actaini-proyectos">Archivo del Acta de inicio: </label>
                        <input type="file" id="actaini-proyectos" name="actaini-proyectos" />
                    </li>     
                    <li><label for="propuesta-proyecto">Archivo de la propuesta: </label>
                        <input type="file" id="propuesta-proyecto" name="propuesta-proyecto" />
                    </li>  
                    <li><label for="informe-proyecto">Archivo del informe final: </label>
                        <input type="file" id="informe-proyecto" name="informe-proyecto" />
                    </li>      
                </fieldset> 
            </ul>   
            <ul>
                <fieldset style="border-color:transparent">
                   
                </fieldset> 
            </ul>  
            <button id="submit-button" type="submit">
                <img alt="bien"  src="images/bn.png" width="16" height="16" />
                Crear Proyecto
            </button>
            <button id="reset-button" type="reset">
                    <img alt="mal" src="images/ml.png" width="16" height="16" />
                    Borrar todo
            </button>   
    </form>    
</div>  
@stop    