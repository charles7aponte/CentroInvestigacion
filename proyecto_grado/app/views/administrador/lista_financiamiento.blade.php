@extends('administrador.panel_admin')

@section('cuerpo')

  <div id="titulo-listaproyecto-financiado" id="cuadro"> 
    <h2>FINANCIAMIENTO DE UN PROYECTO</h2>
  </div>

  <div id="f-lista-financiamiento" style="margin-top:30px;">
    <fieldset>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input style="width:810px;" type="text" class="form-control" placeholder="Ingrese el Proyecto">
        </div>
        <button type="submit" class="btn btn-default">Ver Financiamiento</button>
      </form>
    </fieldset> 
  </div>  


  <table id="tabla-listafinanciamiento-proyectos" style="margin-top:40px; margin-left:40px; border:none; width:950px;">
    <thead>
      <tr><th colspan="6" style="background: #1A6D71;
            background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
            background: -moz-linear-gradient(top,#1A6D71,#122d3e);
            background: -o-linear-gradient(top,#1A6D71,#122d3e);  
            background: linear-gradient(to bottom,#1A6D71,#122d3e);  
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">NOMBRE DEL PROYECTO</th>
          </tr>
      <tr>
        <th>Fecha</th>
        <th>Entidad</th>
        <th>Modo</th>
        <th>Valor</th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td style="width:60px;">01/03/2014</td>
        <td style="width:400px; margin-right:5px;">Universidad de los llanos de villavicencio jajajaS jjjjjjjjjj</td>
        <td style="width:100px; margin-rigth:5px;">efectivo</td>
        <td style="width:90px; margin-left:5px;">$ 3.000.000</td>
        <td style="width:120px;">                      
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"
           style="height:30px; width:120px; background:#E3E7E5;border-color:#E3E7E5; margin-right:15px; font-size:12px; color:#333;">
           Ver descripci&oacute;n
          </button>

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel" style="background:none;"><b>Descripci&oacute;n</b></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
      </td>
        <td style="width:100px;">
          <a href="#" class="button"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
        </td>
      </tr>
    </tbody>
  </table>
  
@stop  

