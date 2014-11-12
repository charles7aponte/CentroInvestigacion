<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('cuerpo');
});

Route::get('administrador', function()
{
	return View::make('panel_admin');
});
Route::get('formulariogrupos', function()
{
	return View::make('formulario_grupos');
});

Route::get('grupos', function()
{
	return View::make('grupos');
});

//Route::get('');
