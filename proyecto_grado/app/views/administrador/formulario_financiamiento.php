@extends('administrador.panel_admin')

@section('cuerpo')            
    <ul>
        <fieldset style="border-color:transparent">
            <legend>FINANCIAMIENTO DEL PROYECTO</legend>
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
                <select name="tipo" required="required">
                    <option value=""></option>
                    <option value="">Colciencias</option>
                    <option value="">Universidad de los llanos</option>
                </select>
            </li>                     
            <li><label for="modo-financiada">Modo de financiamiento:</label> 
                <select name="tipo" required="required">
                    <option value=""></option>
                    <option value="">Especie</option>
                    <option value="">Efectivo</option>
                </select>
            </li> 
                <label for="valor-financiado">Valor:</label> 
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input id="valor-financiado" type="text" class="form-control" required="required">
                </div> 

            <li><label for="descripcion-financiamiento">Descripci&oacute;n:</label>
            <textarea id="descripcion-financiamiento" name="descripcion-financiamiento"></textarea>
            </li>  
        </fieldset> 
    </ul>  
@stop