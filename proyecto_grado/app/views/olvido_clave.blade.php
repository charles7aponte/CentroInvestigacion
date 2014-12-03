@extends('cuerpo')

@section('contenido-principal')
<div class="container-login"> 
    <section id="content"> 
        <form id="formulario-login" action=""> 
            <h1>Solicitar Contraseña</h1> 
            <div>
            	<li>
                <label>Correo electronico:</label>
                	<input type="email" required="" id="email" /> 
                	<span class="form-required" title="Este campo es obligatorio.">*</span>
                </li>
            </div> 
            <div class="caja-login"><a href="login">Recordo su contraseña?</a></div>
            <div> <input type="submit" value="Nueva Contraseña" /> </div> 
        </form>
    </section>
</div>            
@stop