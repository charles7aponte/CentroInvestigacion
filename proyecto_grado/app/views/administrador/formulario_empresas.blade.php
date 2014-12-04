@extends('administrador.panel_admin')

@section('cuerpo')
<div>  
    <form id="form-empresas" autocomplete="on"   action="{{URL::to('creacion/formulario')}}" method="post">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nueva empresa</h2></div>
            <ul>
                <fieldset> 
                    <li><label for="nit-entidad">Nit de la entidad:</label>
                        <input type="text" id="nit-entidad" name="nit-entidad" value="" required="required"/> 
                    </li>   
                    <li><label for="nombre-entidad">Nombre de la entidad:</label>
                        <input type="text" id="nombre-entidad" name="nombre-entidad" value="" required="required"/> 
                    </li> 
                    <li><label for="representante-entidad">Representante legal:</label>
                        <input type="text" id="representante-entidad" name="representante-entidad" value="" required="required"/> 
                    </li> 
                    <li><label for="tipo-entidad">Tipo empresa:</label>
                        <input type="text" id="tipo-entidad" name="tipo-entidad" value="" required="required"/> 
                    </li>
                    <li><label for="desc-empresa">Descripci&oacute;n:</label>
                        <textarea id="desc-empresa" name="desc-empresa"></textarea>
                    </li>
                </fieldset>
            </ul>
                
            <ul>
                <fieldset>
                    <li><label for="email-entidad">Email:</label>
                        <input type="email" id="email-entidad" name="email-entidad" value="" required="required"/> 
                    </li>   
                    <li><label for="pagina-entidad">P&aacute;gina web:</label>
                        <input type="text" id="pagina-entidad" name="pagina-entidad" value=""/> 
                    </li> 
                    <li><label for="telefono-entidad">Tel&eacute;fono:</label>
                        <input type="text" id="telefono-entidad" name="telefono-entidad" value=""/> 
                    </li>
                    <li><label for="celular-entidad">Celular:</label>
                        <input type="text" id="celular-entidad" name="celular-entidad" value=""/> 
                    </li>  
     
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-empresa" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear empresa
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