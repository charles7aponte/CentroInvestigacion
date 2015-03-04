
@extends('administrador.panel_admin')

@section('css-nuevos')
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('javascript-nuevos2')
  
<script type="text/javascript" src="{{URL::to('/js')}}/js-infgrupos.js"></script>
@stop


@section('cuerpo')

<div id="capa" class="infgrupos">
    <fieldset id="principal">

         @if(isset($grupos['codigo_grupo'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para ese grupo</div>   
            </fieldset>
        @endif

            <table id="titulo-infgrupos" id="cuadro" >
                <tbody>
                   <th><h2>{{$grupos['nombre_grupo']}}</h2></th> 
                   <th>
                        @if($grupos['logo_grupo']!="")
                        <img align="right" src="{{URL::to('archivos_db/grupos/')}}/{{$grupos['logo_grupo']}}">
                        @endif
                    </th>
                </tbody>     
            </table>

            <table class="tabla-infgrupos">
            
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
                        <th id="fil-principal">A&ntilde;o de Creaci&oacute;n</th>
                        <td id="col-principal" id="cuadro">
                              <?php 
                                if(isset($grupos['ano_creacion']) && $grupos['ano_creacion']!="")
                                {
                                    $fecha= new DateTime($grupos['ano_creacion']);
                                     echo $fecha->format('M').$fecha->format(' d')." de ".$fecha->format('Y'); 
                                }
                              ?>
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Director Grupo</th>
                        <td id="col-principal" id="cuadro">
                            {{$grupos['nombre_director']}}
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Tipo: </th>
                        <td id="col-principal" id="cuadro" >
                            @if($grupos['tipo_grupo_band']==1)
                                {{$grupos['tipo_grupo_']}}
                            @else
                               <p style="color:#122d3e; font-weight:bold;">{{$grupos['tipo_grupo_']}} </p>         
                            @endif
                            
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Unidad Académica</th>
                        <td id="col-principal" id="cuadro">
                            {{$grupos['unidad_academica']}}
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Categoría</th>
                        <td id="col-principal" id="cuadro">
                            {{$grupos['categoria']}}
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Objetivos</th>
                        <td id="col-principal" id="cuadro">
                            {{$grupos['objetivos']}}
                        </td>  
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Email</th>
                        <td id="col-principal" id="cuadro">
                            {{$grupos['email']}}
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Teléfono</th>
                        <td id="col-principal" id="cuadro">
                            {{$grupos['telefono']}}
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">P&aacute;gina Web</th>
                        <td id="col-principal" id="cuadro">
                            <a style="color:blue;" href= "<?php
                                $url = ($grupos['pagina_web']);
                                echo $url_actual = "http://" .parse_url($url, PHP_URL_PATH);
                                ?>">{{$grupos['pagina_web']}}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Afiche</th>
                        <td id="col-principal" id="cuadro">
                            @if($grupos['ruta_afiche']!="")
                                <a href="{{URL::to('archivos_db/grupos/')}}/{{$grupos['ruta_afiche']}}" target="_blank"><i class="glyphicon glyphicon-picture"></i>Afiche ({{$grupos['ruta_afiche']}})
                                </a>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Archivos</th>
                        <td id="col-principal" id="cuadro">
                            @if($grupos['imagen1']!="" && $grupos['imagen2']!="")
                                <a href="{{URL::to('archivos_db/grupos/')}}/{{$grupos['imagen1']}}" target="_blank">
                                    <i class="glyphicon glyphicon-file"></i>
                                    Archivo 1 ({{$grupos['imagen1']}})
                                <p></p>
                                <a href="{{URL::to('archivos_db/grupos/')}}/{{$grupos['imagen2']}}"  target="_blank">
                                    <i class="glyphicon glyphicon-file"></i>
                                    Archivo 2 ({{$grupos['imagen2']}})
                                </a>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Direcci&oacute;n Grupo</th>
                        <td id="col-principal" id="cuadro">
                            {{$grupos['direccion_grupo']}}
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Link gruplac</th>
                        <td id="col-principal" id="cuadro">
                            <a style="color:blue;" href= "<?php
                                $url = ($grupos['link_gruplac']);
                                echo $link_actual = "http://" .parse_url($url, PHP_URL_PATH);
                                ?>">{{$grupos['link_gruplac']}}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
    </fieldset>

        <!-- menus desplegables-->
                <fieldset id="secundario1">
                <div class="titulo-listas" id="cuadro">             
                 <h4>
                    <p style=" border-radius: 5px; background: #286388;
                          background: -webkit-linear-gradient(top,#286388,#122d3e);
                          background: -moz-linear-gradient(top,#286388,#122d3e);
                          background: -o-linear-gradient(top,#286388,#122d3e);  
                          background: linear-gradient(to bottom,#286388,#122d3e);  
                          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">L&Iacute;NEAS</p>
                </h4>
                </div> 
                    <div class="list-group">

                        @if($Lineas_grupos && count($Lineas_grupos)>0)
                            @foreach($Lineas_grupos as $Linea_grupo)
                              <a href="{{URL::to('/')}}/linea/id/{{$Linea_grupo->id_lineas}}" class="list-group-item">
                                {{$Linea_grupo->nombre_linea}}
                              </a>
                            @endforeach  

                        @else 
                        <p style="margin-left:5px; color:#122d3e; font-weight:bold; font-size: 13px;">
                            No hay L&iacute;neas asociadas a este grupo.</p>
                        @endif    
                    </div>

                <!--PROYECTOS-->
                <div class="titulo-listas" id="cuadro">             
                 <h4>
                    <p style=" border-radius: 5px; background: #286388;
                          background: -webkit-linear-gradient(top,#286388,#122d3e);
                          background: -moz-linear-gradient(top,#286388,#122d3e);
                          background: -o-linear-gradient(top,#286388,#122d3e);  
                          background: linear-gradient(to bottom,#286388,#122d3e);  
                          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">PROYECTOS</p>
                </h4>
                </div> 
                    <div class="list-group">
                            <a href="{{URL::to('/')}}/listaproyectosgrupos/grupo/{{$grupos['codigo_grupo']}}" class="list-group-item">
                                <span class="badge" id="total">
                                        {{$Lista_proyectos}}
                                </span>
                                Total Proyectos
                            </a>
                    </div>
                </fieldset> 


                <fieldset id="secundario1">
                    <div class="titulo-listas" id="cuadro">
                     <h4 id="boton_integrantes" style= "width:50%;"><li  style="margin-left:3px;" class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Integrantes</a></h4>
                    </div>
                        <div id="lista_integrantes" class="lista-integrantes">


                            <ul class="list-group">
                                <a href="{{URL::to('/')}}/listaintegrantesgrupos/grupo/{{$grupos['codigo_grupo']}}/perfil/{{$Lista_perfiles["Docente"]}}">  
                                    <li class="list-group-item">
                                    <span class="badge" id="total">
                                    {{$Lista_integrantes["Docente"]}}
                                    </span>
                                    Docentes
                                  </li>
                                </a>

                                <a href="{{URL::to('/')}}/listaintegrantesgrupos/grupo/{{$grupos['codigo_grupo']}}/perfil/{{$Lista_perfiles["Estudiante"]}}">
                                  <li class="list-group-item">
                                    <span class="badge" id="total">
                                    {{$Lista_integrantes["Estudiante"]}}
                                    </span>
                                    Estudiantes
                                  </li>
                                </a>
                                
                                <a href="{{URL::to('/')}}/listaintegrantesgrupos/grupo/{{$grupos['codigo_grupo']}}/perfil/{{$Lista_perfiles["Joven Investigador"]}}">
                                  <li class="list-group-item">
                                    <span class="badge" id="total"> 
                                    {{$Lista_integrantes["Joven Investigador"]}}
                                    </span>
                                    J&oacute;venes Investigadores
                                  </li>
                                </a>
                                
                                <a href="{{URL::to('/')}}/listaintegrantesgrupos/grupo/{{$grupos['codigo_grupo']}}/perfil/{{$Lista_perfiles["Investigador Externo"]}}"> 
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
                     <h4 id="boton_productos" style= "width:50%;"><li  style="margin-left:3px;" class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Productos</a></h4>
                    </div>
                        <div id="lista_productos" class="lista_productos">
                            <ul class="list-group">
                            @foreach($Lista_productos as $lista_producto)   
                                <a href="{{URL::to('/')}}/listaproductosgrupos/grupo/{{$grupos['codigo_grupo']}}/subtipoproducto/{{$lista_producto['id_subtipo_producto']}}">
                                  <li class="list-group-item">
                                    <span class="badge">
                                        {{$lista_producto['total']}}
                                    </span>
                                    {{$lista_producto['nombre_subtipo_producto']}}
                                  </li>
                                </a>  
                            @endforeach  
                            </ul>
                        </div>
                </fieldset>
            </div>  
    </div>  
</div>
@stop