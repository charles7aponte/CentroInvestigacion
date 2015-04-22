@extends('panel_cuerpo')

@section('contenido-principal')
<div class="container-login"> 
    <section id="content"> 


           @if(Session::has('mensaje_error') || Session::has('mensaje_success') )
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



        <form id="formulario-login" action="{{URL::to('inicio_sesion')}}" method="POST"> 
            <h1>Cuenta de Usuario</h1> 
            <div> 
                 <li> 
                    <label>Usuario: </label>
                    <input type="text"  required="" id="username" name="cedula"
                    value="{{Input::old('cedula')!=null?Input::old('cedula'):''}}"/> 
                    <span class="form-required" title="Este campo es obligatorio.">*</span>

                        @if ($errors->has('cedula')) <p  style="margin-left: 169px;" class="help-block">{{ $errors->first('cedula') }}</p> @endif
                </li>  
            </div> 
            <div> 
                <li>
                <label>Contraseña: </label> 
                    <input type="password" required="" id="password" name="pass"
                    value=""> 
                    <span class="form-required" title="Este campo es obligatorio.">*</span>
                        


                </li>
            </div> 
            <div class="caja-login"><a href="contrasena">Olvido su contraseña?</a></div>
            <div> <input type="submit" value="Ingresar"></div> 
        </form>
    </section>
</div>            
@stop
