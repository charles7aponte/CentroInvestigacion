@extends('panel_cuerpo')

@section('contenido-principal')

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

    <div id="tabla-listaproyectolineas">
      <table id="listalineas1" style="border:none;">
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
            <th></th>
            <th>NOMBRE DEL PROYECTO</th>
            <th>INVESTIGADOR PRINCIPAL</th>
            <th>CO-INVESTIGADORES</th>
          </tr>
        </thead>
        <?php
           $contador=(20*$numeropagina)-19;
        ?>
          <tbody>
            @foreach($lista_proyectos_lineas as $lista_proyectos_lineas)
              <tr >
                <td id="col1">
                 {{$contador++}}
                </td> 
                <td id="col2">
                 {{$lista_proyectos_lineas->nombre_proyecto}}
                </td> 
                <td id="col3">{{$lista_proyectos_lineas['autor_investigadores']}}</td>
                <td id="col4">{{$lista_proyectos_lineas['autor_coinvestigadores']}}</td>
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
