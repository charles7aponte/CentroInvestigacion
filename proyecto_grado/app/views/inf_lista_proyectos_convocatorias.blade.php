@extends('administrador.panel_admin')

@section('cuerpo')

  <form id="form-proyectolinea" class="gradient">
      @if(count($lista_proyectos_convocatorias)<=0)
        <fieldset style="margin-bottom: 2px;
          margin-top: 5px;
          padding: 2px;">
        <div  style="margin: 2px;" class="alert alert-danger">No hay proyectos registrados</div>   
        </fieldset>
      @endif
          
    <div id="titulo-listaproductolinea" id="cuadro">
      @if($lista_proyectos_convocatorias &&  count($lista_proyectos_convocatorias)>0) 
        <h2>{{$lista_convocatorias['titulo_convocatoria']}}</h2>
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
                Proyectos</th>
              </tr>
          <tr>
            <th>ID</th>
            <th>NOMBRE DEL PROYECTO</th>
            <th style=" text-align:center; margin-right:13px;">ESTADO</th>
          </tr>
        </thead>
          <tbody>
            @foreach($lista_proyectos_convocatorias as $lista_proyecto_convocatoria)
              <tr >
                <td style="width:70px;">
                 {{$lista_proyecto_convocatoria->codigo_proyecto}}
                </td> 
                <td style="text-align:left; width:500px;">
                  <a href="">{{$lista_proyecto_convocatoria->nombre_proyecto}}</a>
                </td> 
                <td style="width:120px; text-align:center;">
                  {{$lista_proyecto_convocatoria->estado_proyecto}}
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
