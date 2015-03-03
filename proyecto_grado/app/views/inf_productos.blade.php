@extends('administrador.panel_admin')

@section('css-nuevos')
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('javascript-nuevos2')

<script type="text/javascript" src="{{URL::to('/js')}}/js-infproductos.js"></script> 


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
    <div class="modal-dialog" style="width:700px">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" style="background:none;">Foto Producto</h4>
        </div>
        <div class="modal-body">
            <center>
            <table>
                <tr>
                    <td><img id="id_img_modal" style="width: 200px;
                    height: auto;" src=""></td>
                </tr>    
            </table>

        </center>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="capa" class="infproductos">
    <fieldset id="principal">

        @if(isset($productos['codigo_producto'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para este producto</div>   
            </fieldset>
        @endif

            <div id="titulo-productos" id="cuadro"> 
                <h2> {{$productos['nombre_producto']}}</h2>  
            </div>

            <table class="tabla-infproductos">
            
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
                        <th id="fil-principal">c&oacute;digo Producto</th>
                        <td id="col-principal" id="cuadro">
                             {{$productos['codigo_producto']}}
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Nombre Producto</th>
                        <td id="col-principal" id="cuadro">
                             {{$productos['nombre_producto']}}
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Observaciones Producto</th>
                        <td id="col-principal" id="cuadro">
                          {{$productos['observaciones_producto']}}  
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Fecha Producto</th>
                        <td id="col-principal" id="cuadro">

                             <?php 
                                if(isset($productos['fecha_producto']) && $productos['fecha_producto']!="")
                                {
                                    $fecha= new DateTime($productos['fecha_producto']);
                                     echo $fecha->format('M-d-Y'); 
                                }
                              ?>
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Reconocimiento Producto</th>
                        <td id="col-principal" id="cuadro">
                           {{$productos['reconocimiento_producto']}}  
                        </td>  
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Observaciones Soporte</th>
                        <td id="col-principal" id="cuadro">
                           {{$productos['observaciones_soporte']}}   
                        </td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Soporte Producto</th>
                        <td id="col-principal" id="cuadro">
                            <a style="color:blue;" href= "<?php
                                $url = ($productos['soporte_producto']);
                                echo $url_actual = "http://" .parse_url($url, PHP_URL_PATH);
                                ?>">{{$productos['soporte_producto']}}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Tipo Soporte</th>
                        <td id="col-principal" id="cuadro">
                            <a style="color:blue;" href= "<?php
                                $url = ($productos['tipo_soporte']);
                                echo $url_actual = "http://" .parse_url($url, PHP_URL_PATH);
                                ?>">{{$productos['tipo_soporte']}}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Entidad Vinculada</th>
                        <td id="col-principal" id="cuadro">
                             {{$productos['entidad']}}  
                        </td>
                    </tr>

                    <tr>
                    <th id="fil-principal">Imagen Producto</th>
                    <td id="col-principal" id="cuadro">
                      <ol>
                        <li style="list-style-type: square; text-decoration:underline;" class="glyphicon glyphicon-hand-right"><a  data-toggle="modal" data-target="#myModal" style="color:blue;" 
                             onclick="cargarModal1(this)" data-foto="<?php
                                $url = ($productos['foto_producto']);
                                echo $url_actual = URL::to('archivos_db/productos')."/".parse_url($url, PHP_URL_PATH);
                                ?>")>{{$productos['foto_producto']}}</a></li>
                      </ol>                  
                    </td>
                    </tr>
                </tbody>
            </table>
    </fieldset>

    <fieldset id="secundario1">
        <div class="titulo-tabla-producto" id="cuadro">             
            <h4 id="boton_producto"  style="width:50%;"><li class="glyphicon glyphicon-list-alt"></li><li class="glyphicon glyphicon-minus-list-alt"></li><a href="#" onclick="return false">Productividad</a></h4>
        </div>
      <div id="tabla_producto">
          <div class="list-group">
            <a href="" class="list-group-item">
             Articulos
           </a>
          </div>
      </div>
    </fieldset>
</div>
@stop