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
    <form id="form-financiamiento-proyectos" autocomplete="on"   action="" method="">
        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Financiamiento del proyecto</h2></div>           
            <ul>
                <fieldset style="border-color:transparent">
                <li><label for="proyecto-finananciar">Proyecto: </label>
                    <input  type="text" id="proyecto-finananciar" name="proyecto-finananciar" required="required">
                </li>
                <li><label for="fecha-financiamiento">Fecha:</label>
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
                    <th id="borrar">
                        <button id="reset-button" type="reset">
                        <img alt="mal" src="images/ml.png" width="16" height="16" />
                        Borrar campos
                      </button>
                    </th>
                </thead>
            </table>

            <ul>
                <table id="tabla-financiamiento-grupos" style="margin-top:40px; margin-left:40px; border-right:none; width:950px;">
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
                      <td style="width:60px;">01/03/2014</td>
                      <td style="width:400px; margin-right:5px;">Universidad de los llanos de villavicencio jajajaS jjjjjjjjjj</td>
                      <td style="width:100px; margin-rigth:5px;">efectivo</td>
                      <td style="width:90px; margin-left:5px;">$ 3.000.000</td>
                      <td style="width:120px;">                      
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"
                         style="height:30px; width:120px; background:#E3E7E5;border-color:#E3E7E5; margin-right:15px; font-size:12px; color:#333;">
                         Ver descripci&oacute;n
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" style="background:none;"><b>Descripci&oacute;n</b></h4>
                              </div>
                              <div class="modal-body">

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                      <td style="width:100px;">
                        <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </ul>

        </form> 

    </div>
        
@stop