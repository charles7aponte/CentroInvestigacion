@extends('panel_admin')
@section('cuerpo')
<div>  
    <form id="form-grupos" autocomplete="on"   action="" method="">
        <ul>
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo grupo</h2></div>
            <fieldset>
                <legend>Datos Basicos</legend>
                <ul>   
                    <li><label for="nombre">Nombre del grupo:</label>
                        <input type="text" id="nombre" name="nombre" value="" required="required"/>
                        <span class="requerido">*</span>
                    </li>    
                    <li><label for="coord">Coordinador:</label>
                        <input type="text" id="coord" name="coord" value="" required="required"/>
                        <span class="requerido">*</span>
                    </li>
                    <li><label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="" required="required" />
                        <span class="requerido">*</span>   
                    </li>
                    <li><label for="pagina">P&aacute;gina web:</label>
                        <input type="text" id="pagina" name="pagina" value=""  autofocus="autofocus" />
                    </li>
                    <li><label for="telefono">Tel&eacute;fono:</label>
                        <input type="tel" id="telefono" name="telefono" value="" required="required"/>
                        <span class="requerido">*</span>
                    </li>
                    <li><label for="direccion">Direcci&oacute;n:</label>
                        <input type="text" id="direccion" name="direccion" value="" required="required"/>
                        <span class="requerido">*</span>
                    </li>
                    <li><label for="creacion">Año de creaci&oacute;n:</label>
                        <input type="date" id="creacion" name="creacion" value="" required="required" />
                        <span class="requerido">*</span>
                    </li>
                    <li><label for="unidad">Unidad acad&eacute;mica:</label>
                        <input type="text" id="unidad" name="unidad" value="" required="required"/>
                        <span class="requerido">*</span>
                    </li>
                    <li><label for="categoria">Categor&iacute;a:</label>
                        <input type="text" id="categoria" name="categoria" value="" required="required"/>
                        <span class="requerido">*</span>
                    </li>
                    <li><label for="tipo">Tipo:</label> 
                        <select name="tipo">
                            <option value="inv">Investigaci&oacute;n</option>
                            <option value="estudio">Estudio</option>
                        </select>
                        <span class="requerido">*</span>
                    </li>    
            </fieldset>

            <fieldset>
                <li><label for="integrantes">Integrantes:</label> 
                    <span class="requerido">*</span>
                </li>    
                <li><label for="lineas">L&iacute;neas:</label> 
                    <span class="requerido">*</span>
                </li>
                <li><label for="sublineas">Subl&iacute;neas:</label> 
                     <span class="requerido">*</span>
                </li>
                <li><label for="objetivos">Objetivos:</label>
                    <textarea id="objetivos" name="objetivos" required="required"></textarea>
                    <span class="required">*</span>
                </li>    
            </fieldset>

            <fieldset>
                <li><label for="gruplac">Link Gruplac: </label>
                    <input type="text" id="gruplac" name="gruplac" />
                </li>
                <li><label for="logog">Logo del grupo:</label>
                    <input type="file"  id="logog" name="logog"  required="required" />
                     <span class="requerido">*</span>
                </li>
                <li><label for="afiche">Ruta del afiche: </label>
                    <input type="file" id="afiche" name="afiche"/>
                </li>
                <li><label for="img1">Imagen 1: </label>
                    <input type="file"  id="img1" name="img1" />
                </li>
                <li><label for="img2">Imagen 2: </label>
                    <input type="file"  id="img2" name="img2" />
                </li>    
            </fieldset>   
            <button id="submit-button" type="submit">
                <img alt="bien"  src="images/bn.png" width="16" height="16" />
                Crear Grupo
            </button>
            <button id="reset-button" type="reset">
                    <img alt="mal" src="images/ml.png" width="16" height="16" />
                    Borrar todo
            </button>
            
        </ul>    
    </form>    
</div>  
@stop    