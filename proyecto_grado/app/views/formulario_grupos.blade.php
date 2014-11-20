@extends('panel_admin')


@section('css-nuevos')
    {{-- datepicker --}}
    <link rel="stylesheet" href="{{URL::to('css/')}}/datepicker.css">
@stop



@section('javascript-nuevos')
   
    <script type="text/javascript" src="{{URL::to('/js')}}/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{{URL::to('/js')}}/locales/bootstrap-datepicker.es.js"></script>
@stop




@section('javascript-nuevos2')
    <script src="{{URL::to('js/')}}/formulario_grupos_.js" type="text/javascript"></script>
    
    <script type="text/javascript">
         $('.date').datepicker()
    </script>
@stop



@section('cuerpo')
<div>  
    <form id="form-grupos" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo grupo</h2></div>
            <ul>
                <fieldset>  
                    <li><label for="nombre">Nombre del grupo:</label>

  




                        <input type="text" id="nombre" name="nombre" value="" required="required"/>
                    </li>    
                    <li><label for="coord">Coordinador:</label>
                        <input type="text" id="coord" name="coord" value="" required="required"/>
                    </li>
                    <li><label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="" required="required" />
                    </li>
                    <li><label for="pagina">P&aacute;gina web:</label>
                        <input type="text" id="pagina" name="pagina" value=""  autofocus="autofocus" />
                    </li>
                    <li><label for="telefono">Tel&eacute;fono:</label>
                        <input type="tel" id="telefono" name="telefono" value="" required="required"/>
                    </li>
                    <li><label for="direccion">Direcci&oacute;n:</label>
                        <input type="text" id="direccion" name="direccion" value="" required="required"/>
                    </li>
                    <li><label for="creacion">Año de creaci&oacute;n:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" 
                                            style="cursor:pointer"   
                                            readonly id="creacion" class="date form-control" data-format="dd/MM/yyyy" name="creacion" value="" required="required" /> 
                                            
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                    </li>
                    <li><label for="unidad">Unidad acad&eacute;mica:</label>
                        <input type="text" id="unidad" name="unidad" value="" required="required"/>
                    </li>
                    <li><label for="categoria">Categor&iacute;a:</label>
                        <input type="text" id="categoria" name="categoria" value="" required="required"/>
                    </li>
                    <li><label for="tipo">Tipo:</label> 
                        <select name="tipo">
                            <option value="inv">Investigaci&oacute;n</option>
                            <option value="estudio">Estudio</option>
                        </select>
                    </li> 
                </fieldset>
            </ul>
            
                <fieldset>                   
                    <div class="row">
                        <div class="col-md-2"><label>Integrantes: </label></div>
                        <div class="col-md-2"> 
                            <input type="button"  data-toggle="modal" data-target="#myModal" id="botones-especiales" value="Agregar/Ver Integrantes">
                        </div>
                    </div>
                    <!--haciendo una modal para agregar integrantes-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog"  style="width:960px">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                            </button>
                            <!--Agregando nuevos integrantes-->
                            <label  style="width:inherit">Integrante: </label>
                             <input type="text" id="integrantes-grupos" name="integrantes-grupos" value="" required="required"/>
                             <button type="button" class="btn btn-primary" ng-click="buscarUsuarios()" style="background:#1A6D71"><span class="glyphicon glyphicon-plus"></span> Agregar</button> 
                          </div>
                          
                          <div class="modal-body">
                            <table id="tabla-integrantes-grupos">
                              <thead>
                                <tr><th colspan="3">INTEGRANTES DEL GRUPO</th></tr>
                                <tr>
                                  <th>Documento</th>
                                  <th colspan="2">Nombres y Apellidos</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td>1121887678</td>
                                  <td>Pepito Perez Gonzalez</td>
                                  <td>
                                    <a href="#" class="button">Eliminar</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>1121889765</td>
                                  <td>Pepa Pombo</td>
                                  <td>
                                    <a href="#" class="button">Eliminar</a>
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
                    <div class="row">
                        <div class="col-md-2"><label>L&iacute;neas: </label></div>
                        <div class="col-md-2"> 
                            <input type="button"  data-toggle="modal" data-target="#myModal" id="botones-especiales" value="Agregar/Ver L&iacute;neas">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2"><label>Subl&iacute;neas </label></div>
                        <div class="col-md-2"> 
                            <input type="button"  data-toggle="modal" data-target="#myModal" id="botones-especiales" value="Agregar/Ver Subl&iacute;neas">
                        </div>
                    </div>

                </fieldset>
            </ul> 

            <ul>
                <fieldset>
                        <li><label for="objetivos">Objetivos:</label>
                        <textarea id="objetivos" name="objetivos" required="required"></textarea>
                        </li>  
                        <li><label for="gruplac">Link Gruplac: </label>
                            <input type="text" id="gruplac" name="gruplac" />
                        </li>
                        <li><label for="logog">Logo del grupo:</label>
                            <input type="file"  id="logog" name="logog"  required="required" />
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
            </ul>   
            <button id="submit-button" type="submit">
                <img alt="bien"  src="images/bn.png" width="16" height="16" />
                Crear Grupo
            </button>
            <button id="reset-button" type="reset">
                    <img alt="mal" src="images/ml.png" width="16" height="16" />
                    Borrar todo
            </button>   
    </form>    
</div>  
@stop    