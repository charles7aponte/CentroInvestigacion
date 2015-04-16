@extends('administrador.panel_admin')

@section('css-nuevos')
<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />

@section('cuerpo')
<fieldset id="marco-persona">
        @if(isset($info_eventos['id_evento'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n</div>   
            </fieldset>
        @endif

    <div id="capa" class="infeventos">
        <fieldset id="principal">
            <table id="encabezado-persona">
                <tbody>
                @if(isset($info_eventos) && $info_eventos!=null && isset($info_eventos['titulo_evento']))
                    <tr>
                        <th style="background:none;">
                            <h3 id="titulo-evento">
                                {{$info_eventos['titulo_evento']}}
                            </h3>  
                        </th> 
                    </tr>
                @endif    
                </tbody>
            </table>
                                <div id="fecha-evento-noticia" style="text-align:right;"><p>{{InvEventosNoticias::formato_fecha($info_eventos['fecha'])}}</p>
                    </div>

            <table class="tabla-infgrupos">
                <tbody>
                @if(isset($info_eventos) && $info_eventos!=null && isset($info_eventos['tipo']))  
                    <tr>
                        <th id="fil-principal">Tipo</th>
                        <td id="col-principal" id="cuadro">
                            <b>{{$info_eventos['tipo']}}</b>
                        </td>
                    </tr>
                @endif    
                @if(isset($info_eventos) && $info_eventos!=null && isset($info_eventos['descripcion']))
                    <tr>
                        <th id="fil-principal">Descripción</th>
                        <td id="col-principal" id="cuadro" style="text-align: justify;">
                            {{$info_eventos['descripcion']}}
                        </td>
                    </tr>
                @endif

                @if(isset($info_eventos) && $info_eventos!=null && isset($info_eventos['enlace_documento']))
                    <tr>
                        <th id="fil-principal">Documento</th>
                        <td id="col-principal" id="cuadro" style="text-transform:capitalize;">
                            @if($info_eventos['enlace_documento']!="")
                                <a href="{{URL::to('archivos_db/eventosnoticias/')}}/{{$info_eventos['enlace_documento']}}" target="_blank"><i class="glyphicon glyphicon-file"></i>Dcto({{$info_eventos['enlace_documento']}})
                                </a>
                            @endif
                        </td>
                    </tr>
                @endif    
                </tbody>
            </table>
        </fieldset>		    
    </div>  
</fieldset>
@stop