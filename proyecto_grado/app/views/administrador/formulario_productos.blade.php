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
    <form id="form-productos" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nuevo producto</h2></div>
        <ul>
            <fieldset> 

                <li><label for="titulo-producto">Nombre del producto:</label>
                    <input type="text" id="titulo-produtcto" name="titulo-produtcto" value="" required="required"/> 
                </li>    
                <li><label for="fecha-proy">Fecha:</label>
                    <div class="container">
                        <div class="row">
                            <div class='col-sm-5' style="padding:0px;">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type="" style="cursor:pointer"   
                                        readonly id="fecha-proy" class="date form-control" data-format="dd/MM/yyyy" name="creacion" value="" required="required" /> 
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>                               
                        </div>
                    </div>    
                </li>
                <li><label for="subtipo-proy">Subtipo de producto:</label> 
                    <select name="subtipo-proy" required="required">
                        <option value=""></option>
                        <option value="">Bbbbbbbb</option>
                        <option value="">Aaaaaaaa</option>
                    </select>
                </li>
                <li><label for="grupo-proy">Grupo:</label> 
                    <select name="grupo-proy" required="required">
                        <option value=""></option>
                        <option value="">Horizonte Mediatico</option>
                        <option value="">Gitecx</option>
                    </select>
                </li>
                <li><label for="linea-proy">Linea:</label> 
                    <select name="linea-proy" required="required">
                        <option value=""></option>
                        <option value="">Teleinformatica</option>
                        <option value="">Horizonte mediatico</option>
                    </select>
                </li>
                <li><label for="entidad-prod">Entidad:</label>
                    <input type="tel" id="entidad-prod" name="entidad-prod" value=""/>
                </li>
                <li><label for="reconocimiento-prod">Reconocimiento:</label>
                    <input type="text" id="reconocimiento-prod" name="reconocimiento-prod" value=""/>
                </li>
                <li><label for="desc-conv">Descripci&oacute;n:</label>
                    <textarea id="desc-conv" name="desc-conv" required="required"></textarea>
                </li> 
            </fieldset>
        </ul>
        <ul>
            <fieldset>
                <li><label for="foto-producto">Foto del producto: </label>
                    <input type="file" id="foto-producto" name="foto-producto" />
                </li> 
                <li><label for="soporte-producto">Soporte del producto: </label>
                    <input type="file" id="soporte-producto" name="soporte-producto" />
                </li>  
                <li><label for="tipo-soporte-producto">Tipo de Soporte: </label>
                    <input type="text" id="tipo-soporte-producto" name="tipo-soporte-producto" />
                </li> 
                <li><label for="obs-soporte">Observaciones del soporte:</label>
                    <textarea id="obs-soporte" name="obs-soporte"></textarea>
                </li>     
            </fieldset> 
        </ul>    
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-producto" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear producto
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