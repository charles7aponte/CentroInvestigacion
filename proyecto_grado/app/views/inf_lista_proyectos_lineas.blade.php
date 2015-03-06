@extends('administrador.panel_admin')

@section('cuerpo')

  <form id="form-proyectolineas" class="gradient">
      @if(count($lista_proyectos_lineas)<=0)
        <fieldset style="margin-bottom: 2px;
          margin-top: 5px;
          padding: 2px;">
        <div  style="margin: 2px;" class="alert alert-danger">No hay proyectos registrados</div>   
        </fieldset>
      @endif
          
    <div id="titulo-listaproyectolinea" id="cuadro">
      @if($lista_proyectos_lineas &&  count($lista_proyectos_lineas)>0) 
        <h2>{{$lista_nombre_lineas['nombre_linea']}}</h2>
        @else <p></p>
      @endif  
    </div>

    <div id="tabla-listaproyectogrupos">
      <table id="listagrupos" style="border:none;">
        <thead>
          <tr><th colspan="4" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  color:white;">
                Proyectos</th>
              </tr>
          <tr>
            <th>ID</th>
            <th colspan="3">NOMBRE DEL PROYECTO</th>
          </tr>
        </thead>
          <tbody>
            @foreach($lista_proyectos_lineas as $lista_proyectos_lineas)
              <tr >
                <td style="width:70px;">
                 {{$lista_proyectos_lineas->codigo_proyecto}}
                </td> 
                <td style="text-align:left; margin-right:3px;">
                  <a href="">{{$lista_proyectos_lineas->nombre_proyecto}}</a>
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
