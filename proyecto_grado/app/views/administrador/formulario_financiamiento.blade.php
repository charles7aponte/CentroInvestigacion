@extends('administrador.panel_admin')

@section('cuerpo') 
<div>  
    <form id="form-financiamiento-proyectos" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Financiamiento del proyecto</h2></div>           
            <ul>
                <fieldset style="border-color:transparent">
                <li><label for="fecha-financiamiento">Fecha: </label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" style="cursor:pointer" 
                                            readonly id="fecha-financiamiento" class="date form-control" data-format="dd/MM/yyyy" name="creacion" value="" required="required" /> 
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>    
                    </li>
                    <li><label for="entidad-financiada">Entidad:</label> 
                        <select name="entidad-financiada" required="required">
                            <option value=""></option>
                            <option value="">Colciencias</option>
                            <option value="">Universidad de los llanos</option>
                        </select>
                    </li>                     
                    <li><label for="modo-financiada">Modo de financiamiento:</label> 
                        <select name="modo-financiada" required="required">
                            <option value=""></option>
                            <option value="">Especie</option>
                            <option value="">Efectivo</option>
                        </select>
                    </li> 
                    <li>
                        <label for="valor-financiado">Valor:</label> 
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input id="valor-financiado" type="text" class="form-control" required="required" style="width: 567px;">
                        </div> 
                    </li>       
                    <li><label for="descripcion-financiamiento">Descripci&oacute;n:</label>
                    <textarea id="descripcion-financiamiento" name="descripcion-financiamiento"></textarea>
                    </li>   
                </fieldset> 
            </ul> 
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="agregar-financiamiento" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Agregar
                        </button>
                    </th>
                </thead>
            </table>

            <ul>
                <fieldset>
                <table id="tabla-financiamiento-grupos">
                  <thead>
                    <tr><th colspan="6">NOMBRE DEL PROYECTO</th></tr>
                    <tr>
                      <th>Fecha</th>
                      <th>Entidad</th>
                      <th>Modo</th>
                      <th>Valor</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>01/03/2014</td>
                      <td>Universidad de los llanos</td>
                      <td>Efectivo</td>
                      <td>$ 3.000.000</td>
                      <td><a href="#" class="button">Ver descripci&oacute;n</a></td>
                      <td>
                        <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                      </td>
                    </tr>
                    <tr>
                      <td>01/03/2014</td>
                      <td>Universidad de los llanos</td>
                      <td>Especie</td>
                      <td>$ 3.000.000</td>
                      <td><a href="#" class="button">Ver descripci&oacute;n</a></td>
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