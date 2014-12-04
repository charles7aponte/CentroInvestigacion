<?php

Route::get('/', function()
{
	return View::make('cuerpo');
});

Route::get('login', function()
{
	return View::make('login');
});

Route::get('contrasena', function()
{
	return View::make('olvido_clave');
});



/******************-------------------------
pagina del administrador--------------------
***************/
Route::get('administrador', function()
{
	return View::make('administrador/panel_admin');
});

/*formularios*/
Route::get('formulariogrupos', function()
{
	return View::make('administrador/formulario_grupos');
});

Route::get('formulariotipogrupo', function()
{
	return View::make('administrador/formulario_tipogrupos');
});

Route::get('formulariolineas', function()
{
	return View::make('administrador/formulario_lineas');
});

Route::get('formulariosublineas', function()
{
	return View::make('administrador/formulario_sublineas');
});

Route::get('formularioconvocatorias', function()
{
	return View::make('administrador/formulario_convocatorias');
});

Route::get('formularioproyectos', function()
{
	return View::make('administrador/formulario_proyectos');
});

Route::get('formularioentidades', function()
{
	return View::make('administrador/formulario_empresas');
});

Route::get('formularioproductos', function()
{
	return View::make('administrador/formulario_productos');
});

Route::get('formulariofinanciamiento', function()
{
	return View::make('administrador/formulario_financiamiento');
});


/*listas de cada tema*/
Route::get('listadegrupos', function()
{
	return View::make('administrador/lista_grupos');
});
Route::get('listadeconvocatorias', function()
{
	return View::make('administrador/lista_convocatorias');
});

Route::get('listadelineas', function()
{
	return View::make('administrador/lista_lineas');
});

Route::get('listadesublineas', function()
{
	return View::make('administrador/lista_sublineas');
});

Route::get('listadeproductos', function()
{
	return View::make('administrador/lista_productos');
});

/*principales por tema*/
Route::get('grupos', function()
{
	return View::make('inf_grupos');
});

Route::get('convocatoria', function()
{
	return View::make('inf_convocatorias');
});





/***************
*** consultas de tipo json
****************/
Route::get('usuarios/{nombre}',function($nombre){

$personas= Persona::all();

$personas= array(
	array("cedula"=>124243, "apellido1"=>"galgo",   "nombre1"=>"algo..." , "apellido2"=>"algo...33" ,"nombre2"=>"minombre2"),
	array("cedula"=>124241, "apellido1"=>"galgo2",  "nombre1"=>"algo...1", "apellido2"=>"algo...33" ,"nombre2"=>"minombre2"),
	array("cedula"=>124242, "apellido1"=>"galgo3",  "nombre1"=>"algo...2", "apellido2"=>"algo...33" ,"nombre2"=>"minombre2"),
	);
	

	return Response::json($personas);

});


Route::get('login1',function(){
  // la función attempt se encarga automáticamente se hacer la encriptación de la clave para ser comparada con la que esta en la base de datos. 
   if (Auth::attempt( array('cedula' => '1', 'clavep' => '123' ), true )){
  // if(true){
   	
  
        //return Redirect::to('inicio');
    	return "entro;";
    }else{
        //return Redirect::to('login')->with('mensaje_login', 'Ingreso invalido');
    	return "entro;";
    }
 
});