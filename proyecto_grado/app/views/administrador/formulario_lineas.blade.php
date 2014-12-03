@extends('administrador.panel_admin')

@section('cuerpo')
<div>  
    <form id="form-lineas" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nueva l&iacute;nea</h2></div>
            <ul>
                <fieldset> 

                    <li><label for="nombre-linea">Nombre de la l&iacute;nea:</label>
                        <input type="text" id="nombre-linea" name="nombre-linea" value="" required="required"/> 
                    </li>
                    <li><label for="coor-linea">Coordinador de la l&iacute;nea:</label>
                        <input type="text" id="coor-linea" name="coor-linea" value="" required="required"/> 
                    </li>
                    <li><label for="objetivo-linea">Objetivo de la l&iacute;nea:</label>
                        <textarea id="objetivo-linea" name="objetivo-linea"></textarea>
                    </li>  
                    <li><label for="objetivo-estulinea">Objetivo de estudio:</label>
                        <textarea id="objetivo-estulinea" name="objetivo-estulinea" required="required" ></textarea>
                    </li>   

                </fieldset>
            </ul>
            <ul>
                <fieldset>
                    <li><label for="defi-linea">Definici&oacute;n de la l&iacute;nea:</label>
                        <textarea id="defi-linea" name="defi-linea"></textarea>
                    </li>
                    <li><label for="archivo-linea">Ruta archivo: </label>
                        <input type="file" id="archivo-linea" name="archivo-linea" />
                    </li>      
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-linea" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear l&iacute;nea
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