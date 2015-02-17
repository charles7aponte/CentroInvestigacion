@extends('administrador.panel_admin')

@section('javascript-nuevos')   
    <script type="text/javascript" src="{{URL::to('/js')}}/recursos/listafinanciamiento_proyectos.js"></script>
@stop

@section("javascript-nuevos2")
   <script type="text/javascript" src="{{URL::to('/js')}}/recursos/financiamientoproyectos.js"></script>
@stop


@section('cuerpo')
  <div>
    
          <!-- Modal de la descripcion -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel" style="background:none;"><b>Descripci&oacute;n</b></h4>
                </div>
                <div class="modal-body" id="descripcion-financimiento">
               
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>


  <div id="titulo-listaproyecto-financiado" id="cuadro"> 
    <h2>FINANCIAMIENTO DE UN PROYECTO</h2>
  </div>

  <div id="f-lista-financiamiento" style="margin-top:30px;">
    <fieldset>
     <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" style="width:810px;" id="nombre_proyecto" name="nombre_proyecto" value="" class="form-control"  placeholder="Ingrese el Proyecto"/>
          <input type="hidden" id="nombre_proyecto1" name="nombre_proyecto1" value=""  placeholder="Ingrese el Proyecto"/>
        </div>
        <button onclick="return false" name="verfinanciamiento" id="verfinanciamiento" type="submit" class="btn btn-default">Ver Financiamiento</button>
                    <span id="advertencias">
              <p>*Ingrese el nombre del proyecto y espere a que el autocompletado lo muestre.</p>
            </span>
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
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;">
            Financiamiento 
          </th>
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

    <tbody id="cuerpo_tabla_finaciamiento">

    </tbody>
  </table>
</div>  
  
@stop  

