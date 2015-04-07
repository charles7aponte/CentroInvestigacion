@extends('panel_cuerpo')

@section('contenido-principal')
    <form id="form-noticias1">
        @if((count($campo_lista))==0)
              <fieldset style="margin-bottom: 2px;
                      margin-top: 5px;
                      padding: 2px;">
                       @if($tipo=="noticia")
                        <div  style="margin: 0px;" class="alert alert-danger">No hay Noticias</div>   
                        @else
                        <div  style="margin: 0px;" class="alert alert-danger">No hay Eventos</div>  
                      @endif 
              </fieldset>
          @endif
            
      <div id="titulo-noticias1" id="cuadro"> 
        @if($tipo=="noticia")
          <h2>Noticias</h2>
            @else 
            <h2>Eventos</h2>
        @endif  
      </div>

      <div id="tabla-noticias">
          <table id="listanoticias">
          <thead>
            <tr><th colspan="5" style=" border-radius: 5px; background: #286388;
                    background: -webkit-linear-gradient(top,#286388,#122d3e);
                    background: -moz-linear-gradient(top,#286388,#122d3e);
                    background: -o-linear-gradient(top,#286388,#122d3e);  
                    background: linear-gradient(to bottom,#286388,#122d3e);  
                    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e););  color:white;">
                    @if($tipo=="noticia")
                    NOTICIAS
                    @else 
                    EVENTOS
                    @endif
                  </th>
            </tr>
            <tr>
              <th style="width:100px;"> </th>
              <th style="width:700px;">T&Iacute;TULO</th>
              <th style="width:100px;">FECHA</th>
            </tr>
          </thead>

          <?php
            $contador=(20*$numeropagina)-19;
          ?>
          <tbody>
              @if(isset($campo_lista) )

                @foreach ($campo_lista as $campo)
                    <tr>
                      <td style="width:100px;">
                        <b>{{$contador++}}</b>
                      </td> 
                      <td style="width:700px;">
                        <a href="{{URL::to('eventonoticia/id')}}/{{$campo->id_evento}}">{{$campo["titulo_evento"]}} </a>


                      </td>
                      <td style="width:200px;">
                          {{InvEventosNoticias::formato_fecha($campo['fecha'])}}
                      </td>
                    </tr>
                @endforeach
              @endif
          </table>
          <div style="margin-left:30px; margin-right:30px;"> 
            {{$links}}
          </div>
      </div>
    </form>
@stop