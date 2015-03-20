@extends('administrador.panel_admin')

@section("javascript-nuevos")
  <script src="js/recursos/eliminar_datos.js" type="text/javascript"></script> 
  <script >
      URL='formularioinvestigadores/eliminar/';
      fila_info="#dato_investigador_";
  </script>

@section('cuerpo')
<div>
    <!--Alerta de confirmar eliminacion de datos-->
    <div class="modal fade bs-example-modal-lg" id="eliminar-confirmar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg"  style="width:500px;margin-left:400px;" >
        <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirmaci&oacute;n</h4>
          </div>
          <div class="modal-body">
            <p>¿Esta seguro que desea eliminarlo?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="eliminacionremota();"
            style=" border-radius: 5px; background: #1A6D71; border-color:white; color:white;">Aceptar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div><!-- /.modal-content -->
        </div>
      </div>
    </div>


  <form id="form-sublineas">
          
   <div id="titulo-listasublineas" id="cuadro"> 
      <h2>Lista de Investigadores</h2>
    </div>
    <div id="tabla-listasublineas">
      <table id="listasublineas">
        <thead>
          <tr><th colspan="5" style=" border-radius: 5px; background: #1A6D71;
                  background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
                  background: -moz-linear-gradient(top,#1A6D71,#122d3e);
                  background: -o-linear-gradient(top,#1A6D71,#122d3e);  
                  background: linear-gradient(to bottom,#1A6D71,#122d3e);  
                  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">INVESTIGADORES</th></tr>
          <tr>
            <th></th>
            <th>NOMBRE DE LOS INVESTIGADORES</th>
            <th>PERFÍL</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @if(isset($campo_lista))
              @foreach ($campo_lista as $campo)
                  <tr id="dato_investigador_{{$campo['codinv_ext']}}">
                    <td style="width:130px;">
                      <a >{{$campo['cedula_persona']}} </a>
                    </td>
                    <td >
                      <a href="">{{$campo['nombre_persona']}}</a>
                    </td>
                    <td>
                      {{$campo['nombre_perfil']}} 
                    </td>
                    <td style="width:90px;">
                      <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                    </td>
                    <td style="width:93px;">
                      <b onclick="eliminartipo({{$campo['codinv_ext']}})">
                      <a href="#" onclick="return false" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                    </td>
                  </tr>
              @endforeach
            @endif
      </table>

          <div style="margin-left:30px; margin-right:30px;"> 
              {{$links}}
          </div>
      </div>
    </div>
  </form>
</div>
@stop