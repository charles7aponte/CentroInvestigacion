@extends('panel_cuerpo')

@section('contenido-principal')

  <form id="form-proyectolinea" class="gradient">
      @if(count($productosporlineas)<=0)
        <fieldset style="margin-bottom: 2px;
          margin-top: 5px;
          padding: 2px;">
        <div  style="margin: 2px;" class="alert alert-danger">No hay productos registrados</div>   
        </fieldset>
      @endif
          
    <div id="titulo-listaproductolinea" id="cuadro">
      @if($productosporlineas &&  count($productosporlineas)>0) 
        <h2>{{$lista_nombre_lineas['nombre_linea']}}</h2>
        @else <p></p>
      @endif  
    </div>

    <div id="tabla-listaproyectogrupos">
      <table id="listagrupos">
        <thead>
          <tr><th colspan="5" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  color:white;">
                Productividad</th>
              </tr>
          <tr>
            <th>ID</th>
            <th>NOMBRE DEL PRODUCTO</th>
            <th>AUTORES</th>
          </tr>
        </thead>
        <?php
          $contador=(20*$numeropagina)-19;
        ?>
          <tbody>
            @foreach($productosporlineas as $productoporlinea)
              <tr >
                <td style="width:100px;">
                 {{$contador++}}
                </td> 
                <td id="col2">
                  <a  href="{{URL::to('producto/id')}}/{{$productoporlinea->codigo_producto}}">{{$productoporlinea->nombre_producto}}</a>
                </td> 
                <td  id="col3">
                  {{$productoporlinea->autor_investigadores}}
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
