@extends('administrador.panel_admin')

@section('javascript-nuevos')   
    <script type="text/javascript" src="{{URL::to('/js')}}/recursos/listafinanciamiento_proyectos.js"></script>
      <script src="js/recursos/eliminar_datos.js" type="text/javascript"></script> 
      <script >
          URL='formulariofinanciamiento/eliminar/';
          fila_info="#principal";
      </script>
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



 <!--ALERTA DE QUE NO EXISTE UN FINANCIAMIENTO ASOCIADO A ESE PROYECTO --> 

        <fieldset id="mensaje_de_vacio" style="
                margin:5px;
                display:none;
                padding: 2px;">
                <div  style="margin: 0px;" class="alert alert-danger"><b>No hay financiamiento asociado a ese proyecto.</b></div>   
        </fieldset>
 
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


  <table id="tabla-listafinanciamiento-proyectos" style="margin-top:40px; margin-left:40px; border:none; width:980px;">
    <thead>
      <tr ><th id="nombre-proyecto" colspan="7" style="background: #1A6D71;
            background: -webkit-linear-gradient(top,#1A6D71,#122d3e);
            background: -moz-linear-gradient(top,#1A6D71,#122d3e);
            background: -o-linear-gradient(top,#1A6D71,#122d3e);  
            background: linear-gradient(to bottom,#1A6D71,#122d3e);  
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#1A6D71, endColorstr=#122d3e); color:white;
            text-align:center; line-height:2;">
            

          </th>
      </tr>
      <tr>
        <th>Fecha</th>
        <th>Entidad</th>
        <th>Modo</th>
        <th>Valor</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody id="cuerpo_tabla_finaciamiento">

    </tbody>
  </table>
</div>  
  
@stop  

