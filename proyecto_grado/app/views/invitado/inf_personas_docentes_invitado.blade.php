@extends('panel_cuerpo')

@section('css-nuevos')
<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />

@section('contenido-principal')
<fieldset id="marco-persona">
        @if(isset($docente['cedula'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para ese docente</div>   
            </fieldset>
        @endif

    <div id="capa" class="infpersonas">
        <fieldset id="principal">
            <table id="encabezado-persona">
                <tbody>
                    <tr>
                        @if(isset($datos_integrantes['foto']) && $datos_integrantes['foto']!="")
                            <th style="background:none;">
                                <div id="foto-persona">
                                    <img align="right" src="{{URL::to('archivos_db/docentes')}}/{{$datos_integrantes['foto']}}">
                                </div>  
                            </th> 
                        @endif
                        <th style="background:none;">
                            <div  class="talkbubble" id="cuadro"  style="box-shadow: 8px 8px 5px #BDBDBD;"> 
                                <h1 id="nombre-persona">
                                {{$datos_integrantes['nombre1']}} 
                                {{$datos_integrantes['apellido1']}} 
                                {{$datos_integrantes['apellido2']}}  
                                </h1>  
                            </div>  
                        </th> 
                    </tr>
                </tbody>
            </table>

    		<table class="tabla-infpersonas">
                    <thead>    
                        <tr>
                            <th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
                              background: -webkit-linear-gradient(top,#286388,#122d3e);
                              background: -moz-linear-gradient(top,#286388,#122d3e);
                              background: -o-linear-gradient(top,#286388,#122d3e);  
                              background: linear-gradient(to bottom,#286388,#122d3e);  
                              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Informaci&oacute;n Basica</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <th id="fil-principal">Nombre Completo</th>
                            <td id="col-principal" id="cuadro">                      
                                {{$datos_integrantes['nombre1']}} 
                                {{$datos_integrantes['nombre2']}} 
                                {{$datos_integrantes['apellido1']}} 
                                {{$datos_integrantes['apellido2']}}
                            </td>
                        </tr>
        
                        <tr>
                            <th id="fil-principal">Email</th>
                            <td id="col-principal" id="cuadro">
                                {{$datos_integrantes['mail']}}
                            </td>  
                        </tr>

                        <tr>
                            <th id="fil-principal">CVLAC</th>
                            <td id="col-principal" id="cuadro">
                                @if(isset($docente['cvlac']) && $docente['cvlac']!="")
                                <a style="color:blue;" href="http://{{$docente['cvlac']}}">
                                    {{$docente['cvlac']}}</td>
                                </a> 
                                @endif   
                            <td>
                        </tr>
                    </tbody>
        	</table> 

            @if(isset($docente['pregrado1']) && $docente['pregrado1']!="")
                <table class="tabla-infpersonas"> 
                    <thead style=" border-radius: 5px; background: #286388;
                                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                                  background: -moz-linear-gradient(top,#286388,#122d3e);
                                  background: -o-linear-gradient(top,#286388,#122d3e);  
                                  background: linear-gradient(to bottom,#286388,#122d3e);  
                                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">    
                        <tr>
                            <th>PREGRADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th id="fil-principal">Título</th>
                            <td id="col-principal" id="cuadro">
                                {{$docente['pregrado1']}} 
                            </td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Universidad</th>
                            <td id="col-principal" id="cuadro">
                              {{isset($docente['nombre_univ_preg1'])?$docente['nombre_univ_preg1']:''}}
              
                                
                            </td>
                        </tr>

                         <tr>
                            <th id="fil-principal">Año de graduación</th>
                            <td id="col-principal" id="cuadro">
                                <?php 
                                    if(isset($docente['ano_preg1']) && $docente['ano_preg1']!="")
                                    {
                                        $fecha= new DateTime($docente['ano_preg1']);
                                          echo $fecha->format(' d')."/".$fecha->format('m')."/".$fecha->format('Y');
                                    }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>   
            @endif    
            
            @if(isset($docente['pregrado2']) && $docente['pregrado2']!="")
                <table class="tabla-infpersonas"> 
                    <thead style=" border-radius: 5px; background: #286388;
                                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                                  background: -moz-linear-gradient(top,#286388,#122d3e);
                                  background: -o-linear-gradient(top,#286388,#122d3e);  
                                  background: linear-gradient(to bottom,#286388,#122d3e);  
                                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">    
                        <tr>
                            <th>PREGRADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th id="fil-principal">Título</th>
                            <td id="col-principal" id="cuadro">
                                {{$docente['pregrado2']}} 
                            </td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Universidad</th>
                            <td id="col-principal" id="cuadro">
                              {{isset($docente['nombre_univ_preg2'])?$docente['nombre_univ_preg2']:''}}
              
                                
                            </td>
                        </tr>

                         <tr>
                            <th id="fil-principal">Año de graduación</th>
                            <td id="col-principal" id="cuadro">
                                <?php 
                                    if(isset($docente['ano_preg2']) && $docente['ano_preg2']!="")
                                    {
                                        $fecha= new DateTime($docente['ano_preg2']);
                                          echo $fecha->format(' d')."/".$fecha->format('m')."/".$fecha->format('Y');
                                    }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            @endif   
                
            @if(isset($docente['postgrado1']) && $docente['postgrado1']!="")   
                <table class="tabla-infpersonas"> 
                    <thead style=" border-radius: 5px; background: #286388;
                                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                                  background: -moz-linear-gradient(top,#286388,#122d3e);
                                  background: -o-linear-gradient(top,#286388,#122d3e);  
                                  background: linear-gradient(to bottom,#286388,#122d3e);  
                                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">    
                        <tr>
                            <th>POSTGRADO</th>
                             <div style="border-bottom:2px solid #eee; margin:0; padding:1px;;"></div>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th id="fil-principal">Titulo</th>
                            <td id="col-principal" id="cuadro">{{$docente['postgrado1']}}</td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Universidad</th>
                            <td id="col-principal">{{$docente['nombre_univ_post1']}}</td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Año de graduación</th>
                            <td id="col-principal">{{$docente['ano_post1']}}</td>
                        </tr>
                    </tbody>
                </table>
            @endif 

            @if(isset($docente['postgrado2']) && $docente['postgrado2']!="")  
                <table class="tabla-infpersonas"> 
                    <thead style=" border-radius: 5px; background: #286388;
                                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                                  background: -moz-linear-gradient(top,#286388,#122d3e);
                                  background: -o-linear-gradient(top,#286388,#122d3e);  
                                  background: linear-gradient(to bottom,#286388,#122d3e);  
                                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">    
                        <tr>
                            <th>POSTGRADO</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th id="fil-principal">Titulo</th>
                            <td id="col-principal" id="cuadro">{{$docente['postgrado2']}}</td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Universidad</th>
                            <td id="col-principal">{{$docente['nombre_univ_post2']}}</td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Año de graduación</th>
                            <td id="col-principal">{{$docente['ano_post2']}}</td>
                        </tr>
                    </tbody>
                </table> 
            @endif    
            
            @if(isset($docente['postgrado3']) && $docente['postgrado3']!="")  
                <table class="tabla-infpersonas"> 
                    <thead style=" border-radius: 5px; background: #286388;
                                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                                  background: -moz-linear-gradient(top,#286388,#122d3e);
                                  background: -o-linear-gradient(top,#286388,#122d3e);  
                                  background: linear-gradient(to bottom,#286388,#122d3e);  
                                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">    
                        <tr>
                            <th>POSTGRADO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <tr>
                            <th id="fil-principal">Titulo</th>
                            <td id="col-principal" id="cuadro">{{$docente['postgrado3']}}</td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Universidad</th>
                            <td id="col-principal">{{$docente['nombre_univ_post3']}}</td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Año de graduación</th>
                            <td id="col-principal">{{$docente['ano_post3']}}</td>
                        </tr>
                    </tbody>
                    </tbody>
                </table> 
            @endif

            @if(isset($docente['perfil_corto']) && $docente['perfil_corto']!="")
                <table class="tabla-infpersonas">
                    <thead style=" border-radius: 5px; background: #286388;
                                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                                  background: -moz-linear-gradient(top,#286388,#122d3e);
                                  background: -o-linear-gradient(top,#286388,#122d3e);  
                                  background: linear-gradient(to bottom,#286388,#122d3e);  
                                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">
                        <tr>
                            <th>PERFÍL CORTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th id="col-principal">{{$docente['perfil_corto']}}</th>
                        </tr>
                    </tbody>
                </table>
            @endif
        </fieldset>		    
    </div>  
</fieldset>
@stop