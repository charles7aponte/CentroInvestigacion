@extends('cuerpo')

@section('contenido-principal')
<div class="container-login"> 
    <section id="content"> 
        <form action=""> 
            <h1>Solicitar Contraseña</h1> 
            <div> 
                Correo electronico: <input type="email" required="" id="email" /> 
                <span class="form-required" title="Este campo es obligatorio.">*</span>
            </div> 
            <div class="caja-login"><a href="login">Recordo su contraseña?</a></div>
            <div> <input type="submit" value="Nueva Contraseña" /> </div> 
        </form>
    </section>
</div>            
@stop