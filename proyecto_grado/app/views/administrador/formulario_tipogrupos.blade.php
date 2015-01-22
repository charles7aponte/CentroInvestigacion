@extends('administrador.panel_admin')


@section('cuerpo')



<script>

  function eliminartipogrupo(id){



 $.ajax({
    url:'formulariotipogrupo/eliminar/'+id,
    type:'GET',
    dataType:"json",

    success: function (data){
      alert(data);
      if(data.respuesta)
        {

          $("#dato_tipogrupo_"+id).remove();
        }
      else{
        alert("No se pudo eliminar.");
      }

    }
    ,
    error: function(j,t,e){
      alert("");
    }
  });
  return false;

  }

</script>

<div>  
    <form id="form-tipogrupo" autocomplete="on"   action="{{URL::to('creacion/formulariotipogrupos')}}" method="post">

        @if(Session::has('mensaje_error') || Session::has('mensaje_success'))
            <fieldset style="margin-bottom: 2px;
                    margin-top: 5px;
                    padding: 2px;">
                @if(Session::has('mensaje_success'))    
                    <div style="margin: 0px;" class="alert alert-success">{{Session::get('mensaje_success')}}</div>
                @endif

                @if(Session::has('mensaje_error'))
                    <div  style="margin: 0px;" class="alert alert-danger">{{ Session::get('mensaje_error')}}</div>   
                @endif 
            </fieldset>
        @endif



        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar un nuevo tipo de grupo</h2></div>
          <ul>
            <fieldset style="border-color:transparent">
                <li class="@if($errors->has('tipo-grupo')) has-error @endif">
                  <label for="tipo-grupo">Tipo Grupo:</label> 
                    <input id="tipo-grupo" type="text" name="tipo-grupo" value="{{Input::old('tipo-grupo')}}" required="required">
                </li>       
            </fieldset> 
          </ul> 
              <table id="botones-formularios">
                  <thead>
                      <th id="crear">
                          <button id="crear-tipogrupo" type="submit">
                          <img alt="bien"  src="images/bn.png" width="16" height="16" />
                          Crear
                          </button>
                      </th>
                  </thead>
              </table>
          <ul> 
        </form>          
              <table id="tabla-tipo-grupos" style="margin-top:40px; width:950px;">
                  <thead>
                    <tr><th colspan="3">TIPOS DE GRUPO</th></tr>
                    <tr>
                      <th>C&oacute;digo</th>
                      <th>Nombre del tipo de grupo</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    
                  <!--insertando en la tabla los registros-->
                  @if(isset($tipogrupos))
                          
                     @foreach ($tipogrupos as $tipogrupo) <!--array- que viene del controlador-->
                      <tr id="dato_tipogrupo_{{$tipogrupo['id']}}">
                      <td>{{$tipogrupo['id']}}</td>
                      <td>{{$tipogrupo['tipo_grupo']}}</td>
                      <td>
                       <b onclick="eliminartipogrupo({{$tipogrupo['id']}})" > <a href="#" onclick="return false" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                       </b>
                      </td>
                    </tr>

                     @endforeach
                  @endif
                           
                  </tbody>
                </table>
            </ul>

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="guardar-tipogrupo" type="submit">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Guardar 
                        </button>
                    </th>
                </thead>
            </table> 
</div>  
@stop    