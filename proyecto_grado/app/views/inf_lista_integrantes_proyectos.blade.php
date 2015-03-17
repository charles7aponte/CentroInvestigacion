@extends('administrador.panel_admin')

@section('cuerpo')

  <form id="form-integrantegrupos" class="gradient">
      @if(count($lista_integrantes_proyectos)<=0)
        <fieldset style="margin-bottom: 2px;
          margin-top: 5px;
          padding: 2px;">
        <div  style="margin: 2px;" class="alert alert-danger">No hay integrantes registrados</div>   
        </fieldset>
      @endif
          
    <div id="titulo-listaintegrantegrupo" id="cuadro"> 
        @if($lista_integrantes_proyectos &&  count($lista_integrantes_proyectos)>0)
          <h2>{{$lista_nombre_proyectos['nombre_proyecto']}}</h2>
          @else     <p></p>   
        @endif
    </div>

    <div id="tabla-listaintegrantegrupos">
      <table id="listagrupos" style="border:none;">
        <thead>
          <tr><th colspan="5" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">
                Integrantes del Proyecto</th>
              </tr>
          <tr>
            <th># DOCUMENTO</th>
            <th>NOMBRES Y APELLIDOS</th>
            <th style="margin-right:30px; text-align:center;">PERFÍL</th>
          </tr>
        </thead>
          <tbody>
            @foreach($lista_integrantes_proyectos as $lista_integrante_proyecto)
              <tr>
                <td style="width:300px;">
                  {{$lista_integrante_proyecto->cedula}}
                </td> 
                <td style="width:400px;">
                  <a href="{{URL::to('/')}}/listapersonas/{{$lista_integrante_proyecto['cedula']}}">
                    {{$lista_integrante_proyecto->nombre1}} {{$lista_integrante_proyecto->nombre2}} 
                    {{$lista_integrante_proyecto->apellido1}} {{$lista_integrante_proyecto->apellido2}}</a>
                </td>
                <td style="width:300px; margin-right:30px; text-align:center;">
                  {{$registro_perfiles['nombreperfil']}}
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
