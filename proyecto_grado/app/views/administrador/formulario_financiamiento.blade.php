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
    <script src="{{URL::to('js/')}}/recursos/formulariofinanciamiento.js" type="text/javascript"></script>
@stop
@section('cuerpo') 

<div>  
    <form id="form-financiamiento-proyectos" autocomplete="on"   action="{{URL::to('creacion/formulariofinanciamiento')}}" method="post">
        @if(Session::has('mensaje_error') || Session::has('mensaje_success'))
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                @if(Session::has('mensaje_success'))    
                    <div style="margin: 0px;" class="alert alert-success">{{Session::get('mensaje_success')}}</div>
                @endif

                @if(Session::has('mensaje_error'))
                    <div  style="margin: 0px;" class="alert alert-danger">{{ Session::get('mensaje_error')}}</div>   
                @endif 
            </fieldset>
        @endif



        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Financiamiento del proyecto</h2></div>           
            <ul>
                <fieldset style="border-color:transparent">

                    <div class="row">
                        <div class="col-md-2" style="margin-left:6px;"><label>Proyecto: </label></div>
                         <div class="col-md-2"> 
                            <input type="button"  data-toggle="modal" data-target="#myModal-proyectos-financiados" id="botones-especiales" style="margin-left:28px; margin-bottom:18px;" value="Seleccionar Proyecto">
                        </div>
                    </div>
                    <!--haciendo una modal para agregar integrantes-->
                    <div class="modal fade" id="myModal-proyectos-financiados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog"  style="width:960px">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                            </button>
                            <!--Agregando nuevos integrantes-->
                            <label  style="width:inherit">Proyecto: </label>
                             <input type="text" id="proyecto-financiado"  value="" style="width:500px;"/>
                             <button type="button" class="btn btn-primary"  
                                id="bton_proyecto-financiado"
                              style="background:#1A6D71; display:none;"><span class="glyphicon glyphicon-plus"></span> Seleccionar</button> 
                          </div>
                          
                          <div class="modal-body">
                            <table  data-url="/examples/bootstrap_table/data" data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                            id="tabla-proyecto-financiado">
                              <thead>
                                <tr><th colspan="4">PROYECTO SELECCIONADO</th></tr>
                                <tr>
                                  <th colspan="2"></th>
                                </tr>
                              </thead>

                              <tbody>

                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="guardar-cambios" style="background:#1A6D71">Guardar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <li><label for="fecha-financiamiento">Fecha:</label>
                      <div class="container">
                          <div class="row">
                              <div class='col-sm-5' style="padding:0px;">
                                  <div class="form-group">
                                      <div class='input-group date' id='datetimepicker2'>
                                          <input type="" style="cursor:pointer" 
                                          readonly id="fecha-financiamiento" class="date form-control" data-format="dd/MM/yyyy" name="fecha-financiamiento" 
                                          value="{{Input::old('fecha-financiamiento')}}" required="required" />
                                           @if ($errors->has('fecha-financiamiento')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('fecha-financiamiento') }}</p> @endif
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
                              @if(isset($empresas))
                                @foreach($empresas as $empresa)
                                    <option value="{{$empresa['nit']}}" > {{$empresa['razon_social']}}</option>
                                @endforeach
                              @endif    
                        </select>    
                    </li>         

                    <li class="@if($errors->has('modo-financiada')) has-error @endif">
                      <label for="modo-financiada" >Modo de financiamiento:</label> 
                      <select  value="{{Input::old('modo-financiada')}}" name="modo-financiada">
                        <option id="efectivo">Efectivo</option>
                        <option id="especie">Especie</option>
                      </select>
                          @if ($errors->has('modo-financiada')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('modo-financiada') }}</p>
                          @endif    
                    </li> 

                    <li class="@if($errors->has('valor-financiado')) has-error @endif">
                        <label for="valor-financiado">Valor:</label> 
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input id="valor-financiado" name="valor-financiado" type="text" class="form-control" required="required" value="{{Input::old('valor-financiado')}}" style="width: 567px;"/>
                        </div> 
                        @if ($errors->has('valor-financiado')) <p  style="margin-left: 173px;" class="help-block">{{ $errors->first('valor-financiado') }}</p>
                        @endif
                    </li>    

                    <li class="@if($errors->has('descripcion-financiamiento')) has-error @endif">
                      <label for="descripcion-financiamiento">
                      Descripci&oacute;n:</label>
                    <textarea id="descripcion-financiamiento" name="descripcion-financiamiento" value="{{Input::old('descripcion-financiamiento')}}"></textarea>
                      @if ($errors->has('descripcion-financiamiento')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('descripcion-financiamiento') }}</p> @endif
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
        </form> 
    </div>
        
@stop