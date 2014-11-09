@extends('panel_admin')
@section('cuerpo')
<div>  
    <form id="form-grupos" autocomplete="on"   action="" method="">
        <ul>
        <h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo grupo</h2>
            <fieldset>
                <legend>Datos Basicos</legend>
                <label>
                    <li>
                        Nombre del grupo: 
                            <input type="text" name="nombre" required/>
                            <span class="requerido">*</span>
                    </li>    
                </label>
                <label>
                    <li>
                        Coordinador: 
                            <input type="text" name="coordinador" required />
                            <span class="requerido">*</span>
                    </li>        
                </label>
                <label>
                    <li>
                        Email: 
                            <input name="email" type="email" required size="50" />
                    </li>        
                </label>
                <label>
                    <li>
                        P&aacute;gina web:
                            <input type="text" name="pagina" required />
                    </li>        
                </label>
                <label>
                    <li>
                        Tel&eacute;fono:   
                            <input id="tel" name="telefono" type="tel" required size="50" pattern=""/>  
                    </li>                
                </label>
                <label>
                    <li>
                        Direcci&oacute;n grupo: 
                            <input type="text" name="direccion" required />
                    </li>        
                </label>
                <label>
                    <li>
                        Año creaci&oacute;n: <input type="date" required />
                    </li>    
                </label>
                <label>
                    <li>
                    Unidad acad&eacute;mica: 
                        <input type="text" name="unidad" required />
                        <span class="requerido">*</span>
                    </li>
                </label>
                <label> 
                    <li>
                        Categor&iacute;a: <input type="text" name="categoria" required />
                    </li>    
                </label>
                <label>
                    <li>
                        Tipo grupo: 
                            <select name="tipo">
                                <option value="inv">Investigaci&oacute;n</option>
                                <option value="estudio">Estudio</option>
                            </select>
                    </li>        
                </label>
            </fieldset>

            <fieldset>
            <label>
                <li>
                    Integrantes:
                </li>
            </label>
            <label>
                <li>
                    L&iacute;neas:
                </li>
            </label>
            <label>
                <li>
                    Subl&iacute;neas:
                </li>
            </label>
            <label>
                <li>
                    Objetivos:
                        <textarea name="obj" rows="5" cols="100"></textarea>                        
                </li>        
            </label>
            </fieldset>

            <fieldset>
                <label>
                    <li>
                        Link Gruplac:
                            <input type="text" name="gruplac">
                    </li>    
                </label>
                <label>
                    <li>
                        Ruta afiche:
                            <input type="text" name="afiche">
                    </li>    
                </label>
                <label>
                    <li>
                        Imagen1:
                            <input type="file" multiple="multiple" />
                    </li>        
                </label>
                <label>
                    <li>
                        Imagen2:
                        <input type="file" multiple="multiple" />
                    </li>    
                </label> 
                <label>
                    <li>
                        Logo Grupo:
                            <input type="file" multiple="multiple" />
                    </li>        
                </label>
            </fieldset> 
            <li>  
                <button type="submit">
                    <img alt="bien"  src="images/bn.png" width="16" height="16" />
                    Crear Grupo
                </button>
            </li>
            <li>
                <button type="reset">
                    <img alt="mal" src="images/ml.png" width="16" height="16" />
                    Borrar todo
            </button>
            </li>
        </ul>    
    </form>    
</div>  
@stop    