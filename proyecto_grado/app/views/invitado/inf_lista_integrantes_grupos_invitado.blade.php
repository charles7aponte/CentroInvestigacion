@extends('panel_cuerpo')

@section('contenido-principal')

  <form id="form-integrantegrupos" class="gradient">
      @if(count($lista_integrantes_grupos)<=0)
        <fieldset style="margin-bottom: 2px;
          margin-top: 5px;
          padding: 2px;">
        <div  style="margin: 2px;" class="alert alert-danger">No hay integrantes registrados</div>   
        </fieldset>
      @endif
          
    <div id="titulo-listaintegrantegrupo" id="cuadro"> 
        @if($lista_integrantes_grupos &&  count($lista_integrantes_grupos)>0)
          <h2>{{$lista_nombre_grupos['nombre_grupo']}}</h2>
          @else     <p></p>   
        @endif
    </div>

    <div id="tabla-listaintegrantegrupos">
      <table id="listagrupos" style="border:none;">
        <thead>
          <tr><th colspan="4" style=" border-radius: 5px; background: #286388;
                  background: -webkit-linear-gradient(top,#286388,#122d3e);
                  background: -moz-linear-gradient(top,#286388,#122d3e);
                  background: -o-linear-gradient(top,#286388,#122d3e);  
                  background: linear-gradient(to bottom,#286388,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">
                Integrantes del grupo</th>
              </tr>
          <tr>
            <th>NOMBRES Y APELLIDOS</th>
            <th>PERFÍL</th>
          </tr>
        </thead>
          <tbody>
            @foreach($lista_integrantes_grupos as $lista_integrante_grupo)
              <tr>
                <td>
                    @if(strnatcasecmp(trim($registro_perfiles['nombreperfil']),"Docente")==0)
                      <a href="{{URL::to('/')}}/infdocentesinv/{{$lista_integrante_grupo['cedula']}}">
                      {{$lista_integrante_grupo->nombre1}} {{$lista_integrante_grupo->nombre2}} 
                      {{$lista_integrante_grupo->apellido1}} {{$lista_integrante_grupo->apellido2}}
                      </a>
                      @else 
                      {{$lista_integrante_grupo->nombre1}} {{$lista_integrante_grupo->nombre2}} 
                      {{$lista_integrante_grupo->apellido1}} {{$lista_integrante_grupo->apellido2}}
                    @endif  
                </td>
                <td style="width:250px; text-align:left;">
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
