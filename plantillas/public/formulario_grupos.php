<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML5 Contact Form</title>
    <link rel="stylesheet" media="screen" href="css/estilo_formulariogrupos.css" >
</head>
<body>
	<h2>Agregar un nuevo grupo</h2>

	<div>  
            <ul>  
                <li>  
                    <span class="required_notification">* Datos requeridos</span>  
                </li>  
                <li>  
                    <label for="name">Nombre del grupo:</label>  
                    <input type="text" required />  
                </li>   
                <li>
                	<label for="tipo-grupo">Tipo Grupo: </label>  
				    <select id="tipo-grupo">  
				        <option value="inv">Investigaci&oacute;n</option>
				        <option value="estudio">Estudio</option>    
				    </select> 
                </li>
                <li>  
                    <label for="coord">Coordinador:</label>  
                    <input type="text" name="coordinador">   
                </li>  
                <li>  
                    <label for="website">Sitio web:</label>  
                    <input type="url" name="website" required pattern="(http|https)://.+" />   
                </li>   
                <li>  
                    <button class="submit" type="submit">Enviar mensaje</button>  
                </li>  
            </ul>  
        </div>  


</body>
</html>