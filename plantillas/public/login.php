<!DOCTYPE html> 
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]--> 
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]--> 
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]--> 
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]--> 
<head> 
<meta charset="utf-8"> 
<link rel="stylesheet" type="text/css" href="css/estilo_login.css" /> 
</head> 
<body> 
<div class="container-login"> 
    <section id="content"> 
        <form action=""> 
            <h1>Cuenta de Usuario</h1> 
            <div> 
                Usuario: <input type="text"  required="" id="username" /> 
                <span class="form-required" title="Este campo es obligatorio.">*</span>
            </div> 
            <div> 
                Contraseña: <input type="password" required="" id="password" /> 
                <span class="form-required" title="Este campo es obligatorio.">*</span>
            </div> 
            <div class="caja-login"><a href="olvido-clave.php">Olvido su contraseña?</a></div>
            <div> <input type="submit" value="Ingresar" /> </div> 
</body> 
</html>