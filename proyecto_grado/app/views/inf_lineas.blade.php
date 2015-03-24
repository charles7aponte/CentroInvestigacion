
@extends('administrador.panel_admin')
@section('css-nuevos')
<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section("javascript-nuevos")
<script src="{{URL::to('/js')}}/recursos/eliminar_datos.js" type="text/javascript"></script> 
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
        <div class="modal-header" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" style="background:none; font-weight:bold;"> </h4>
        </div>
        <div class="modal-body">
          <label for="estado-sublinea"><b>Estado:</b></label>
            <div id="estado-sublinea"> </div>
          </br>
          <label for="descripcion-sublinea"><b>Descripci&oacute;n: </b></label>
            <div id="descripcion-sublinea">       </div>
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

            <table id="titulo-infgrupos" id="cuadro" >
              <tbody>
                @if(isset($lineas) && $lineas!=null && isset($lineas['id_lineas']))
                   <th><h2>{{$lineas['nombre_linea']}}</h2></th> 
                   <th>
                      @if($lineas['foto_linea']!="")
                      <img align="right" src="{{URL::to('archivos_db/lineas/')}}/{{$lineas['foto_linea']}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}images/ui-anim_basic_16x16.gif'">
                      @else 

                      @endif
                    </th>
                @endif    
              </tbody>     
            </table>

        <table class="tabla-inflineas">

            <thead>   
            	<tr>
                	<th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
						background: -webkit-linear-gradient(top,#286388,#122d3e);
                    	background: -moz-linear-gradient(top,#286388,#122d3e);
                    	background: -o-linear-gradient(top,#286388,#122d3e);  
                    	background: linear-gradient(to bottom,#286388,#122d3e);  
                    	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Datos Básicos de la línea
                	</th>
             	</tr>
            </thead>

            <tbody>
                <tr>
                    <th id="fil-principal">código</th>
                    <td  class="codigo" id="col-principal" id="cuadro">
                      @if(isset($lineas) && $lineas )
                      {{$lineas['id_lineas']}}
                      @endif
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Coordinador</th>
                    <td class="coordinador" id="col-principal" id="cuadro" style="text-transform:capitalize;">
                      @foreach($Lista_coordinadores as $Lista_coordinador)
                        {{$Lista_coordinador['nombre1']}} {{$Lista_coordinador['nombre2']}} 
                        {{$Lista_coordinador['apellido1']}} {{$Lista_coordinador['apellido2']}}
                      @endforeach
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Definición</th>
                    <td class="definicion-linea" id="col-principal" id="cuadro" style="text-transform:none;">
                      @if(isset($lineas) && $lineas)
                      {{$lineas['definicion_linea']}}
                      @endif
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Objeto de estudio</th>
                    <td class="objeto-estudio" id="col-principal" id="cuadro" style="text-transform:none;">
                      @if(isset($lineas) && $lineas)
                       {{$lineas['objetivo_estudio']}}
                       @endif
                    </td>  
                </tr>
        
                <tr>
                    <th id="fil-principal">Objetivo de la línea</th>
                    <td class="objetivo-linea" id="col-principal" id="cuadro" style="text-transform:none;">
                      @if(isset($lineas) && $lineas )
                        {{$lineas['objetivo_linea']}}
                      @endif
                    </td>
                </tr>
        
                <tr>
                    <th id="fil-principal"></li>archivo</th>
                    <td class="link-archivo" id="col-principal" id="cuadro">
                       @if(isset($lineas) && $lineas && $lineas['ruta_archivo']!="")
                          <a href="{{URL::to('archivos_db/lineas/')}}/{{$lineas['ruta_archivo']}}" target="_blank">
                           <i class="glyphicon glyphicon-file"></i>
                           Archivo ({{$lineas['ruta_archivo']}})
                         </a>
                       @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>

 <!-- menus desplegables de las lineas-->
     <fieldset id="secundario1">
        <div class="titulo-tabla-proyecto" id="cuadro">             
            <h4 id="boton_sublinea"  style="width:50%;"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Sublíneas</a></h4>
        </div>
      <div id="tabla_sublinea">
          <div class="list-group">
            @if($sublineas && count($sublineas)>0)
              @foreach($sublineas as $sublinea)
                <a  class="list-group-item" data-toggle="modal" data-target="#myModal" 
                data-infoestado="{{$sublinea->estado}}"
                data-infonombre="{{$sublinea->nombre_sublinea}}"
                data-infodescripcionsublinea="{{$sublinea->descripcion_sublinea}}"
                 onclick="cargarmodal_descripcion_lineas_sublineas(this);"
                >
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
        <div class="titulo-tabla-proyecto" id="cuadro">             
            <h4 id="boton_grupos"  style="width:50%;">
              <li class="glyphicon glyphicon-plus-sign"></li>
              <li class="glyphicon glyphicon-minus-sign"></li>
              <a href="#" onclick="return false">Grupos Vinculados</a>
            </h4>
        </div>
        <div id="tabla_grupos">
          <div class="list-group">
            @if($lista_grupos && count($lista_grupos)>0)
              @foreach($lista_grupos as $lista_grupo)
                <a href="{{URL::to('/')}}/grupo/id/{{$lista_grupo->codigo_grupo}}" class="list-group-item">
                  {{$lista_grupo->nombre_grupo}} 
                </a>
              @endforeach
              @else
                <p style="margin-left:5px; color:#122d3e; font-weight:bold; font-size: 13px;">
                No hay Grupos vinculados a esta línea.
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
                  Proyectos</p>
        </h4>
      </div>
      <div id="proyecto">
          <div class="list-group">
              <a href="{{URL::to('/')}}/listaproyectoslineas/linea/{{$lineas['id_lineas']}}" class="list-group-item">
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
                  Productividad</p>
        </h4>
      </div>
      <div id="producto">
          <div class="list-group">

            @if(isset($lineas) && $lineas)
              @foreach($Lista_productos as $lista_producto)   
                <a href="{{URL::to('/')}}/listaproductos/linea/{{$lineas['id_lineas']}}/subtipo/{{$lista_producto['id_subtipo_producto']}}">
                  <li class="list-group-item">
                    <span class="badge">
                        {{$lista_producto['total']}}
                    </span>
                    {{$lista_producto['nombre_subtipo_producto']}}
                  </li>
                </a>  
              @endforeach 
            @endif 
          </div>
      </div>
    </fieldset>
</div>    
@stop