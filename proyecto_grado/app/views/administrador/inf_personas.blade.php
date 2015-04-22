@extends('administrador.panel_admin')
@section('css-nuevos')
<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('cuerpo')
<fieldset id="marco-persona">

@if(isset($datos_integrantes['cedula'])==false)
    <fieldset style="margin-bottom: 2px;
            margin-top: 5px;
            padding: 2px;">
            <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para esa persona</div>   
    </fieldset>
@endif

    <div id="capa" class="infpersonas">
        <fieldset id="principal">
            <table id="encabezado-persona">
                <tbody>
                    <tr>
                        <th style="background:none;">
                            @if($datos_integrantes['foto']!="")
                                @if(isset($investigadores))
                                    <div id="foto-persona">
                                        <img align="right" src="{{URL::to('archivos_db/investigadores/')}}/{{$datos_integrantes['foto']}}">
                                    </div>   
                                @else
                                    <div id="foto-persona">
                                        <img align="right" src="http://{{$datos_integrantes['foto']}}">
                                    </div>

                                @endif     
                            @endif  
                            
                        </th> 
                        <th style="background:none;">
                            <div  class="talkbubble" id="cuadro"  style="box-shadow: 8px 8px 5px #BDBDBD;"> 
                                <h1 id="nombre-persona">
                                    {{$datos_integrantes['nombre1']}} {{$datos_integrantes['apellido1']}} {{$datos_integrantes['apellido2']}}
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
                            <th id="fil-principal">C&eacute;dula</th>
                            <td id="col-principal" id="cuadro">{{$datos_integrantes['cedula']}}</td>
                        </tr>

                        <tr>
                            <th id="fil-principal">Nombre Completo</th>
                            <td id="col-principal" id="cuadro">                                           {{$datos_integrantes['nombre1']}} {{$datos_integrantes['nombre2']}}
                                {{$datos_integrantes['apellido1']}} {{$datos_integrantes['apellido2']}}
                            </td>
                        </tr>
            
                        <tr>
                            <th id="fil-principal">Direcci&oacute;n</th>
                            <td id="col-principal" id="cuadro">{{$datos_integrantes['direccion']}}</td>
                        </tr>
            
                        <tr>
                            <th id="fil-principal">Tel&eacute;fono</th>
                            <td id="col-principal" id="cuadro">{{$datos_integrantes['telefono']}}</td>
                        </tr>
            
                        <tr>
                            <th id="fil-principal">Celular</th>
                            <td id="col-principal" id="cuadro">{{$datos_integrantes['celular']}}</td>
                        </tr>
            
                        <tr>
                            <th id="fil-principal">Email</th>
                            <td id="col-principal" id="cuadro">{{$datos_integrantes['mail']}}</td>  
                        </tr>
                    </tbody>
        	</table>
            <table class="tabla-infpersonas">      
                <thead>    
                    <tr>

                    </tr>
                </thead>

                @if(isset($investigadores))
                <tbody>
                    <tr>
                        <th id="fil-principal">CVLAC</th>
                        <td id="col-principal" id="cuadro">
                            <a href="http://{{$investigadores['link_cvlac']}}">{{$investigadores['link_cvlac']}}</a>
                        </td>
                    </tr>
                    <tr>
                        <th id="fil-principal">Profesion</th>
                        <td id="col-principal" id="cuadro">{{$investigadores['profesion']}}</td>
                    </tr>

                     <tr>
                        <th id="fil-principal">C&oacute;digo Convocatoria</th>
                        <td id="col-principal" id="cuadro">{{$investigadores['codconvocatoria']}}</td>
                    </tr>

                     <tr>
                        <th id="fil-principal">Nombre Convocatoria</th>
                        <td id="col-principal" id="cuadro">{{$investigadores['nombreconvocatoria']}}</td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Numero del contrato</th>
                        <td id="col-principal" id="cuadro">{{$investigadores['numerocontrato']}}</td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Fecha Inicio</th>
                        <td id="col-principal" id="cuadro">{{$investigadores['fecha_inicio']}}</td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Fecha Fin</th>
                        <td id="col-principal" id="cuadro">{{$investigadores['fecha_inicio']}}</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    <tr>
                        <th id="fil-principal">Edad</th>
                        <td id="col-principal" id="cuadro">{{$estudiantes['edad']}}</td>
                    </tr>
                    <tr>
                        <th id="fil-principal">Especialidad</th>
                        <td id="col-principal" id="cuadro">{{$estudiantes['especialidad']}}</td>
                    </tr>

                     <tr>
                        <th id="fil-principal">Otros Estudios</th>
                        <td id="col-principal" id="cuadro">{{$estudiantes['otrosestudios']}}</td>
                    </tr>
                </tbody>
                @endif
            </table> 
        </fieldset>		    
    </div>  
</fieldset>
@stop