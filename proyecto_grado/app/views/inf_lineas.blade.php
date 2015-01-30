
@extends('administrador.panel_admin')
@section('css-nuevos')
<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop


@section('javascript-nuevos2')
<script type="text/javascript" src="{{URL::to('/js')}}/js-inflineas.js"></script>
@stop

@section('cuerpo')

<!-- Modal  de sublineas-->
<div id="modal-internos">
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:700px">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" style="background:none;">sublinea 1</h4>
        </div>
        <div class="modal-body">
          <label for="estado-sublinea"><b>Estado:</b></label>
            <div id="estado-sublinea"> Aprobado</div>
          </br>
          <label for="descripcion-sublinea"><b>Descripci&oacute;n: </b></label>
            <div id="descripcion-sublinea">Este es el titulo de la linea de investigacion numero uno de la ciudad de villavicencion de la universidad de los llanos </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="capa" class="inflineas">
    <fieldset id="principal">
        <div id="titulo-lineas" id="cuadro"> 
            <h2>Este es el titulo de la linea de investigacion numero uno de la ciudad de villavicencion de la universidad de los llanos</h2>  
        </div>

        <table class="tabla-inflineas">

            <thead>   
            	<tr>
                	<th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
						background: -webkit-linear-gradient(top,#286388,#122d3e);
                    	background: -moz-linear-gradient(top,#286388,#122d3e);
                    	background: -o-linear-gradient(top,#286388,#122d3e);  
                    	background: linear-gradient(to bottom,#286388,#122d3e);  
                    	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Informaci&oacute;n general de la linea
                	</th>
             	</tr>
            </thead>

            <tbody>

                <tr>
                    <th id="fil-principal">c&oacute;digo linea</th>
                    <td  class="codigo" id="col-principal" id="cuadro"></td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Nombre linea</th>
                    <td class="nombre" id="col-principal" id="cuadro"></td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Coordinador linea</th>
                    <td class="coordinador" id="col-principal" id="cuadro">Facultad de ciencias basicas e ingenieria</td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Definici&oacute;n linea</th>
                    <td class="definicion-linea" id="col-principal" id="cuadro">D</td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Objeto estudio</th>
                    <td class="objeto-estudio" id="col-principal" id="cuadro">grupo horientado a la aplicaciones libresffffffffffffff rffffffffffffffffffffffff ffffffffffffff ddddddddddddddd ssssssssssssss ssssssssss dddddddddddddddddddddddddddd sssssssssssssssssss</td>  
                </tr>
        
                <tr>
                    <th id="fil-principal">Objetivo linea</th>
                    <td class="objetivo-linea" id="col-principal" id="cuadro">xxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                </tr>
        
                <tr>
                    <th id="fil-principal"><li class="glyphicon glyphicon-book"></li>Link archivo</th>
                    <td class="link-archivo" id="col-principal" id="cuadro"><li class="glyphicon glyphicon-save"></li>555555555</td>
                </tr>
                <tr>
                    <th id="fil-principal">Sublineas</th>
                    <td class="sublinea" id="col-principal" id="cuadro">
                      <ol>
                        <li style="list-style-type: square; text-decoration:underline;"><a  data-toggle="modal" data-target="#myModal" href="#">sublinea 1</a></li>
                      </ol>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>

 <!-- menus desplegables productividad de las lineas-->
    <fieldset id="secundario">
        <div class="titulo-tabla-productividad" id="cuadro">             
            <h4 id="boton_producto" ><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Productividad</a></h4>
        </div>
        <table id="tabla_producto">
      		<thead>
      			<tr><th colspan="3" style=" border-radius: 5px; background: #1A6D71;
             		background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
              		background: -moz-linear-gradient(top,#1A6D71,#122d3e);
              		background: -o-linear-gradient(top,#1A6D71,#122d3e);  
             		background: linear-gradient(to bottom,#1A6D71,#122d3e);  
              		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e);); color:white;">PRODUCTOS</th>
          	 	</tr>
            	<tr> 
          			<th colspan="2">NOMBRE DEL PRODUCTO</th>
        		</tr>
      		</thead>
      		<tbody>
        		<tr>
          			<td>1</td>
          			<td id="nombre-grupo"><a href="grupos">Este es el nombre del producto de investigacion o de estudio de la universidad de los llanos</a></td>
        		</tr>
        		<tr>
         		 	<td>2</td>
         			<td id="nombre-grupo"><a href="">nombre del producto  2</a></td>
       	 		</tr>
      		</tbody>
    	</table>
    </fieldset>

    <fieldset id="secundario">
        <div class="titulo-tabla-proyecto" id="cuadro">             
            <h4 id="boton_proyecto" ><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Proyectos</a></h4>
        </div>
      <table id="tabla_proyecto">
          <thead>
            <tr><th colspan="3" style=" border-radius: 5px; background: #1A6D71;
                  background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
                  background: -moz-linear-gradient(top,#1A6D71,#122d3e);
                  background: -o-linear-gradient(top,#1A6D71,#122d3e);  
                  background: linear-gradient(to bottom,#1A6D71,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e);); color:white;">PROYECTOS</th>
            </tr>
            <tr> 
              <th colspan="2">NOMBRE DEL PROYECTO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>1</td>
                <td id="nombre-grupo"><a href="grupos">Este es el nombre del proyecto1 de investigacion o de estudio de la universidad de los llanos</a></td>
            </tr>
            <tr>
              <td>2</td>
              <td id="nombre-grupo"><a href="">nombre del proyecto  2</a></td>
            </tr>
          </tbody>
      </table>
    </fieldset>
</div>    
@stop