@extends('panel_admin')





@section('cuerpo')
<div>  
    <form id="form-convocatorias" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Crear nueva convocatoria</h2></div>
            <ul>
                <fieldset> 

                    <li><label for="titulo-conv">T&iacute;tulo:</label>
                        <input type="text" id="titulo-conv" name="titulo-conv" value="" required="required"/> 
                    </li>    
                    <li><label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado" value="" required="required"/>
                    </li>    
                    <li><label for="fecha-apert">Fecha de apertura:</label>
                        <input type="" id="fecha-apert" name="fecha-apert" value="" required="required" />
                    </li>
                    <li><label for="fecha-cierre">Fecha de cierre:</label>
                        <input type="" id="fecha-cierre" name="fecha-cierre" value=""  autofocus="autofocus" />
                    </li>
                    <li><label for="telefono">Tel&eacute;fono:</label>
                        <input type="tel" id="telefono" name="telefono" value=""/>
                    </li>
                    <li><label for="email-conv">Email:</label>
                        <input type="email" id="email-conv" name="email-conv" value="" required="required"/>
                    </li>
                    <li><label for="pag-conv">P&aacute;gina web:</label>
                        <input type="text" id="pag-conv" name="pag-conv" value="" required="required"/>
                    </li>
                    <li><label for="dirigida-conv">Dirigida a:</label>
                        <input type="text" id="dirigida-conv" name="dirigida-conv" value="" required="required" />
                    </li>
                    <li><label for="desc-conv">Descripci&oacute;n:</label>
                        <textarea id="desc-conv" name="desc-conv" required="required"></textarea>
                    </li> 
                    <li><label for="dirigida-conv">Cuant&iacute;a:</label>
                        <input type="text" id="dirigida-conv" name="dirigida-conv" value="" required="required" />
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
            <button id="submit-button" type="submit">
                <img alt="bien"  src="images/bn.png" width="16" height="16" />
                Crear convocatoria
            </button>
            <button id="reset-button" type="reset">
                    <img alt="mal" src="images/ml.png" width="16" height="16" />
                    Borrar todo
            </button>   
    </form>    
</div>  
@stop    