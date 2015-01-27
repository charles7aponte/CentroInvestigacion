<?php


/******************-------------------------
Paginas generales--------------------
***************/

Route::get('/', function() { return View::make('cuerpo'); });

Route::get('login','ControlLogin@login');

Route::get('login', function() { return View::make('login'); });

Route::get('contrasena', function() { return View::make('olvido_clave'); });



/*************************************************************************************************-------------------------
--------------------------------------------paginas del administrador----------------------------------
*********************************************************************************************************************************/
Route::get('administrador', function() { return View::make('administrador/panel_admin'); });

/*--------------formularios-----------------*/

//----------------crear grupo
Route::get('formulariogrupos','ControlGrupos@cargarFormularioNuevoGrupo');

//----------------crear sublinea
Route::get('formulariosublineas','ControlSublineas@cargarFormularioNuevaSublinea');

//----------------crear subtipo de producto
Route::get('formulariosubtipoproductos','ControlSubtipoProductos@cargarFormularioSubtipoProducto');
//eliminar subtipo producto
Route::get('formulariosubtipoproductos/eliminar/{id}','ControlSubtipoProductos@EliminarFormularioSubtipoProducto');

//----------------agregar tipo grupos
Route::get('formulariotipogrupo','ControlTipoGrupos@cargarFormularioTipoGrupo');
//eliminar tipo grupos
Route::get('formulariotipogrupo/eliminar/{id}','ControlTipoGrupos@EliminarFormularioTipoGrupo');

//----------------agregar tipo productos
Route::get('formulariotipoproductos', 'ControlTipoProductos@cargarFormularioTipoProducto');
//eliminar tipo productos
Route::get('formulariotipoproductos/eliminar/{id}','ControlTipoProductos@EliminarFormularioTipoProducto');



Route::get('formulariolineas', function() { return View::make('administrador/formulario_lineas'); });

Route::get('formularioconvocatorias', function() { return View::make('administrador/formulario_convocatorias');});

Route::get('formularioproyectos', function() { return View::make('administrador/formulario_proyectos');});

Route::get('formularioentidades', function() { return View::make('administrador/formulario_empresas');});

Route::get('formularioproductos', function() { return View::make('administrador/formulario_productos');});

Route::get('formulariofinanciamiento', function() { return View::make('administrador/formulario_financiamiento');});

Route::get('formularioinvestigadores', function() { return View::make('administrador/formulario_investigadores');});

/*--------------------principales por tema-------------------*/
Route::get('grupos', function() {return View::make('inf_grupos');});

Route::get('convocatoria', function() {return View::make('inf_convocatorias');});

Route::get('lineas', function() {return View::make('inf_lineas');});




Route::get('personas', function() {return View::make('info_personas');});


/***********   Creacion de formularios (almacenando en la bd) -----------
-----------------------
********************/
Route::post('creacion/formularioempresas', 'ControlEntidades@CrearFormulario');

Route::post('creacion/formularioconvocatorias', 'ControlConvocatorias@CrearFormulario');

//creacion de productos
Route::post('creacion/formulariotipoproductos', 'ControlTipoProductos@CrearFormulario');

Route::post('creacion/formulariosubtipoproductos', 'ControlSubtipoProductos@CrearFormulario');

//creacion de grupos
Route::post('creacion/formulariogrupos', 'ControlGrupos@CrearFormulario');

Route::post('creacion/formulariotipogrupos', 'ControlTipoGrupos@CrearFormulario');

Route::post('creacion/formulariolineas', 'ControlLineas@CrearFormulario');

Route::post('creacion/formulariosublineas', 'ControlSublineas@CrearFormulario');


/*-------------listas de cada tema-------------*/
Route::get('listadegruposinv', function() { return View::make('administrador/lista_grupos_inv');});

Route::get('listadegruposestudio', function() { return View::make('administrador/lista_grupos_estudio');});

Route::get('listadeconvocatorias', function() { return View::make('administrador/lista_convocatorias');});

Route::get('listadelineas', function() { return View::make('administrador/lista_lineas');});

Route::get('listadesublineas', function() { return View::make('administrador/lista_sublineas');});

Route::get('listadeproductos', function() {return View::make('administrador/lista_productos');});

Route::get('listadeempresas', function() {return View::make('administrador/lista_empresas');});

Route::get('listadeproyectos', function() {return View::make('administrador/lista_proyectos');});

/*********** creacion de servicios 
*************
****************/
//Route::get('servicios/personas/{nombre}/','ControlPersona@getPersonaByName');
Route::get('servicios/personas/{nombre}/','ControlPersona@getPersonaByName');






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


      $userdata = array(
 
            'username' => "g1",
            'password'=> "12"
 
        ); 
 
        //si los datos son correctos y existe un usuario con los mismos se inicia sesión
        //y redirigimos a la home
        if(Auth::attempt($userdata, true))
        {
 
            return "entro";
 
        }else{
            //en caso contrario mostramos un error
            return "no ...";
 
        }

});


Route::get('gua', function(){
  $s1 = new Usuarios1();
  $s1->username="g1";
  $s1->password=Hash::make("12");
  $s1->name="g1";
  $s1->email="@1";

  $s1->save();

});
