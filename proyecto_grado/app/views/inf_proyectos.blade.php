@extends('administrador.panel_admin')

@section('css-nuevos')
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('javascript-nuevos2')
 
<script type="text/javascript" src="{{URL::to('/js')}}/js-infproyectos.js"></script>
<script src="{{URL::to('/js')}}/recursos/eliminar_datos.js" type="text/javascript"></script>

@stop


@section('cuerpo')


<div id="capa" class="infproyectos">

    <!--Modal de ver descripcion-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel" style="background:none;"><b>Descripci&oacute;n</b></h4>
            </div>
            <div class="modal-body">
              <div id="contenido_modal">
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>


    <fieldset id="principal">
        @if(isset($proyectos['codigo_proyecto'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para este proyecto</div>   
            </fieldset>
        @endif

        @if($proyectos)

            <div id="titulo-proyectos" id="cuadro"> 
                @if(isset($proyectos) && $proyectos!=null && isset($proyectos['nombre_proyecto']))
                <h2>{{$proyectos['nombre_proyecto']}}</h2>
                @endif 
            </div>

            <table class="tabla-infproyectos">
        
                <thead>    
                    <tr>
                        <th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
                          background: -webkit-linear-gradient(top,#286388,#122d3e);
                          background: -moz-linear-gradient(top,#286388,#122d3e);
                          background: -o-linear-gradient(top,#286388,#122d3e);  
                          background: linear-gradient(to bottom,#286388,#122d3e);  
                          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Datos Básicos del proyecto
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <th id="fil-principal">Código del Proyecto</th>
                        <td id="col-principal" id="cuadro">
                            {{$proyectos['codigo_proyecto']}}
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Estado</th>
                        <td id="col-principal" id="cuadro" style="text-transform:capitalize;">
                         {{$proyectos['estado_proyecto']}}
                        </td>  
                    </tr>
                    
                    <tr>
                        <th id="fil-principal">Convocatoria</th>
                        <td id="col-principal" id="cuadro">
                            <a href="{{URL::to('/')}}/convocatoria/id/{{$convocatorias->numero_convocatoria}}">
                                {{$convocatorias['titulo_convocatoria']}}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Fecha del Proyecto</th>
                        <td id="col-principal" id="cuadro">
                         <?php 
                                if(isset($proyectos['fecha_proyecto']) && $proyectos['fecha_proyecto']!="")
                                {
                                    $fecha= new DateTime($proyectos['fecha_proyecto']);
                                    echo $fecha->format(' d')."/".$fecha->format('m')."/".$fecha->format('Y');
                                }
                              ?>  
                        </td>
                    </tr>
                    
                    <tr>
                        <th id="fil-principal">Objetivo General</th>
                        <td id="col-principal" id="cuadro">
                            {{$proyectos['objetivo_general']}}
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Grupo Asociado</th>
                        <td id="col-principal" id="cuadro">
                            <a href="{{URL::to('/')}}/grupo/id/{{$grupos->codigo_grupo}}">
                                {{$grupos['nombre_grupo']}}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Grupo de apoyo</th>
                        <td id="col-principal" id="cuadro"> 
                            <a href="{{URL::to('/')}}/grupo/id/{{$grupos_auxiliares->codigo_grupo}}"> 
                                {{$grupos_auxiliares['nombre_grupo']}}
                            </a>    
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Línea asociada</th>
                        <td id="col-principal" id="cuadro">
                            <a href="{{URL::to('/')}}/linea/id/{{$lineas->id_lineas}}">
                                {{$lineas['nombre_linea']}}
                            </a>   
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Archivo Propuesta</th>
                        <td id="col-principal" id="cuadro">
                            @if($proyectos['archivo_propuesta']!="")
                                <a href="{{URL::to('archivos_db/proyectos/')}}/{{$proyectos['archivo_propuesta']}}" target="_blank">
                                    <i class="glyphicon glyphicon-file"></i>
                                    Archivo  ({{$proyectos['archivo_propuesta']}})
                                <p></p>

                            @endif
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Archivo Acta Inicio</th>
                        <td id="col-principal" id="cuadro">
                            @if($proyectos['archivo_actainicio']!="")
                                <a href="{{URL::to('archivos_db/proyectos/')}}/{{$proyectos['archivo_actainicio']}}" target="_blank">
                                    <i class="glyphicon glyphicon-file"></i>
                                    Archivo  ({{$proyectos['archivo_actainicio']}})
                                <p></p>

                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Informe Final</th>
                        <td id="col-principal" id="cuadro">
                            @if($proyectos['informe_final']!="")
                                <a href="{{URL::to('archivos_db/proyectos/')}}/{{$proyectos['informe_final']}}" target="_blank">
                                    <i class="glyphicon glyphicon-file"></i>
                                    Archivo  ({{$proyectos['informe_final']}})
                                <p></p>

                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
    </fieldset>               

<!--Listas desplegables-->
    <fieldset id="secundario1">

            <div class="titulo-listas" id="cuadro">
                 <h4>
                    <p style=" border-radius: 5px; background: #286388;
                          background: -webkit-linear-gradient(top,#286388,#122d3e);
                          background: -moz-linear-gradient(top,#286388,#122d3e);
                          background: -o-linear-gradient(top,#286388,#122d3e);  
                          background: linear-gradient(to bottom,#286388,#122d3e);  
                          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">AUTORES</p>
                </h4>
            </div>   
            <div id="lista_integrantes" class="lista-integrantes">
                <ul class="list-group">
                    <a href="{{URL::to('/')}}/listaintegrantesproyectos/proyecto/{{$proyectos['codigo_proyecto']}}/perfil/{{$Lista_perfiles["Docente"]}}">  
                        <li class="list-group-item">
                        <span class="badge" id="total">
                        {{$Lista_integrantes["Docente"]}}
                        </span>
                        Docentes
                      </li>
                    </a>

                    <a href="{{URL::to('/')}}/listaintegrantesproyectos/proyecto/{{$proyectos['codigo_proyecto']}}/perfil/{{$Lista_perfiles["Estudiante"]}}">
                      <li class="list-group-item">
                        <span class="badge" id="total">
                        {{$Lista_integrantes["Estudiante"]}}
                        </span>
                        Estudiantes
                      </li>
                    </a>
                    
                    <a href="{{URL::to('/')}}/listaintegrantesproyectos/proyecto/{{$proyectos['codigo_proyecto']}}/perfil/{{$Lista_perfiles["Joven Investigador"]}}">
                      <li class="list-group-item">
                        <span class="badge" id="total"> 
                        {{$Lista_integrantes["Joven Investigador"]}}
                        </span>
                        J&oacute;venes Investigadores
                      </li>
                    </a>
                    
                    <a href="{{URL::to('/')}}/listaintegrantesproyectos/proyecto/{{$proyectos['codigo_proyecto']}}/perfil/{{$Lista_perfiles["Investigador Externo"]}}"> 
                      <li class="list-group-item">
                        <span class="badge" id="total">
                        {{$Lista_integrantes["Investigador Externo"]}}
                        </span>
                        Investigadores Externos
                      </li>
                    </a>   
                </ul>
            </div>
    </fieldset>

    <fieldset id="secundario1">
        <div class="titulo-listas" id="cuadro">
            <h4 id="boton_proyectos" style= "width:50%;"><li  style="margin-left:3px;" class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Financiamiento</a>
            </h4>
        </div>
        <div id="lista_financiamiento" class="lista-financiamiento">
          
          @if(count($financiamiento)==0)
              <li class="list-group-item">
                <b>No hay financiamiento asociado al proyecto</b>
              </li> 

        @else
        <table id="tabla-listafinanciamiento-proyectos" style="margin-top:40px; margin-left:30px;  width:950px;">
            <thead>
                <tr><th colspan="5"></th>
                </tr>
                <tr>
                    <th style="width:150px;">Fecha</th>
                    <th style="">Entidad</th>
                    <th style="width:150px;">Modo</th>
                    <th style="width:170px;">Valor</th>
                    <th style="width:120px; text-align:center;">Descripción</th>
                </tr>
            </thead>


            <?php
                $total=0;
            ?>
            <tbody id="cuerpo_tabla_finaciamiento">
                @foreach($financiamiento as $financimiento1) 
                <tr>
                    <td>{{$financimiento1->fecha}}</td>
                    <td>{{$financimiento1->razon_social}}</td>
                    <td style="margin-left:20px;">{{$financimiento1->modo_financiamiento}}</td>
                    <td>$ {{number_format($financimiento1->valor_financiado)}}</td>
                    <td style="text-align:center; width:120px;">    
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"data-target="#myModal" 
                         data-info="{{$financimiento1->descripcion_financiamiento}}"
                         onclick="cargarmodal_descripcion(this);"
                         style="height:30px; width:120px; background:#E3E7E5;border-color:#E3E7E5; margin-right:15px; font-size:12px; color:#333;" >
                         Ver descripci&oacute;n
                        </button>                  
                    </td>
                </tr>
                <?php
                    $total+=(double)$financimiento1->valor_financiado;
                ?>
             @endforeach 
             <tr>
                 <td></td>
                 <td></td>
                 <td style="margin-left:20px;"></td>
                 <td style="font-weight:bold;">$ {{number_format($total)}}</td>
                 <td style="text-align:center; width:120px;"></td>
             </tr>   
            </tbody>
        </table>
         @endif
        @endif
    </fieldset>

</div>
@stop