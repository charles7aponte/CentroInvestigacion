@extends('administrador.panel_admin')

@section('cuerpo')
<div>  
    <form id="form-sublineas" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nueva subl&iacute;nea</h2></div>
            <ul>
                <fieldset> 

                    <li><label for="nombre-sublinea">Nombre de la subl&iacute;nea:</label>
                        <input type="text" id="nombre-sublinea" name="nombre-sublinea" value="" required="required"/> 
                    </li>
                    </li>
                    <li><label for="objetivo-sublinea">Estado de la subl&iacute;nea:</label>
                        <input id="objetivo-sublinea" name="objetivo-sublinea"></input>
                    </li>   
                    <li><label for="lineade-sublinea">L&iacute;nea:</label> 
                        <select name="lineade-sublinea" required="required">
                            <option value=""></option>
                            <option value="">Aaaaaa</option>
                            <option value="">Bbbbbb</option>
                            <option value="">Cccccc</option>
                        </select>
                    </li>

                </fieldset>
            </ul>
            <ul>
                <fieldset>
                    <li><label for="decr-sublinea">Descripci&oacute;n:</label>
                        <textarea id="decr-sublinea" name="decr-sublinea" required="required" ></textarea>
                    </li>  
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-sublinea" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear subl&iacute;nea
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