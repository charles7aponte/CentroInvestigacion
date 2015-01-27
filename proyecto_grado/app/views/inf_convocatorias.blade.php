@extends('administrador.panel_admin')
@section('css-nuevos')
<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_infconvocatorias.css" />
@stop


@section('javascript-nuevos2')
<script type="text/javascript" src="{{URL::to('/js')}}/js-infconvocatoria.js"></script>
@stop



@section('cuerpo')

<div id="capa" class="infoconvocatoria">
    <fieldset id="principal">
        <div id="titulo-infconv" id="cuadro"> 
            <h2>Este es el titulo de la convocatoria numero uno de la ciudad de villavicencion de la universidad de los
            </h2>
        </div>

        <table class="tabla-infconvocatorias">

            <thead>   
             <tr>
                <th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
              background: -webkit-linear-gradient(top,#286388,#122d3e);
              background: -moz-linear-gradient(top,#286388,#122d3e);
              background: -o-linear-gradient(top,#286388,#122d3e);  
              background: linear-gradient(to bottom,#286388,#122d3e);  
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white; ">Informacion de la Convocatoria</th>
             </tr>
            </thead>

            <tbody>

                <tr>
                    <th id="fil-principal">N&uacute;mero</th>
                    <td  class="numero" id="col-principal" id="cuadro"></td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Estado</th>
                    <td class="estado" id="col-principal" id="cuadro"></td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Descripci&oacute;n</th>
                    <td class="descripcion" id="col-principal" id="cuadro">Facultad de ciencias basicas e ingenieria</td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Dirigida a</th>
                    <td class="dirigida" id="col-principal" id="cuadro">D</td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Fecha Apertura</th>
                    <td class="fecha-apertura" id="col-principal" id="cuadro">grupo horientado a la aplicaciones libresffffffffffffff rffffffffffffffffffffffff ffffffffffffff ddddddddddddddd ssssssssssssss ssssssssss dddddddddddddddddddddddddddd sssssssssssssssssss</td>  
                </tr>
        
                <tr>
                    <th id="fil-principal">Fecha Cierre</th>
                    <td class="fecha-cierre" id="col-principal" id="cuadro">xxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                </tr>
        
                <tr>
                    <th id="fil-principal">Contacto de la Convocatoria</th>
                    <td class="email" id="col-principal" id="cuadro">555555555</td>
                </tr>

                <tr>
                    <th id="fil-principal">Tel&eacute;fono</th>
                    <td class="telefono" id="col-principal" id="cuadro">rggrrggggggggggggdefffffffffffffffffffffffffffffffffffff</td>
                </tr>

                <tr>
                    <th id="fil-principal">P&aacute;gina Web</th>
                    <td class="pagina-conv" id="col-principal" id="cuadro">deeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee</td>
                </tr>

                <tr>
                    <th id="fil-principal">Documento de la Convocatoria</th>
                    <td class="documento-conv" id="col-principal" id="cuadro">wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</td>
                </tr>

                <tr>
                    <th id="fil-principal">Cuant&iacute;a</th>
                    <td class="cuantia" id="col-principal" id="cuadro">ddddddddddddddddddddddddddddddddddddddddddddddddddddddd</td>
                </tr>

            </tbody>
        </table>
    </fieldset>

        <!-- tabla de proyectos-->
    
    <fieldset id="secundario">
        <div class="titulo-conv1" id="cuadro"> 
            <h2 id="boton_aprobados"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li>Aprobados</h2>
        </div>
        <table id="tabla_aprobados" class="tabla-conv">
            <thead>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>Efectivo</td>
                    <td>Especie</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th id="f-principal">Proyecto1</th>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                </tr>
                <tr>
                    <th id="f-principal">Proyecto3</th>
                    <td id="c-principal" id="cuadro">ffrrff</td>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                </tr>
            </tbody>
        </table>
    </fieldset>

    <fieldset id="secundario">
        <div class="titulo-conv1" id="cuadro"> 
            <h2 id="boton_rechazados"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li>Rechazados</h2>
        </div>
        <table id="tabla_rechazados" class="tabla-conv">
            <thead>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>Efectivo</td>
                    <td>Especie</td>
                </tr>
            </thead>
            <tbody>
                 <tr>
                    <th id="f-principal">Proyecto2</th>
                    <td id="c-principal" id="cuadro">ffrrff</td>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                </tr>

                <tr>
                    <th id="f-principal">Proyecto3</th>
                    <td id="c-principal" id="cuadro">ffrrff</td>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                    <td id="c-principal" id="cuadro">2222vfff</td>
                </tr>
            </tbody>
        </table> 
    </fieldset>

    <fieldset id="secundario">
        <div class="titulo-conv1" id="cuadro"> 
            <h2 id="boton_evaluacion"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li>Evaluacion</h2>
        </div> 

            <table id="tabla_evaluacion" class="tabla-conv">
                <thead>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>Efectivo</td>
                        <td>Especie</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th id="f-principal">Proyecto3</th>
                        <td id="c-principal" id="cuadro">ffrrff</td>
                        <td id="c-principal" id="cuadro">2222vfff</td>
                        <td id="c-principal" id="cuadro">2222vfff</td>
                    </tr>
                    <tr>
                        <th id="f-principal">Proyecto3</th>
                        <td id="c-principal" id="cuadro">ffrrff</td>
                        <td id="c-principal" id="cuadro">2222vfff</td>
                        <td id="c-principal" id="cuadro">2222vfff</td>
                    </tr>
                </tbody>
            </table>
    </fieldset>
</div>       

@stop