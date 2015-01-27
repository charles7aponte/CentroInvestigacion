
@extends('administrador.panel_admin')

@section('css-nuevos')
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('javascript-nuevos2')
  
<script type="text/javascript" src="{{URL::to('/js')}}/js-infgrupos.js"></script>
@stop


@section('cuerpo')

<div id="capa" class="infgrupos">
    <fieldset id="principal">
            <div id="titulo-infgrupos" id="cuadro"> 
                <h2>Grupo Investigacion Macrypt<img src="images/macrypt.jpg"></th></h2>
            </div>

            <table class="tabla-infgrupos">
            
                <thead>    
                    <tr>
                        <th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
                          background: -webkit-linear-gradient(top,#286388,#122d3e);
                          background: -moz-linear-gradient(top,#286388,#122d3e);
                          background: -o-linear-gradient(top,#286388,#122d3e);  
                          background: linear-gradient(to bottom,#286388,#122d3e);  
                          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Datos B&aacute;sicos
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <th id="fil-principal">A&ntilde;o de Creaci&oacute;n</th>
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
                        <th id="fil-principal">Descripci&oacute;n</th>
                        <td id="col-principal" id="cuadro">grupo horientado a la aplicaciones libresffffffffffffff rffffffffffffffffffffffff ffffffffffffff ddddddddddddddd ssssssssssssss ssssssssss dddddddddddddddddddddddddddd sssssssssssssssssss</td>  
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Email</th>
                        <td id="col-principal" id="cuadro">xxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                    </tr>
        
                    <tr>
                        <th id="fil-principal">Tel&eacute;fono</th>
                        <td id="col-principal" id="cuadro">555555555</td>
                    </tr>

                    <tr>
                        <th id="fil-principal">P&aacute;gina Web</th>
                        <td id="col-principal" id="cuadro"><a href="#">paginaweb@hotmail.ccom</a></td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Ruta Afiche</th>
                        <td id="col-principal" id="cuadro"><a href="#">paginaweb@hotmail.ccom</a></td>
                    </tr>

                    <tr>
                        <th id="fil-principal">Direcci&oacute;n Grupo</th>
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
                <fieldset id="secundario">
                <div class="titulo-listas" id="cuadro">             
                 <h4 id="boton_integrantes" ><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Integrantes</a></h4>
                </div> 
                    <div id="lista_integrantes" class="lista-grupos">
                            <ul class="galeria-grupos">
                                <li class="glyphicon glyphicon-ok"><a href="#">Profesores</a>
                                    <a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                                </li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Estudiantes</a>
                                    <a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Never ending gallery</a>
                                    <a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                            </ul>
                    </div>
                </fieldset> 
                <fieldset id="secundario">
                    <div class="titulo-listas" id="cuadro">
                     <h4 id="boton_productos"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Productos</a></h4>
                    </div>
                        <div id="lista_productos" class="lista-grupos">
                            <ul class="galeria-grupos">
                                <li class="glyphicon glyphicon-ok"><a href="#">Ponencias</a><a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Articulos</a><a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Revistas</a><a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Conferencias</a><a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                                <li class="glyphicon glyphicon-ok"><a href="#">Sotfware</a><a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                            </ul>
                        </div>
                </fieldset>
                <fieldset id="secundario">
                    <div class="titulo-listas" id="cuadro">
                        <h4 id="boton_lineas" style= "width:244px;"><li class="glyphicon glyphicon-plus-sign"></li><li class="glyphicon glyphicon-minus-sign"></li><a href="#" onclick="return false">Lineas de Investigacion</a></h4>
                    </div>
                    <div id="lista_lineas" class="lista-grupos">
                        <ul class="galeria-grupos ">
                            <li class="glyphicon glyphicon-ok"><a href="#">Ingenieria de Sotfware</a><a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                            <li class="glyphicon glyphicon-ok"><a href="#">Teleinformatica</a><a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                            <li class="glyphicon glyphicon-ok"><a href="#">Automatizaci&oacute;n</a><a href="#" class="button editar"><span class="glyphicon glyphicon-pencil"></span>Editar</a></li>
                        </ul>
                    </div>
                </fieldset>
            </div>  
        </div>  
</div>

@stop