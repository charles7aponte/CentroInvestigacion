@extends('administrador.panel_admin')

@section("javascript-nuevos")

<script src="js/ActivarDesactivarDocente.js" type="text/javascript"></script> 
<script>
  fila_info="#dato_grupo_";
</script>

@section('cuerpo')

<form id="form-productos">
  <div>

  <div id="titulo-listaproductos" id="cuadro"> 
      <h2>Lista de Productos</h2>
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
          <th>NOMBRE DEL PRODUCTO</th>
          <th>USUARIO</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
        $i=1;
        $contador=(20*$numeropagina)-19;
      ?>
        @if(isset($campo_lista))
          @foreach ($campo_lista as $campo)
              <tr id="dato_producto_{{$campo['codigo_producto']}}" 
                    @if($campo['estado_activacion']==0) 
                    style=" background-color: #eee;"
                    @endif>
                <td id="col1">
                  <b>{{$contador++}}</b>
                </td> 
                <td  style="width:500px;">
                  <a href="{{URL::to('producto/id')}}/{{$campo['codigo_producto']}}">{{$campo['nombre_producto']}}</a>
                </td>
                <td  id="col3">
                  <span class="glyphicon glyphicon-user"></span> {{$campo['nombre_autor']}}</a>
                </td>

                <td  id="col1">
                  <a href="#"
                   data-info-estado="{{$campo['estado_activacion']}}"
                   onclick="activacion_desactivacion({{$campo['codigo_producto']}},this)">
                     <p style="margin:0;">
                      @if($campo['estado_activacion']==0)
                      <i class="glyphicon glyphicon-ok-circle"></i> Activar
                      @else 
                      <i class="glyphicon glyphicon-remove-circle"></i> Desactivar
                      @endif
                    </p>
                  </a>
                </td>
              </tr> 
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