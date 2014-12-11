@extends('administrador.panel_admin')

@section('cuerpo')
<div>  



    <form id="form-empresas" autocomplete="on"   action="{{URL::to('creacion/formularioempresas')}}" method="post">
      

  

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



        <div id="titulo"><h2><img alt="new" src="images/nuevo.png" width="16" height="16" />Agregar nueva empresa</h2></div>
        
            <ul>
                <fieldset> 
                    <li
                    class="@if($errors->has('nit-entidad')) has-error @endif"
                    ><label for="nit-entidad">Nit de la entidad:</label>
                        <input type="text" id="nit-entidad" name="nit-entidad" value="{{Input::old('nit-entidad')}}" required="required"/> 
                          @if ($errors->has('nit-entidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nit-entidad') }}</p> @endif
                          

                    </li>   
                    <li
                    class="@if($errors->has('nombre-entidad')) has-error @endif"
                    ><label for="nombre-entidad">Nombre de la entidad:</label>
                        <input type="text" id="nombre-entidad" name="nombre-entidad" value="{{Input::old('nombre-entidad')}}" required="required"/> 
                          @if ($errors->has('nombre-entidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('nombre-entidad') }}</p> @endif
                        
                    </li> 
                    
                    <li
                    class="@if($errors->has('representante-entidad')) has-error @endif"
                    ><label for="representante-entidad">Representante legal:</label>
                        <input type="text" id="representante-entidad" name="representante-entidad" value="{{Input::old('representante-entidad')}}" required="required"/> 
                          @if ($errors->has('representante-entidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('representante-entidad') }}</p> @endif
                        
                    </li> 
                    
                    <li
                    class="@if($errors->has('tipo-entidad')) has-error @endif"
                    ><label for="tipo-entidad">Tipo empresa:</label>
                        <input type="text" id="tipo-entidad" name="tipo-entidad" value="{{Input::old('tipo-entidad')}}" required="required"/> 
                          @if ($errors->has('tipo-entidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('tipo-entidad') }}</p> @endif
                        
                    </li>
                    
                    <li
                    class="@if($errors->has('desc-entidad')) has-error @endif"
                    ><label for="desc-empresa">Descripci&oacute;n:</label>
                        <textarea id="desc-empresa" name="desc-empresa">{{Input::old('desc-empresa')}}</textarea>
                          @if ($errors->has('desc-entidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('desc-entidad') }}</p> @endif
                        
                    </li>
                </fieldset>
            </ul>
                
            <ul>
                <fieldset>
                    <li
                      class ="@if($errors->has('email-entidad')) has-error @endif"><label for="email-entidad">Email:</label>
                        <input type="email" id="email-entidad" name="email-entidad" value="{{Input::old('email-entidad')}}" required="required"/> 
                       
                        @if ($errors->has('email-entidad')) <p class="help-block">{{ $errors->first('email-entidad') }}</p> @endif
                        

                    </li>  
                     
                    <li
                    class="@if($errors->has('pagina-entidad')) has-error @endif"
                    ><label for="pagina-entidad">P&aacute;gina web:</label>
                        <input type="text" id="pagina-entidad" name="pagina-entidad" value="{{Input::old('pagina-entidad')}}"/> 
                          @if ($errors->has('pagina-entidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('pagina-entidad') }}</p> @endif
                        
                    </li> 
                    
                    <li
                    class="@if($errors->has('telefono-entidad')) has-error @endif"
                    ><label for="telefono-entidad">Tel&eacute;fono:</label>
                        <input type="text" id="telefono-entidad" name="telefono-entidad" value="{{Input::old('telefono-entidad')}}"/> 
                          @if ($errors->has('telefono-entidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('telefono-entidad') }}</p> @endif
                        
                    </li>
                    
                    <li
                    class="@if($errors->has('celular-entidad')) has-error @endif"
                    ><label for="celular-entidad">Celular:</label>
                        <input type="text" id="celular-entidad" name="celular-entidad" value="{{Input::old('celular-entidad')}}"/> 
                          @if ($errors->has('celular-entidad')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('celular-entidad') }}</p> @endif
                        
                    </li>  
     
                </fieldset> 
            </ul>   

            <table id="botones-formularios">
                <thead>
                    <th id="crear">
                        <button id="crear-empresa" type="submit" class="submit-button">
                        <img alt="bien"  src="images/bn.png" width="16" height="16" />
                        Crear empresa
                        </button>
                    </th>
                    <th id="borrar">
                        <button id="reset-button" type="reset">
                        <img alt="mal" src="images/ml.png" width="16" height="16" />
                        Borrar todo
                    </th>
                </thead>
            </table>  
    </form>    



  
</div>  
@stop    