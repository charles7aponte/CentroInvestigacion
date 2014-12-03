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
                    <li><label for="estado-proy">Estado:</label> 
                        <select name="estado-proy" required="required">
                            <option value=""></option>
                            <option value="aprobado">Aprobado</option>
                            <option value="rechazado">Rechazado</option>
                            <option value="evaluacion">En evaluaci&oacute;n</option>
                        </select>
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
                        <select name="convocatoria-proyecto" required="required">
                            <option value=""></option>
                            <option value="">Aaaaa</option>
                            <option value="">Bbbbbb</option>
                        </select>
                    </li> 
                    <li><label for="linea-proyecto">Linea del proyecto:</label> 
                        <select name="linea-proyecto" required="required">
                            <option value=""></option>
                            <option value="">Teleinformatica</option>
                            <option value="">Software</option>
                        </select>
                    </li> 
                    <li><label for="grupo1-proyecto">Grupo 1 del proyecto:</label> 
                        <select name="grupo1-proyecto" required="required">
                            <option value=""></option>
                            <option value="">Gitecx</option>
                            <option value="">Horizonte Mediatico</option>
                        </select>
                    </li> 
                    <li><label for="grupo2-proyecto">Grupo 2 del proyecto:</label> 
                        <select name="grupo2-proyecto">
                            <option value=""></option>
                            <option value="">Gitecx</option>
                            <option value="">Horizonte Mediatico</option>
                        </select>
                    </li> 
                    <li><label for="obj-proyecto">Objetivo general:</label>
                        <textarea id="obj-proyecto" name="obj-proyecto" required="required"></textarea>
                    </li>

                    <div class="row">
                        <li>
                            <div class="col-md-2"><label>Integrantes: </label></div>
                             <div class="col-md-2"> 
                                <input style="margin-left: 24px;" type="button"  data-toggle="modal" data-target="#myModal-integrantes-proyecto" id="botones-especiales" value="Agregar/Ver Integrantes">
                            </div>
                        </li>
                    </div>

                    <!--haciendo una modal para agregar integrantes-->
                    <div class="modal fade" id="myModal-integrantes-proyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog"  style="width:960px">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                            </button>
                            <!--Agregando nuevos integrantes-->
                            <li style="margin-top: 15px;">
                                <label  style="width:inherit">Integrante: </label>
                                    <input type="text" id="integrantes-proyectos" name="integrantes-proyecto" value="" required="required"></br>
                            </li>    
                            <li>
                                <label  style="width:inherit">Tiempo dedicado: </label>
                                    <input type="text" id="tiempo-proyecto" name="tiempo-proyecto" value="" required="required">
                            </li> 
                             <button type="button" class="btn btn-primary" ng-click="buscarUsuarios()" style="background:#1A6D71"><span class="glyphicon glyphicon-plus"></span> Agregar</button> 
                          </div>
                          
                          <div class="modal-body">
                            <table  data-url="/examples/bootstrap_table/data" data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                            id="tabla-integrantes-proyectos">
                              <thead>
                                <tr><th colspan="4">INTEGRANTES DEL GRUPO</th></tr>
                                <tr>
                                  <th>Documento</th>
                                  <th colspan="2">Nombres y Apellidos</th>
                                  <th>Tiempo dedicado</th>
                                  <th></th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td>1121889765</td>
                                  <td>Pepa Pombo</td>
                                  <td></td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>1121889765</td>
                                  <td>Pepa Pombo</td>
                                  <td></td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>1121887678</td>
                                  <td>Pepito Perez Gonzalez</td>
                                  <td></td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>1121889765</td>
                                  <td>Pepa Pombo</td>
                                  <td></td>
                                  <td>
                                    <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" style="background:#1A6D71">Guardar Cambios</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--*******************************************
                    ******************-->
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

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-proyecto" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear proyecto
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