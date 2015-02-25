@extends('administrador.panel_admin')
@section('css-nuevos')
<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('/css')}}/estilo_temasprincipales.css" />
@stop

@section('cuerpo')
<fieldset id="marco-persona">
    <div id="capa" class="infpersonas">
        <fieldset id="principal">
            <table id="encabezado-persona">
                <tbody>
                    <tr>
                        <th style="background:none;">
                            <div id="foto-persona">
                              <img  src="images/macrypt.jpg">  
                            </div> 
                        </th> 
                        <th style="background:none;">
                            <div  class="talkbubble" id="cuadro"  style="box-shadow: 8px 8px 5px #BDBDBD;"> 
                                <h1 id="nombre-persona">Felipe Andres Corredor Chavarro</h1>  
                            </div>  
                        </th> 
                    </tr>
                </tbody>
            </table>

    		<table class="tabla-infpersonas">
                
                    <thead>    
                        <tr>
                            <th scope="col" colspan="2" style=" border-radius: 5px; background: #286388;
                              background: -webkit-linear-gradient(top,#286388,#122d3e);
                              background: -moz-linear-gradient(top,#286388,#122d3e);
                              background: -o-linear-gradient(top,#286388,#122d3e);  
                              background: linear-gradient(to bottom,#286388,#122d3e);  
                              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#286388, endColorstr=#122d3e);); color:white;">Informaci&oacute;n Basica</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th id="fil-principal">Nombre Completo</th>
                            <td id="col-principal" id="cuadro">frddedsswwssdeeddfrgt</td>
                        </tr>

                         <tr>
                            <th id="fil-principal">C&eacute;dula</th>
                            <td id="col-principal" id="cuadro">2221111111</td>
                        </tr>

                         <tr>
                            <th id="fil-principal">Perfil</th>
                            <td id="col-principal" id="cuadro">Felipe Corredor</td>
                        </tr>
            
                        <tr>
                            <th id="fil-principal">Direcci&oacute;n</th>
                            <td id="col-principal" id="cuadro">Felipe Corredor</td>
                        </tr>
            
                        <tr>
                            <th id="fil-principal">Tel&eacute;fono</th>
                            <td id="col-principal" id="cuadro">jjdfjjeifjeifjeij cjeijfijeiji</td>
                        </tr>
            
                        <tr>
                            <th id="fil-principal">Celular</th>
                            <td id="col-principal" id="cuadro">D</td>
                        </tr>
            
                        <tr>
                            <th id="fil-principal">Email</th>
                            <td id="col-principal" id="cuadro">grupo horientado a la aplicaciones libresffffffffffffff rffffffffffffffffffffffff ffffffffffffff ddddddddddddddd ssssssssssssss ssssssssss dddddddddddddddddddddddddddd sssssssssssssssssss</td>  
                        </tr>
                    </tbody>
        	</table> 

                        <table class="tabla-infpersonas">
                
                    <thead>    
                        <tr>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th id="fil-principal">Nombre Completo</th>
                            <td id="col-principal" id="cuadro">frddedsswwssdeeddfrgt</td>
                        </tr>

                         <tr>
                            <th id="fil-principal">C&eacute;dula</th>
                            <td id="col-principal" id="cuadro">2221111111</td>
                        </tr>

                         <tr>
                            <th id="fil-principal">Perfil</th>
                            <td id="col-principal" id="cuadro">Felipe Corredor</td>
                        </tr>
                    </tbody>
            </table> 
        </fieldset>		    
    </div>  
</fieldset>
@stop