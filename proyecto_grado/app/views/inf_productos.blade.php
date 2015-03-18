
@extends('administrador.panel_admin')

@section('css-nuevos')
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('javascript-nuevos2')
  

<script>
    function cargarModal1(elemento)
    {
        var $elemento = $(elemento);

        var valor= $elemento.attr("data-foto");
        $("#id_img_modal").attr("src",valor);
    }
</script>

@stop

@section('cuerpo')

<!-- modal para la foto producto-->
<div id="modal-internos">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog" style="width:auto; margin:70px;">
            <div class="modal-content">
                <div class="modal-header" style="background:#eee;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="background:none">Foto</h4>
            </div>
            <div class="modal-body">
                <center>
                    <table>
                        <tr>
                            <td>
                                <img id="id_img_modal" style="width:auto; height:auto;" src="{{URL::to('archivos_db/productos/')}}">
                            </td>
                        </tr>    
                    </table>
                </center>
            </div>
        </div>
    </div>
</div>

<div id="capa" class="infgrupos">
    <fieldset id="principal">
        @if(isset($productos['codigo_producto'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para este producto</div>   
            </fieldset>
        @endif

            <div id="titulo-productos" id="cuadro"> 
                @if(isset($productos) && $productos!=null && isset($productos['nombre_producto']))
                <h2> {{$productos['nombre_producto']}}</h2> 
                @endif 
            </div>

            <table class="tabla-infgrupos">
            
                <thead>    
                    <tr>
                        <th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
                          background: -webkit-linear-gradient(top,#286388,#122d3e);
                          background: -moz-linear-gradient(top,#286388,#122d3e);
                          background: -o-linear-gradient(top,#286388,#122d3e);  
                          background: linear-gradient(to bottom,#286388,#122d3e);  
                          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Datos B&aacute;sicos del producto
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th id="fil-principal">. </th>
                        <td id="col-principal" id="cuadro">
                            @if(isset($lista_subtipo) && $lista_subtipo!=null && isset($lista_subtipo['nombre_subtipo_producto']))
                             {{$lista_subtipo['nombre_subtipo_producto']}}
                             @endif
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Fecha </th>
                        <td id="col-principal" id="cuadro">
                              <?php 
                                if(isset($productos['fecha_producto']) && $productos['fecha_producto']!="")
                                {
                                    
                                    $fecha= new DateTime($productos['fecha_producto']);
                                     echo $fecha->format(' d')."/".$fecha->format('m')."/".$fecha->format('Y'); 
                                }
                              ?>
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Tipo </th>
                        <td id="col-principal" id="cuadro">
                            @if(isset($listatipos) && $listatipos!=null )
                             {{$listatipos}}
                            @endif 
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Grupo principal asociado</th>
                        <td id="col-principal" id="cuadro">
                            @if(isset($lista_grupos) && $lista_grupos!=null && isset($lista_grupos['nombre_grupo']))
                             {{$lista_grupos['nombre_grupo']}}
                            @endif

                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">L&iacute;nea asociada</th>
                        <td id="col-principal" id="cuadro">
                            @if(isset($lista_lineas) && $lista_lineas!=null && isset($lista_lineas['nombre_linea']))
                             {{$lista_lineas['nombre_linea']}}
                            @endif 
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Observaciones del Producto</th>
                        <td id="col-principal" id="cuadro">
                          {{$productos['observaciones_producto']}}  
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Reconocimiento del Producto</th>
                        <td id="col-principal" id="cuadro">
                           {{$productos['reconocimiento_producto']}}  
                        </td>  
                    </tr>
                    
                    <tr>
                        <th id="fil-principal">Entidad vinculada</th>
                        <td id="col-principal" id="cuadro">
                            @if(isset($lista_entidades) && $lista_entidades!=null && isset($lista_entidades['razon_social']))
                             {{$lista_entidades['razon_social']}} 
                            @endif  
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Soporte del Producto</th>
                        <td id="col-principal" id="cuadro">
                            @if($productos['soporte_producto']!="")
                                <a href="{{URL::to('archivos_db/productos/')}}/{{$productos['soporte_producto']}}" target="_blank">
                                    <i class="glyphicon glyphicon-file"></i>
                                     Archivo ({{$productos['soporte_producto']}})
                                </a>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Tipo del Soporte</th>
                        <td id="col-principal" id="cuadro">
                                {{$productos['tipo_soporte']}}
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Observaciones del Soporte</th>
                        <td id="col-principal" id="cuadro">
                           {{$productos['observaciones_soporte']}}   
                        </td>
                    </tr>

                    <tr>
                    <th id="fil-principal">Imagen Producto</th>
                    <td id="col-principal" id="cuadro">
                        @if($productos['foto_producto']!="")
                            <a  data-toggle="modal" data-target="#myModal" 
                             onclick="cargarModal1(this)" data-foto="<?php
                                $url = ($productos['foto_producto']);
                                echo $url_actual = URL::to('archivos_db/productos')."/".parse_url($url, PHP_URL_PATH);
                                ?>")>
                                    <i class="glyphicon glyphicon-picture"></i>
                                     Imagen ({{$productos['foto_producto']}})
                            </a> 
                        @endif              
                    </td>
                    </tr>
                </tbody>
            </table>
    </fieldset>
    
    <fieldset id="secundario1">
        <table id="tabla_producto" class="lista-integrantes">
        <thead>
            <tr><th colspan="5" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  
                  color:white;">
                Autores
                </th>
            </tr>
            <tr>
                <th style="border-right:none;">CEDULA</th>
                <th>NOMBRES Y APELLIDOS</th>
                <th>GRUPO</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td style="width:60px;">
                       1123445678
                    </td> 
                    <td style="text-align:left;width:500px;">
                      <a href="">Andrea de los angeles camargo aldonado</a>
                    </td> 
                    <td style="width:120px; margin-right:3px;">
                      HH
                    </td>
                </tr>
            </tbody>
        </table>      
    </fieldset> 
</div>
@stop