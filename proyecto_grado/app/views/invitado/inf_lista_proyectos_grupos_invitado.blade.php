@extends('panel_cuerpo')

@section('contenido-principal')

  <form id="form-proyectogrupos" class="gradient">

     @if(count($lista_proyectos_grupos)<=0)
        <fieldset style="margin-bottom: 2px;
          margin-top: 5px;
          padding: 2px;">
        <div  style="margin: 2px;" class="alert alert-danger">No hay proyectos registrados</div>   
        </fieldset>
      @endif
          
    <div id="titulo-listaproyectogrupo" id="cuadro">
      @if($lista_proyectos_grupos &&  count($lista_proyectos_grupos)>0) 
        <h2>{{$lista_nombre_grupos['nombre_grupo']}}</h2>
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
              <?php 
                 $contador=(20*$numeropagina)-19;
              ?>
          <tr>
            <th></th>
            <th>NOMBRE DEL PROYECTO</th>
            <th>INVESTIGADOR PRINCIPAL</th>
            <th>CO-INVESTIGADORES</th>
          </tr>
        </thead>
          <tbody>
            @foreach($lista_proyectos_grupos as $lista_proyecto_grupo)
              <tr > 
                <td>{{$contador++}}</td>

                <td style="text-align:left; margin-right:3px; width:350px;">
                  {{$lista_proyecto_grupo->nombre_proyecto}}
                </td> 
                <td style="text-align:left; margin-left:3px; width:200px;">
                  {{$lista_proyecto_grupo['autor_investigadores']}}
                  
                </td>
                <td style="margin-left:3px; width:200px;">
                  {{$lista_proyecto_grupo['autor_coinvestigadores']}}
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
