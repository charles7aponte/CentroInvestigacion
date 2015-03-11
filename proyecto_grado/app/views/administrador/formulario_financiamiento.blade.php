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

<?php 
  $valor_especie=array('efectivo','especie');
?>

<div> 

  <form id="form-financiamiento-proyectos" autocomplete="on" enctype="multipart/form-data"
 
     @if(isset($financiamiento))
        action="{{URL::to('edicion/formulariofinanciamiento')}}"
     @else
        action="{{URL::to('creacion/formulariofinanciamiento')}}"
        <?php 
         $financiamiento = null;
        ?>
     @endif 

    method="post">  

    <!-- en caso de no existir el id-->
        @if(isset($accion) && $accion=="editar")
              
            @if(!isset($financiamiento) || !$financiamiento)
                <fieldset style="margin-bottom: 2px;
                        margin-top: 5px;
                        padding: 2px;">

                        <div  style="margin: 0px;" class="alert alert-danger">No existe el Financiamiento</div> 
                </fieldset>  
            @endif    
        @endif

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


        @if(isset($financiamiento['id_financiacion']))

            <input type="hidden" name="id_financiamiento" value="{{$financiamiento['id_financiacion']}}">
        @endif

        <div id="titulo"><h2><li class="glyphicon glyphicon-pencil" style="font-size: 20px;">
           
            @if(isset($financiamiento['id_financiacion']))
              Edicion Financiamiento
            @else 
                Financiamiento del Proyecto
            @endif

        </h2></div> 
              
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
                            <span id="advertencias">
                            <p>*Ingrese el nombre del proyecto y espere a que el autocompletado lo muestre.</p>
                            </span>
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

                                @if(isset($proyectofinanciados))
                                  
                                      <tr id="integrantemodal_{{$proyectofinanciados->codigo_proyecto}}">
                                        <td><input type="hidden" data-info="{{$proyectofinanciados->codigo_proyecto}}" name="integrantes[]" value="{{$proyectofinanciados->codigo_proyecto}}">{{$proyectofinanciados->codigo_proyecto}}</td> 
                                        <td>{{$proyectofinanciados->nombre_proyecto}}</td> 
                                        <td><a href="#" onclick="eliminarFila(this)" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>   
                                      </tr>

                                 
                                @endif
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="guardar-cambios" style="background:#1A6D71">Guardar Cambios</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Modal de Verificacion de Eliminar proyectos financiados-->
                    <div>    
                       <div class="modal fade bs-example-modal-lg" id="eliminar-confirmar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
                        <div class="modal-dialog modal-lg"  style="width:500px;margin-left:400px;" >
                          <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Confirmaci&oacute;n</h4>
                            </div>
                            <div class="modal-body">
                              <p>¿Esta seguro que desea eliminarlo?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" onclick="eliminarproyectomodal();"
                              style=" border-radius: 5px; background: #1A6D71; border-color:white; color:white;">Aceptar</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                          </div><!-- /.modal-content -->
                          </div>
                        </div>
                    </div>
                    <!--..................................................... -->
                  <li><label for="fecha-financiamiento">Fecha:</label>
                      <div class="container">
                          <div class="row">
                              <div class='col-sm-5' style="padding:0px;">
                                  <div class="form-group">
                                      <div class='input-group date' id='datetimepicker2'>
                                          <input type="" style="cursor:pointer" 
                                          readonly id="fecha-financiamiento" class="date form-control" data-format="yyyy-mm-dd" name="fecha-financiamiento" value="{{Input::old('fecha-financiamiento')!=null? Input::old('fecha-financiamiento'): (isset($financiamiento['fecha'])? $financiamiento['fecha']:'')}}" required="required"/>
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
                                @if(isset($financiamiento['inv_nit_empresa']) && $empresa['nit'] == $financiamiento['inv_nit_empresa'])
                                  <option value="{{$empresa['nit']}}" selected>{{$empresa['razon_social']}}</option>
                                @else
                                  <option value="{{$empresa['nit']}}">{{$empresa['razon_social']}}</option>
                                @endif
                                @endforeach
                              @endif 
   
                      </select>    
                    </li>         

                    <li class="@if($errors->has('modo-financiada')) has-error @endif">
                      <label for="modo-financiada" >Modo de financiamiento:</label> 
                      <select  value="{{Input::old('modo-financiada')!=null? Input::old('modo-financiada'): (isset($financiamiento['modo_financiamiento'])? $financiamiento['modo_financiamiento']:'')}}" name="modo-financiada">

                        @foreach ($valor_especie as $elemento)

                            @if(isset($financiamiento['modo_financiamiento']) && $elemento==$financiamiento['modo_financiamiento'])
                                <option value="{{$elemento}}" selected>{{$elemento}}</option>
                            @else 
                                <option value="{{$elemento}}">{{$elemento}}</option>
                            @endif         
                        @endforeach
                      </select>
                          @if ($errors->has('modo-financiada')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('modo-financiada') }}</p>@endif    
                    </li> 

                    <li class="@if($errors->has('valor-financiado')) has-error @endif">
                        <label for="valor-financiado">Valor:</label> 
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input id="valor-financiado" name="valor-financiado" type="text" class="form-control" required="required" value="{{Input::old('valor-financiado')!=null? Input::old('valor-financiado'): (isset($financiamiento['valor_financiado'])? $financiamiento['valor_financiado']:'')}}" style="width: 567px;"/>
                        </div> 
                        @if ($errors->has('valor-financiado')) <p  style="margin-left: 173px;" class="help-block">{{ $errors->first('valor-financiado') }}</p>
                        @endif
                    </li>    

                    <li class="@if($errors->has('descripcion-financiamiento')) has-error @endif">
                      <label for="descripcion-financiamiento">
                      Descripci&oacute;n:</label>
                    <textarea id="descripcion-financiamiento" name="descripcion-financiamiento">{{Input::old('descripcion-financiamiento')!=null? Input::old('descripcion-financiamiento'): (isset($financiamiento['descripcion_financiamiento'])? $financiamiento['descripcion_financiamiento']:'')}}</textarea>
                      @if ($errors->has('descripcion-financiamiento')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('descripcion-financiamiento') }}</p> @endif
                    </li>   
                </fieldset> 
            </ul> 
            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="agregar-financiamiento" type="button" onclick="eliminarvisualmente()">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        @if(isset($financiamiento['id_financiacion']))
                              Editar Financiamiento
                            @else 
                                Crear Financiamiento
                        @endif 
                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="button" onclick="limpiaForm('#form-financiamiento-proyectos')" >
                        <img alt="mal" src="images/ml.png" width="16" height="16" />
                        Limpiar Formulario
                      </button>
                    </th>
                </thead>
            </table>
        </form> 
    </div>
        
@stop