@extends('administrador.panel_admin')


@section('cuerpo')
<div>  
    <form id="form-tipogrupo" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo tipo de grupo</h2></div>
                       <ul>
                <fieldset style="border-color:transparent">
                    <li>
                        <label for="tipo-grupo">Tipo Grupo:</label> 
                          <input id="tipo-grupo" type="text" name="tipo-grupo" value="" required="required"
                        </div> 
                    </li>       
 
                </fieldset> 
            </ul> 
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-tipogrupo" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear
                        </button>
                    </th>
                </thead>
            </table>



            <ul> 
                <table id="tabla-tipo-grupos">
                  <thead>
                    <tr><th colspan="3">TIPOS DE GRUPO</th></tr>
                    <tr>
                      <th>C&oacute;digo</th>
                      <th>Nombre del tipo de grupo</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>01</td>
                      <td>Estudio</td>
                      <td>
                        <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                      </td>
                    </tr>
                    <tr>
                      <td>02</td>
                      <td>Investigaci&oacute;n</td>
                      <td>
                        <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </fieldset>
            </ul>
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="guardar-financiamiento" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Guardar 
                        </button>
                    </th>
                </thead>
            </table> 
    </form>    
</div>  
@stop    