@extends('administrador.panel_admin')

@section('css-nuevos')
<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('javascript-nuevos2')

@stop

@section('cuerpo')

<div id="capa" class="infconvocatoria">
    <fieldset id="principal">


         @if(isset($convocatorias['numero_convocatoria'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para esa convocatoria</div>   
            </fieldset>
        @endif


        <div id="titulo-infconv" id="cuadro"> 
            <h2>
              @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['titulo_convocatoria']))
                {{$convocatorias['titulo_convocatoria']}}
              @endif
            </h2>
        </div>

        <table class="tabla-infconvocatorias">

            <thead>   
             <tr>
                 <tr>
                    <th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
                      background: -webkit-linear-gradient(top,#286388,#122d3e);
                      background: -moz-linear-gradient(top,#286388,#122d3e);
                      background: -o-linear-gradient(top,#286388,#122d3e);  
                      background: linear-gradient(to bottom,#286388,#122d3e);  
                      filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Informaci&oacute;n de la Convocatoria
                    </th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <th id="fil-principal">N&uacute;mero</th>
                    <td  class="numero" id="col-principal">
                        @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['numero_convocatoria']))
                           {{$convocatorias['numero_convocatoria']}}
                        @endif   
                    </td>
                </tr>

                <tr>
                    <th id="fil-principal">Estado</th>
                    <td class="estado" id="col-principal" style="text-transform:capitalize;">
                      @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['estado']))
                        {{$convocatorias['estado']}}
                      @endif
                    </td>  
                </tr>
        
                <tr>
                    <th id="fil-principal">Descripci&oacute;n</th>
                    <td class="descripcion" id="col-principal">
                      @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['descripcion_convocatoria']))
                        {{$convocatorias['descripcion_convocatoria']}}
                      @endif
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Dirigida a</th>
                    <td class="dirigida" id="col-principal" style="text-transform:capitalize;">
                      @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['convocatoria_dirigida']))
                        {{$convocatorias['convocatoria_dirigida']}}
                      @endif
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Fecha de Apertura</th>
                    <td class="fecha-apertura" id="col-principal" style="font-weight:bold;">
                      <?php 
                         if(isset($convocatorias['fecha_apertura']) && $convocatorias['fecha_apertura']!="")
                          {
                              $fecha= new DateTime($convocatorias['fecha_apertura']);
                                echo $fecha->format(' d')."/".$fecha->format('m')."/".$fecha->format('Y');
                          }
                      ?>
                    </td>  
                </tr>
        
                <tr>
                    <th id="fil-principal">Fecha de Cierre</th>
                    <td class="fecha-cierre" id="col-principal" id="cuadro" style="font-weight:bold;">
                      <?php 
                         if(isset($convocatorias['fecha_cierre']) && $convocatorias['fecha_cierre']!="")
                          {
                              setlocale(LC_TIME,"es_ES");
                              $fecha= new DateTime($convocatorias['fecha_cierre']);
                                echo strftime ($fecha->format(' d')."/".$fecha->format('m')."/".$fecha->format('Y'));
                          }
                      ?>
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Contacto de la Convocatoria</th>
                    <td class="email" id="col-principal" id="cuadro">
                      @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['email']))
                        {{$convocatorias['email']}}
                      @endif
                      </td>
                </tr>

                <tr>
                    <th id="fil-principal">Tel&eacute;fono</th>
                    <td class="telefono" id="col-principal" id="cuadro">
                      @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['telefono_contacto']))
                        {{$convocatorias['telefono_contacto']}}
                      @endif
                    </td>
                </tr>

                <tr>
                    <th id="fil-principal">P&aacute;gina Web</th>
                    <td class="pagina-conv" id="col-principal" id="cuadro" style="text-transform:lowercase;">
                      @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['descripcion_convocatoria']))
                        {{$convocatorias['descripcion_convocatoria']}}
                      @endif  
                    </td>
                </tr>

                <tr>
                    <th id="fil-principal">Documento de la Convocatoria</th>
                    <td class="documento-conv" id="col-principal" id="cuadro">
                      @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['archivo_convocatoria']))
                          <a href="{{URL::to('archivos_db/convocatorias/')}}/{{$convocatorias['archivo_convocatoria']}}" target="_blank"><i class="glyphicon glyphicon-file"></i> Archivo ({{$convocatorias['archivo_convocatoria']}})</a>
                       @endif

                    </td>
                </tr>

                <tr>
                    <th id="fil-principal">Cuant&iacute;a</th>
                    <td class="cuantia" id="col-principal" id="cuadro">
                      @if(isset($convocatorias) && $convocatorias!=null && isset($convocatorias['cuantia']))
                        $
                        <?php 
                          echo number_format($convocatorias['cuantia']);
                        ?>
                      @endif
                    </td>  
                </tr>

            </tbody>
        </table>
    </fieldset>

        <!-- tabla de proyectos-->
    <fieldset id="secundario1">
      <div class="titulo-listas" id="cuadro">             
         <h4>
            <p style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">
                  Proyectos asociados a la Convocatoria</p>
        </h4>
      </div>
      <div id="producto">
          <div class="list-group">
                <!-- aprobados -->
                <a href="{{URL::to('/')}}">
                  <li class="list-group-item">
                    <span class="badge">
                    {{$Lista_estadoproyectos["Aprobado"]}}
                    </span>
                    Aprobados
                  </li>
                </a>  
                
                <!-- rechazados -->
                <a href="{{URL::to('/')}}">
                  <li class="list-group-item">
                    <span class="badge">
                    {{$Lista_estadoproyectos["evaluacion"]}}
                    </span>
                    En Evaluaci&oacute;n
                  </li>
                </a>  
                
                <!-- Rechazados -->
                <a href="{{URL::to('/')}}">
                  <li class="list-group-item">
                    <span class="badge">
                        {{$Lista_estadoproyectos["Rechazado"]}}
                    </span>
                        Rechazados
                  </li>
                </a>  
          </div>
      </div>
    </fieldset>
</div>       
@stop