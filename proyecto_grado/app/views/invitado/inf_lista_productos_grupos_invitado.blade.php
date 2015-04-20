@extends('panel_cuerpo')

@section('contenido-principal')

  <form id="form-proyectosgrupos" class="gradient">
       @if(count($lista_productos_grupos)<=0)
        <fieldset style="margin-bottom: 2px;
          margin-top: 5px;
          padding: 2px;">
        <div  style="margin: 2px;" class="alert alert-danger">No hay productos registrados</div>   
        </fieldset>
      @endif
          
    <div id="titulo-listaproductosgrupo" id="cuadro"> 
        @if($lista_productos_grupos &&  count($lista_productos_grupos)>0)
        <h2>{{$lista_nombre_grupos['nombre_grupo']}}</h2>
        @else   
        @endif
    </div>

    <div id="tabla-listaproductosgrupos">
      <table id="listagrupos">
        <thead>
          <tr><th colspan="5" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">
                Productividad</th>
              </tr>
              <?php 
                 $contador=(20*$numeropagina)-19;
              ?>
          <tr>
            <th></th>
            <th>NOMBRE PRODUCTO</th>
            <th>AUTORES</th>
          </tr>
        </thead>
          <tbody>
            @foreach($lista_productos_grupos as $lista_producto_grupo)
              <tr>
                <td style="width:100px;">
                   {{$contador++}}
                </td> 
                <td id="col2"> 
                   {{$lista_producto_grupo->nombre_producto}}
                </td>
                <td id="col3">
                  {{$lista_producto_grupo['autor_investigadores']}}
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>      
      <div style="margin-left:30px; margin-right:30px;"> 
        {{$links}} 
      </div>
    </div>
  </form>
@stop
