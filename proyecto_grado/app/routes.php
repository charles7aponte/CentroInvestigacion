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

/*--------------formularios-----------------
----------------------------*/

//----------------crear grupo
Route::get('formulariogrupos','ControlGrupos@cargarFormularioGrupo');

//----------------crear sublinea
Route::get('formulariosublineas','ControlSublineas@cargarFormularioNuevaSublinea');
//----------------eliminar sublineas
Route::get('formulariosublineas/eliminar/{id}','ControlSublineas@EliminarFormularioSublinea');


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


//----------------agregar proyectos
Route::get('formularioproyectos', 'ControlProyectos@cargarFormularioProyectos');

Route::get('formulariofinanciamiento', 'ControlFinanciamiento@cargarFormularioFinanciamiento');

Route::get('formularioperiodosacademicos','ControlPeriodosAcademicos@cargarFormularioPeriodo');
//-------------eliminar periodos
Route::get('formularioperiodosacademicos/eliminar/{id}','ControlPeriodosAcademicos@EliminarFormularioPeriodo');

//----------------eliminar proyectos


//----------------agregar productos
Route::get('formularioproductos', 'ControlProductos@cargarFormularioProductos');

Route::get('formularioinvestigadores','ControlInvestigadores@cargarFormularioInvestigadores');


//............................................................................................................./
//----------------crear lineas

Route::get('formulariolineas', function() { return View::make('administrador/formulario_lineas'); });
//----------------eliminar lineas
Route::get('formulariolineas/eliminar/{id}','ControlLineas@EliminarFormularioLinea');

//---------------crear convocatorias
Route::get('formularioconvocatorias', function() { return View::make('administrador/formulario_convocatorias');}); // 

Route::get('formularioeventosnoticias', function() { return View::make('administrador/formulario_eventos_noticias');});



//--------------rutas formularios editados // a que se debe ese problema al guardar??
Route::get('formularioconvocatorias/edit/{id}','ControlConvocatorias@cargarEditar');


/*--------------------principales por tema -----------------
---------------------------------------*/
Route::get('grupo/id/{id_grupo}','ControlInfoGrupos@CargarInfoPrincipales');

Route::get('convocatoria/id/{id_conv}','ControlInfoConvocatorias@CargarInfoPrincipales');

Route::get('linea/id/{id_linea}','ControlInfoLineas@CargarInfoPrincipales');

Route::get('producto/id/{id_producto}','ControlInfoProductos@CargarInfoPrincipales');

Route::get('proyecto/id/{id_proyecto}','ControlInfoProyectos@CargarInfoPrincipales');

Route::get('personas', function() {return View::make('inf_personas');});



/***********   Creacion de formularios (almacenando en la bd) -----------
-----------------------*/


Route::post('creacion/formularioconvocatorias', 'ControlConvocatorias@CrearFormulario');

//creacion de productos
Route::post('creacion/formulariotipoproductos', 'ControlTipoProductos@CrearFormulario');

Route::post('creacion/formulariotipoproductos', 'ControlTipoProductos@CrearFormulario');

Route::post('creacion/formulariosubtipoproductos', 'ControlSubtipoProductos@CrearFormulario');

//creacion de grupos
Route::post('creacion/formulariogrupos', 'ControlGrupos@CrearFormulario');

Route::post('creacion/formulariotipogrupos', 'ControlTipoGrupos@CrearFormulario');

Route::post('creacion/formulariolineas', 'ControlLineas@CrearFormulario');

Route::post('creacion/formulariosublineas', 'ControlSublineas@CrearFormulario');

//creacion proyectos y financiamientos

Route::post('creacion/formularioproyectos', 'ControlProyectos@CrearFormulario');

Route::post('creacion/formularioproductos', 'ControlProductos@CrearFormulario');

Route::post('creacion/formulariofinanciamiento', 'ControlFinanciamiento@CrearFormulario');

Route::post('creacion/formularioinvestigadores', 'ControlInvestigadores@CrearFormulario');

Route::post('creacion/formularioeventosnoticias', 'ControlEventosNoticias@CrearFormulario');

Route::post('creacion/formularioperiodosacademicos', 'ControlPeriodosAcademicos@CrearFormulario');

// creacion editar de los formularios

Route::post('edicion/formularioconvocatorias','ControlConvocatorias@guardarEdicion'); // en post si quedaria asi? si hermosa :) voy a mirar con la ruta del get



/**********-------------listas de cada tema -------------
----------------------------------------------------------------------
*********************/

Route::get('listadegrupos','ControlListas@ConstruirListaGrupos');

Route::get('listadeconvocatorias','ControlListas@ConstruirListaConvocatorias');

Route::get('listadelineas','ControlListas@ConstruirListaLineas');

Route::get('listadesublineas','ControlListas@ConstruirListaSublineas');

Route::get('listadeproductos','ControlListas@ConstruirListaProductos');

Route::get('listadeempresas','ControlListas@ConstruirListaEmpresas');

Route::get('listadeproyectos','ControlListas@ConstruirListaProyectos');

Route::get('listafinanciamiento', function() {return View::make('administrador/lista_financiamiento');});



/***********--------------------------------- creacion de servicios (modales integrantes, lineas, proyecto, producto)
*************----------------**/

//Route::get('servicios/personas/{nombre}/','ControlPersona@getPersonaByName');

//Grupos
Route::get('servicios/personas/{nombre}/','ControlPersona@buscarPersonaPorNombre');

Route::get('servicios/lineas/{nombre}/','ControlLineas@buscarlineaPorNombre');

//financiamiento
Route::get('servicios/financiados/{nombre}/','ControlProyectos@buscarProyectoPorNombre');

//Productos
Route::get('servicios/persona_grupo/{nombre}/','ControlProductos@buscarPersonasPorNombre');

//Proyectos


//financiamiento
Route::get('servicios/financiamientoPorProyecto/{nombre}/','ControlFinanciamiento@financiamientoPorProyecto');



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
