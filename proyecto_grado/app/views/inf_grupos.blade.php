
@extends('administrador.panel_admin')

@section('css-nuevos')
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_infgrupos.css" />
@stop

@section('javascript-nuevos2')
  
 <script type="text/javascript" src="{{URL::to('/js')}}/js-infgrupos.js"></script>
@stop


@section('cuerpo')

<div id="capa">
    <form id="form-grupos">
        <fieldset>
            <div id="titulo-infgrupos" id="cuadro"> 
                <h2>Grupo Investigacion Macrypt<img src="images/macrypt.jpg"></th></h2>
            </div>

            <table class="tabla-infgrupos">
            
                <thead>    
                    <tr>
                        <th scope="col" colspan="2">Datos Basicos</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <th id="fil-principal">Ano de Creacion</th>
                        <td id="col-principal" id="cuadro">31 de nov 2011</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Director Grupo</th>
                        <td id="col-principal" id="cuadro">Felipe Corredor</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Unidad Academica</th>
                        <td id="col-principal" id="cuadro">Facultad de ciencias basicas e ingenieria</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Categoria</th>
                        <td id="col-principal" id="cuadro">D</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Descripcion</th>
                        <td id="col-principal" id="cuadro">grupo horientado a la aplicaciones libresffffffffffffff rffffffffffffffffffffffff ffffffffffffff ddddddddddddddd ssssssssssssss ssssssssss dddddddddddddddddddddddddddd sssssssssssssssssss</td>  
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Email</th>
                        <td id="col-principal" id="cuadro">xxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Telefono</th>
                        <td id="col-principal" id="cuadro">555555555</td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Pagina Web</th>
                        <td id="col-principal" id="cuadro"><a href="#">paginaweb@hotmail.ccom</a></td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Ruta Afiche</th>
                        <td id="col-principal" id="cuadro"><a href="#">paginaweb@hotmail.ccom</a></td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Direccion Grupo</th>
                        <td id="col-principal" id="cuadro">ddddddddddddddddddddddddddddddddddddddddddddddddddddddd</td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Link gruplac</th>
                        <td id="col-principal" id="cuadro"><a href="#">paginaweb@hotmail.ccom</a></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>

        <!-- menus desplegables-->
                <fieldset>              
                 <h4 id="boton_integrantes" ><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#">Integrantes</a></h4>
                    <div id="lista_integrantes" class="lista-grupos">
                            <ul class="galeria-grupos">
                                <li class="glyphicon glyphicon-ok"><a href="#">Profesores</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Estudiantes</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Never ending gallery</a></li>
                            </ul>
                    </div>
                </fieldset> 
                <fieldset>
                     <h4 id="boton_productos"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#">Productos</a></h4>
                        <div id="lista_productos" class="lista-grupos">
                            <ul class="galeria-grupos">
                                <li class="glyphicon glyphicon-ok"><a href="#">Ponencias</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Articulos</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Revistas</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Conferencias</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Sotfware</a></li>
                            </ul>
                        </div>
                </fieldset>
                <fieldset>
                    <h4 id="boton_lineas"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#">Lineas de Investigacion</a></h4>
                    <div id="lista_lineas" class="lista-grupos">
                        <ul class="galeria-grupos ">
                            <li class="glyphicon glyphicon-ok"><a href="#">Ingenieria de Sotfware</a></li>
                            <li class="glyphicon glyphicon-ok"><a href="#">Teleinformatica</a></li>
                            <li class="glyphicon glyphicon-ok"><a href="#">Automatizacion</a></li>
                        </ul>
                    </div>
                </fieldset>
            </div>  
        </div>
    </form>    
</div>

@stop