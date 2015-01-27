@extends('administrador.panel_admin')

@section('cuerpo')

<form id="form-convocatorias">
    <div id="titulo-listaconvocatoria" id="cuadro"> 
      <h2>Lista de Convocatorias</h2>
    </div>
      <div id="tabla-listaconvocatorias">
        <table id="listaconvocatorias">
          <thead>
            <tr><th colspan="3" style="background: #1A6D71;
                    background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
                    background: -moz-linear-gradient(top,#1A6D71,#122d3e);
                    background: -o-linear-gradient(top,#1A6D71,#122d3e);  
                    background: linear-gradient(to bottom,#1A6D71,#122d3e);  
                    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;";>CONVOCATORIAS</th></tr>
            <tr>
              <th> </th>
              <th colspan="2">Ti&iacute;tulo de la convocatoria</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td id="nombre-convocatoria"><a href="">Este es el nombre de la convocatoria</a></td>
              <td>
                <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                <a href="#" class="button">Eliminar</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td id="nombre-convocatoria"><a href="">Grupo 2</a></td>
              <td>
                <a href="#" class="button"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                <a href="#" class="button">Eliminar</a>
              </td>
            </tr>
          </tbody>
        </table>
        <div style="margin-left:30px; margin-right:30px;"> 
            {{$links}}
        </div>
  </div>
    </div>
</form>
@stop


