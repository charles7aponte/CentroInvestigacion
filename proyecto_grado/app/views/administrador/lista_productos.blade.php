@extends('administrador.panel_admin')

@section("javascript-nuevos")
<script src="{{URL::to('/')}}/js/recursos/eliminar_datos.js" type="text/javascript"></script> 
<script src="{{URL::to('/')}}/js/recursos/buscador_listas.js" type="text/javascript"></script>
<script >
    URL='{{URL::to('/')}}/formularioproductos/eliminar/';
    fila_info="#dato_convocatoria_";
</script>

@section('cuerpo')

<form id="form-productos">
  <div>
    <!--Alerta de confirmar eliminacion de datos-->
    <div class="modal fade bs-example-modal-lg" id="eliminar-confirmar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg"  style="width:500px;margin-left:400px;" >
        <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirmaci&oacute;n</h4>
          </div>
          <div class="modal-body">
            <p>¿Esta seguro que desea eliminarlo?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="eliminacionremota();"
            style=" border-radius: 5px; background: #1A6D71; border-color:white; color:white;">Aceptar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!-- /.modal-content -->
        </div>
      </div>
    </div>


  <div id="titulo-listaproductos" id="cuadro"> 
      <h2>Lista de Productos</h2>
    </div>

    <div id="buscador-lista">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input id="titulo_buscar" type="text" class="form-control" value="{{(isset($titulo) && $titulo)?$titulo:'' }}" placeholder="" >         <button id="bton_buscar_titulo" type="button" href="{{URL::to('/')}}/listadeproductos/find/" 
          class="btn btn-default"
          onclick="buscar_listas()" 
          ><i class="glyphicon glyphicon-search"></i>Buscar</button>

        </div>
      </form>
    </div>

  <div id="tabla-listaproductos">
    <table id="listaproductos">
      <thead>
        <tr><th colspan="4" style="background: #1A6D71;
            background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
            background: -moz-linear-gradient(top,#1A6D71,#122d3e);
            background: -o-linear-gradient(top,#1A6D71,#122d3e);  
            background: linear-gradient(to bottom,#1A6D71,#122d3e);  
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">PRODUCTOS</th></tr>
        <tr>
          <th> </th>
          <th colspan="3">NOMBRE DEL PRODUCTO</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i=1;
        $contador=(20*$numeropagina)-19;
      ?>
        @if(isset($campo_lista))
          @foreach ($campo_lista as $campo)
            @if($campo['estado_activacion']==0)
              <tr style="background:#F6F1B9;" id="dato_convocatoria_{{$campo['codigo_producto']}}">
                <td style="width:100px;">
                  <b>{{$contador++}}</b>
                </td> 
                <td>
                  <a href="{{URL::to('producto/id')}}/{{$campo['codigo_producto']}}">{{$campo['nombre_producto']}}</a>
                </td>
                <td style="width:90px;">
                  <a href="formularioproductos/edit/{{$campo['codigo_producto']}}" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                </td>
                <td style="width:93px;">
                  <b onclick="eliminartipo({{$campo['codigo_producto']}})">
                  <a href="#" onclick="return false" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                </td>
              </tr>
              @else 
                <tr  id="dato_convocatoria_{{$campo['codigo_producto']}}">
                  <td style="width:100px;">
                    <b>{{$contador++}}</b>
                  </td> 
                  <td>
                    <a href="{{URL::to('producto/id')}}/{{$campo['codigo_producto']}}">{{$campo['nombre_producto']}}</a>
                  </td>
                  <td style="width:90px;">
                    <a href="formularioproductos/edit/{{$campo['codigo_producto']}}" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                  </td>
                  <td style="width:93px;">
                    <b onclick="eliminartipo({{$campo['codigo_producto']}})">
                    <a href="#" onclick="return false" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                  </td>
                </tr>
            @endif  
          @endforeach
          @endif
      </tbody>    
    </table>
        <div style="margin-left:30px; margin-right:30px;"> 
            {{$links}}
        </div>
    </div>
  </div> 
</form>
@stop