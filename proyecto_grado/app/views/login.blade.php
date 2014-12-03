@extends('cuerpo')

@section('contenido-principal')
<div class="container-login"> 
    <section id="content"> 
        <form id="formulario-login" action=""> 
            <h1>Cuenta de Usuario</h1> 
            <div> 
                 <li> 
                    <label>Usuario: </label>
                    <input type="text"  required="" id="username"/> 
                    <span class="form-required" title="Este campo es obligatorio.">*</span>
                </li>  
            </div> 
            <div> 
                <li>
                <label>Contraseña: </label> 
                    <input type="password" required="" id="password"> 
                    <span class="form-required" title="Este campo es obligatorio.">*</span>
                </li>
            </div> 
            <div class="caja-login"><a href="contrasena">Olvido su contraseña?</a></div>
            <div> <input type="submit" value="Ingresar"></div> 
        </form>
    </section>
</div>            
@stop
