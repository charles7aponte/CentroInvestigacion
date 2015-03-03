
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
       
        @if(isset($lineas['id_lineas'])==false)
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                    <div  style="margin: 0px;" class="alert alert-danger">No hay informaci&oacute;n registrada para esa l&iacute;nea</div>   
            </fieldset>
        @endif

        <div id="titulo-lineas" id="cuadro"> 
            <h2>
              {{$lineas['nombre_linea']}}
            </h2>  
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
                    <th id="fil-principal">c&oacute;digo</th>
                    <td  class="codigo" id="col-principal" id="cuadro">
                      {{$lineas['id_lineas']}}
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Coordinador</th>
                    <td class="coordinador" id="col-principal" id="cuadro">
                      {{$lineas['coordinador_linea']}}
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Definici&oacute;n</th>
                    <td class="definicion-linea" id="col-principal" id="cuadro" style="text-transform:none;">
                      {{$lineas['definicion_linea']}}
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Objeto de estudio</th>
                    <td class="objeto-estudio" id="col-principal" id="cuadro" style="text-transform:none;">
                       {{$lineas['objetivo_estudio']}}
                    </td>  
                </tr>
        
                <tr>
                    <th id="fil-principal">Objetivo de la l&iacute;nea</th>
                    <td class="objetivo-linea" id="col-principal" id="cuadro" style="text-transform:none;">
                      {{$lineas['objetivo_linea']}}
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal"><li class="glyphicon glyphicon-book"></li>archivo</th>
                    <td class="link-archivo" id="col-principal" id="cuadro"><li class="glyphicon glyphicon-save"></li>
                       @if($lineas['ruta_archivo']!="")
                          <a href="{{URL::to('archivos_db/lineas/')}}/{{$lineas['ruta_archivo']}}" target="_blank">
                           ruta_archivo</a>
                       @endif

                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>

 <!-- menus desplegables de las lineas-->
     <fieldset id="secundario1">
        <div class="titulo-tabla-proyecto" id="cuadro">             
            <h4 id="boton_sublinea"  style="width:50%;"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Subl&iacute;neas</a></h4>
        </div>
      <div id="tabla_sublinea">
          <div class="list-group">
            @if($sublineas && count($sublineas)>0)
              @foreach($sublineas as $sublinea)
                <a class="list-group-item" data-toggle="modal" data-target="#myModal" >
                 {{$sublinea->nombre_sublinea}}
               </a>
             @endforeach
            @else
              <p style="margin-left:5px; color:#122d3e; font-weight:bold; font-size: 13px;">
                No hay Subl&iacute;neas asociadas a esta l&iacute;nea.
              </p>
            @endif 
          </div>
      </div>
    </fieldset>

    <fieldset id="secundario1">
      <div class="titulo-listas" id="cuadro">             
         <h4>
            <p style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">
                  Proyectos asociados a la L&iacute;nea</p>
        </h4>
      </div>
      <div id="proyecto">
          <div class="list-group">
              <a href="{{URL::to('/')}}" class="list-group-item">
                  <span class="badge" id="total">
                          {{$Lista_proyectos}}
                  </span>
                  Total Proyectos
              </a>
          </div>
      </div>
    </fieldset>

    <fieldset id="secundario1">
      <div class="titulo-listas" id="cuadro">             
         <h4>
            <p style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">
                  Productos asociados a la L&iacute;nea</p>
        </h4>
      </div>
      <div id="producto">
          <div class="list-group">
              @foreach($Lista_productos as $lista_producto)   
                <a href="{{URL::to('/')}}">
                  <li class="list-group-item">
                    <span class="badge">
                        {{$lista_producto['total']}}
                    </span>
                    {{$lista_producto['nombre_subtipo_producto']}}
                  </li>
                </a>  
              @endforeach  
          </div>
      </div>
    </fieldset>
</div>    
@stop