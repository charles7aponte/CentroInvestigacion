@extends('administrador.panel_admin')

@section('css-nuevos')
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('javascript-nuevos2')
  
<script type="text/javascript" src="{{URL::to('/js')}}/js-infgrupos.js"></script>
@stop


@section('cuerpo')

<div id="capa" class="infproductos">
    <fieldset id="principal">
            <div id="titulo-productos" id="cuadro"> 
                <h2>Nombre del Producto de la universidad de los llanos del centro de investigaciones</h2>
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
                        <td id="col-principal" id="cuadro">31 de nov 2011</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Nombre Producto</th>
                        <td id="col-principal" id="cuadro">Felipe Corredor</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Observaciones Producto</th>
                        <td id="col-principal" id="cuadro">Facultad de ciencias basicas e ingenieria</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Fecha Producto</th>
                        <td id="col-principal" id="cuadro">D</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Reconocimiento Producto</th>
                        <td id="col-principal" id="cuadro">grupo horientado a la aplicaciones libresffffffffffffff rffffffffffffffffffffffff ffffffffffffff ddddddddddddddd ssssssssssssss ssssssssss dddddddddddddddddddddddddddd sssssssssssssssssss</td>  
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Observaciones Soporte</th>
                        <td id="col-principal" id="cuadro">xxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Soporte Producto</th>
                        <td id="col-principal" id="cuadro">555555555</td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Tipo Soporte</th>
                        <td id="col-principal" id="cuadro"><a href="#">paginaweb@hotmail.ccom</a></td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Entidad Vinculada</th>
                        <td id="col-principal" id="cuadro"><a href="#">paginaweb@hotmail.ccom</a></td>
                    </tr>

                    <tr>
                    <th id="fil-principal">Imagen Producto</th>
                    <td id="col-principal" id="cuadro">
                      <ol>
                        <li style="list-style-type: square; text-decoration:underline;"><a href="#">sublinea 1</a></li>
                      </ol>
                    </td>
                </tr>
                </tbody>
            </table>
    </fieldset>
</div>
@stop