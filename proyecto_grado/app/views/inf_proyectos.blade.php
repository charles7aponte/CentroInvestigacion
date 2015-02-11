@extends('administrador.panel_admin')

@section('css-nuevos')
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('javascript-nuevos2')
 
<!--<script type="text/javascript" src="{{URL::to('/js')}}/js-infgrupos.js"></script>-->

@stop


@section('cuerpo')


<div id="capa" class="infproyectos">
    <fieldset id="principal">

        @if(isset($proyectos['codigo_proyecto'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para este proyecto</div>   
            </fieldset>
        @endif

            <div id="titulo-proyectos" id="cuadro"> 
                <h2>{{$proyectos['nombre_proyecto']}}</h2> 
            </div>

            <table class="tabla-infproyectos">
        
                <thead>    
                    <tr>
                        <th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
                          background: -webkit-linear-gradient(top,#286388,#122d3e);
                          background: -moz-linear-gradient(top,#286388,#122d3e);
                          background: -o-linear-gradient(top,#286388,#122d3e);  
                          background: linear-gradient(to bottom,#286388,#122d3e);  
                          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Datos B&aacute;sicos
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <th id="fil-principal">c&oacute;digo Proyecto</th>
                        <td id="col-principal" id="cuadro">
                            {{$proyectos['codigo_proyecto']}}
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Nombre Proyecto</th>
                        <td id="col-principal" id="cuadro">
                            {{$proyectos['nombre_proyecto']}}
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Fecha Proyecto</th>
                        <td id="col-principal" id="cuadro">
                         <?php 
                                if(isset($proyectos['fecha_proyecto']) && $proyectos['fecha_proyecto']!="")
                                {
                                    $fecha= new DateTime($proyectos['fecha_proyecto']);
                                     echo $fecha->format('M-d-Y'); 
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
                        <th id="fil-principal">Estado Proyecto</th>
                        <td id="col-principal" id="cuadro">
                         {{$proyectos['estado_proyecto']}}
                        </td>  
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Archivo Propuesta</th>
                        <td id="col-principal" id="cuadro">
                             <a style="color:blue;" href= "<?php
                                $url = ($proyectos['archivo_propuesta']);
                                echo $url_actual = "http://" .parse_url($url, PHP_URL_PATH);
                                ?>">{{$proyectos['archivo_propuesta']}}
                            </a>
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Archivo Acta Inicio</th>
                        <td id="col-principal" id="cuadro">
                           <a style="color:blue;" href= "<?php
                                $url = ($proyectos['archivo_actainicio']);
                                echo $url_actual = "http://" .parse_url($url, PHP_URL_PATH);
                                ?>">{{$proyectos['archivo_actainicio']}}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Informe Final</th>
                        <td id="col-principal" id="cuadro">
                            <a style="color:blue;" href= "<?php
                                $url = ($proyectos['informe_final']);
                                echo $url_actual = "http://" .parse_url($url, PHP_URL_PATH);
                                ?>">{{$proyectos['informe_final']}}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Grupo Auxiliar</th>
                        <td id="col-principal" id="cuadro">  
                            {{$proyectos['grupo_auxiliar']}}
                        </td>
                    </tr>
                </tbody>
            </table>

    </fieldset>
</div>
@stop