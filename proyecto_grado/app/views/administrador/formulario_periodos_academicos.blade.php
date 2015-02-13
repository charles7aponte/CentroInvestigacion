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
    <script src="js/recursos/eliminar_datos.js" type="text/javascript"></script>
    <script src="{{URL::to('js/')}}/fechas_formularios.js" type="text/javascript"></script>
    
    <script type="text/javascript">
         $('.date').datepicker()
    </script>

    <script>
      URL='formularioperiodosacademicos/eliminar/';
      fila_info="#dato_periodo";
    </script>
@stop
@section('cuerpo')

<div>

    <!--Alerta de confirmar eliminacion de datos-->
<div class="modal fade bs-example-modal-lg" id="eliminar-confirmar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg"  style="width:500px;margin-left:400px;" >
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Confirmaci&oacute;n</h4>
      </div>
      <div class="modal-body">
        <p>¿Esta seguro que desea eliminarlo?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="eliminacionremota();"
        style=" border-radius: 5px; background: #1A6D71; border-color:white; color:white;">Aceptar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
    </div>
  </div>
</div>
<div> 



    <form id="form-periodos-academicos" autocomplete="on" enctype="multipart/form-data" action="{{URL::to('creacion/formularioperiodosacademicos')}}" method="post">
        
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




        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Crear un  Per&iacute;odo Ac&aacute;demico</h2></div>
            <ul>
                <fieldset> 
                    <li class="@if($errors->has('titulo-periodo')) has-error @endif">
                    <label for="titulo-periodo">Per&iacute;odo:</label>
                        <input type="text" id="titulo-periodo" name="titulo-periodo" value="{{Input::old('titulo-periodo')}}" required="required"/> 
                         @if ($errors->has('titulo-periodo')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('titulo-periodo') }}</p> @endif
                    </li>   

                   <li class="@if($errors->has('ano-periodo')) has-error @endif">
                    <label for="ano-periodo">ano:</label>
                        <input type="text" id="ano-periodo" name="ano-periodo" value="{{Input::old('ano-periodo')}}" required="required"/> 
                         @if ($errors->has('ano-periodo')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('ano-periodo') }}</p> @endif
                    </li>  
   
                    <li class="@if($errors->has('fecha-inicio')) has-error @endif">
                        <label for="fecha-inicio">Fecha Inicio:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" style="cursor:pointer"   
                                            readonly id="fecha-inicio" class="date form-control" data-format="dd/MM/yyyy" name="fecha-inicio" value="{{Input::old('fecha-inicio')}}" required="required" /> 
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div> 
                        @if ($errors->has('fecha-inicio')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('fecha-inicio') }}</p> @endif   
                    </li>

                    <li class="@if($errors->has('fecha-fin')) has-error @endif">
                        <label for="fecha-fin">Fecha Fin:</label>
                        <div class="container">
                            <div class="row">
                                <div class='col-sm-5' style="padding:0px;">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type="" style="cursor:pointer"   
                                            readonly id="fecha-fin" class="date form-control" data-format="dd/MM/yyyy" name="fecha-fin" value="{{Input::old('fecha-fin')}}" required="required" /> 
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div> 
                        @if ($errors->has('fecha-fin')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('fecha-fin') }}</p> @endif   
                    </li>

                </fieldset>
            </ul>      
     
            <table id="botones-formularios">
                <thead>
                    <th>
                        <button id="crear-periodo" type="submit" style="margin-left: 10px;">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear
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

    
     <ul> 
        <table id="tabla-periodos-academicos" style="margin-top:40px; width:950px;">
            <thead>
              <tr><th colspan="5">PERIODOS AC&aacute;DEMICOS</th></tr>
              <tr>
                <th>Nombre del periodo</th>
                <th>Ano</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                   <th></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <!--insertando en la tabla los registros-->
                @if(isset($periodos))
                        
                   @foreach ($periodos as $periodo) <!--array- que viene del controlador-->
                    <tr id="dato_periodo{{$periodo['codigo_periodo']}}">
                    <td style="width:500px;">{{$periodo['periodo']}}</td>

                    <td style="width:200px;">{{$periodo['ano']}}</td>

                    <td style="width:300px;">{{$periodo['fecha_inicio']}}</td>

                    <td style="width:300px;">{{$periodo['fecha_fin']}}</td>      

                    <td style="width:300px;">
                     <b onclick="eliminartipo({{$periodo['codigo_periodo']}})" > <a href="#" onclick="return false" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                     </b>
                    </td>

                  </tr>

                   @endforeach
                @endif
            </tbody>
          </table>
      </ul>   
</div> 
</div> 
@stop    