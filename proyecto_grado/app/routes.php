<?php

/******************-------------------------
Paginas generales--------------------
***************/



Route::get('login', function() { return View::make('login'); });

Route::get('contrasena', function() { return View::make('olvido_clave'); });

//PAGINA PRINCIPAL
Route::get('/', 'ControlPaginaInicio@CrearPagina');
//Route::get('/', 'ControlPaginaInicio@CrearPaginaMenu');

//Route::get('/', function() { return View::make('contenido'); });



/********************************************************************************************************************************
-----------------------------------------PAGINAS DEL ADMINISTRADOR----------------------------------
*********************************************************************************************************************************/
Route::get('administrador', function() { return View::make('administrador/panel_admin'); });

/*--------------1-FORMULARIOS-----------------
**********************************************/
//slider
Route::get('formularioslider','ControlSlider@cargarFormularioSlider');

Route::post('creacion/formularioslider', 'ControlSlider@CrearFormulario');

Route::get('formularioslider/eliminar/{id}','ControlSlider@EliminarFormularioSlider');


/*---------------crear grupo------------------*/
Route::get('formulariogrupos','ControlGrupos@cargarFormularioGrupo');
/*---------------eliminar grupo----------------*/
Route::get('formulariogrupos/eliminar/{id}','ControlGrupos@EliminarFormularioGrupo');

Route::get('formulariounidadesacademicas','ControlUnidadesAcademicas@cargarFormularioUnidades');

/*---------------crear sublinea-----------------*/
Route::get('formulariosublineas','ControlSublineas@cargarFormularioNuevaSublinea');
/*---------------eliminar sublinea------------------*/
Route::get('formulariosublineas/eliminar/{id}','ControlSublineas@EliminarFormularioSublinea');


/*---------------crear subtipo producto------------------*/
Route::get('formulariosubtipoproductos','ControlSubtipoProductos@cargarFormularioSubtipoProducto');
/*---------------eliminar subtipo producto------------------*/
Route::get('formulariosubtipoproductos/eliminar/{id}','ControlSubtipoProductos@EliminarFormularioSubtipoProducto');


/*---------------crear tipo grupo------------------*/
Route::get('formulariotipogrupo','ControlTipoGrupos@cargarFormularioTipoGrupo');
/*---------------eliminar tipo grupo------------------*/
Route::get('formulariotipogrupo/eliminar/{id}','ControlTipoGrupos@EliminarFormularioTipoGrupo');


/*---------------agregar tipo producto-----------------*/
Route::get('formulariotipoproductos', 'ControlTipoProductos@cargarFormularioTipoProducto');
/*---------------eliminar tipo producto-----------------*/
Route::get('formulariotipoproductos/eliminar/{id}','ControlTipoProductos@EliminarFormularioTipoProducto');


/*---------------crear proyecto------------------*/
Route::get('formularioproyectos', 'ControlProyectos@cargarFormularioProyectos');
/*---------------eliminar proyecto------------------*/
Route::get('formularioproyectos/eliminar/{id}','ControlProyectos@EliminarFormularioProyecto');


/*---------------crear financiamiento------------------*/
Route::get('formulariofinanciamiento', 'ControlFinanciamiento@cargarFormularioFinanciamiento');
/*---------------eliminar financiamiento------------------*/
Route::get('formulariofinanciamiento/eliminar/{id}','ControlFinanciamiento@EliminarListaFinanciamiento');


/*---------------crear periodos academicos------------------*/
Route::get('formularioperiodosacademicos','ControlPeriodosAcademicos@cargarFormularioPeriodo');
/*---------------eliminar periodos academicos------------------*/
Route::get('formularioperiodosacademicos/eliminar/{id}','ControlPeriodosAcademicos@EliminarFormularioPeriodo');


/*---------------crear producto------------------*/
Route::get('formularioproductos', 'ControlProductos@cargarFormularioProductos');
/*---------------eliminar proyecto------------------*/
Route::get('formularioproductos/eliminar/{id}','ControlProductos@EliminarFormularioProducto');


/*---------------crear investigadores-----------------*/
Route::get('formularioinvestigadores','ControlInvestigadores@cargarFormularioInvestigadores');
/*---------------eliminar investigadores-----------------*/
Route::get('formularioinvestigadores/eliminar/{id}','ControlInvestigadores@EliminarFormularioInvestigadores');


/*---------------crear lineas------------------*/
Route::get('formulariolineas', 'ControlLineas@cargarFormularioLinea');
/*---------------eliminar lineas------------------*/
Route::get('formulariolineas/eliminar/{id}','ControlLineas@EliminarFormularioLinea');


//---------------crear convocatorias
Route::get('formularioconvocatorias', function() { return View::make('administrador/formulario_convocatorias');});  

/*---------------eliminar convocatorias------------------*/
Route::get('formularioconvocatorias/eliminar/{id}','ControlConvocatorias@EliminarFormularioConvocatoria');


/*---------------cerar eventos y noticias------------------*/

Route::get('formularioeventosnoticias', function() {return View::make('administrador/formulario_eventos_noticias');});
/*---------------eliminar eventos y noticias------------------*/
Route::get('formularioeventosnoticias/eliminar/{id}','ControlEventosNoticias@EliminarFormularioEventosNoticias');




//--------------rutas formularios editados----------------------------
Route::get('formularioconvocatorias/edit/{id}','ControlConvocatorias@cargarEditar');

Route::get('formulariolineas/edit/{id}','ControlLineas@cargarEditar');

Route::get('formulariosublineas/edit/{id}','ControlSublineas@cargarEditar');

Route::get('formularioeventosnoticias/edit/{id}','ControlEventosNoticias@cargarEditar');

Route::get('formulariogrupos/edit/{id}','ControlGrupos@cargarEditar');

Route::get('formularioproyectos/edit/{id}','ControlConvocatorias@cargarEditar');

//--------------eliminar de los modales del formulario grupos servicios de eliminar-------------------
Route::get('formulariogrupos/eliminarintegrante/{idgrupo}/{idintegrante}','ControlGrupos@EliminarIntegrantesGrupos');

Route::get('formulariogrupos/eliminarlinea/{idgrupo}/{idlinea}','ControlGrupos@EliminarlineaGrupos');

Route::get('formularioinvestigadores/edit/{id}','ControlInvestigadores@cargarEditar');

Route::get('formularioproyectos/edit/{id}','ControlProyectos@cargarEditar');
//--------------eliminar de los modales del formulario proyectos servicio de eliminar-------------------
Route::get('formularioproyectos/eliminarintegrante/{idproyecto}/{idintegrante}','ControlProyectos@EliminarIntegrantesProyectos');

Route::get('formulariofinanciamiento/edit/{id}','ControlFinanciamiento@cargarEditar');

Route::get('formularioproductos/edit/{id}','ControlProductos@cargarEditar');
//--------------eliminar de los modales del formulario productos-------------------
Route::get('formularioproductos/eliminarintegrante/{idproducto}/{idintegrante}','ControlProductos@EliminarIntegrantesProductos');



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

//creacion de unidades 
Route::post('creacion/formulariounidadesacademicas', 'ControlUnidadesAcademicas@CrearFormulario');

//creacion proyectos y financiamientos

Route::post('creacion/formularioproyectos', 'ControlProyectos@CrearFormulario');

Route::post('creacion/formularioproductos', 'ControlProductos@CrearFormulario');

Route::post('creacion/formulariofinanciamiento', 'ControlFinanciamiento@CrearFormulario');

Route::post('creacion/formularioinvestigadores', 'ControlInvestigadores@CrearFormulario');

Route::post('creacion/formularioeventosnoticias', 'ControlEventosNoticias@CrearFormulario');

Route::post('creacion/formularioperiodosacademicos', 'ControlPeriodosAcademicos@CrearFormulario');

// creacion editar de los formularios

Route::post('edicion/formularioconvocatorias','ControlConvocatorias@guardarEdicion'); 

Route::post('edicion/formulariolineas','ControlLineas@guardarEdicion'); 

Route::post('edicion/formulariosublineas','ControlSublineas@guardarEdicion'); 

Route::post('edicion/formularioeventosnoticias','ControlEventosNoticias@guardarEdicion');

Route::post('edicion/formulariogrupos','ControlGrupos@guardarEdicion');

Route::post('edicion/formularioinvestigadores','ControlInvestigadores@guardarEdicion');

Route::post('edicion/formularioproyectos','ControlProyectos@guardarEdicion');

Route::post('edicion/formulariofinanciamiento','ControlFinanciamiento@guardarEdicion');

Route::post('edicion/formularioproductos','ControlProductos@guardarEdicion');


/**********-------------listas de cada tema -------------
----------------------------------------------------------------------
*********************/

Route::get('listadegrupos','ControlListas@ConstruirListaGrupos');

Route::get('listaimageneslider','ControlListas@ConstruirListaSlider');

Route::get('listadeconvocatorias','ControlListas@ConstruirListaConvocatorias');
Route::get('listadeconvocatorias/find/{titulo?}','ControlListas@ConstruirListaConvocatorias');

Route::get('listadelineas','ControlListas@ConstruirListaLineas');

Route::get('listadesublineas','ControlListas@ConstruirListaSublineas');

Route::get('listadeproductos','ControlListas@ConstruirListaProductos');
Route::get('listadeproductos/find/{titulo?}','ControlListas@ConstruirListaProductos');

Route::get('listadeempresas','ControlListas@ConstruirListaEmpresas');

Route::get('listadeproyectos','ControlListas@ConstruirListaProyectos');
Route::get('listadeproyectos/find/{titulo?}','ControlListas@ConstruirListaProyectos');

Route::get('listafinanciamiento', function() {return View::make('administrador/lista_financiamiento');});

Route::get('listadeeventosynoticias','ControlListas@ConstruirListaEventosNoticias');

Route::get('listadeinvestigadores','ControlListas@ConstruirListaInvestigadores');


/*****************************************************************
**************************PRINCIPALES POR TEMA
*****************************************************************/
Route::get('grupo/id/{id_grupo}','ControlInfoGrupos@CargarInfoPrincipales');

Route::get('convocatoria/id/{id_conv}','ControlInfoConvocatorias@CargarInfoPrincipales');

Route::get('linea/id/{id_linea}','ControlInfoLineas@CargarInfoPrincipales');

Route::get('producto/id/{id_producto}','ControlInfoProductos@CargarInfoPrincipales');

Route::get('proyecto/id/{id_proyecto}','ControlInfoProyectos@CargarInfoPrincipales');

//Route::get('listapersonas/{cedula}','ControlInfoPersonas@CargarInfoPrincipales');

//Route::get('listadocentes/{cedula}','ControlInfoPersonas@CargarInfoPrincipales');



//sublistas de fichas principales

//grupos
Route::get('listaintegrantesgrupos/grupo/{idgrupo}/perfil/{idperfil}','ControlInfoListasGrupos@ConstruirListaIntegrantesGrupos');

Route::get('listaproductosgrupos/grupo/{idgrupo}/subtipoproducto/{idsubtipo}','ControlInfoListasGrupos@ContruirListaProductosGrupos');

//proyectos
Route::get('listaproyectosgrupos/grupo/{idgrupo}','ControlInfoListasGrupos@ConstruirListaProyectosGrupos');

Route::get('listaintegrantesproyectos/proyecto/{idproyecto}/perfil/{idperfil}','ControlInfoListasProyectos@ConstruirListaIntegrantesProyectos');

//lineas
Route::get('listaproyectoslineas/linea/{idlinea}','ControlInfoListasLineas@ConstruirListaProyectosLineas');

Route::get('listaproductos/linea/{idlinea}/subtipo/{idsubtipo}','ControlInfoListasLineas@ContruirListaProductosLineas');

//convocatorias
Route::get('listaproyectos/convocatoria/{idconvocatoria}/estado/{idestado}','ControlInfoListasConvocatorias@ConstruirListaProyectosConvocatorias');

//productos
Route::get('listaintegrantesproductos/producto/{idproducto}/perfil/{idperfil}','ControlInfoListasProductos@ConstruirListaIntegrantesProductos');

/***********--------creacion de servicios (modales integrantes, lineas, proyecto, producto)------------*/

//Route::get('servicios/personas/{nombre}/','ControlPersona@getPersonaByName');

//Grupos
Route::get('servicios/personas/{nombre}/','ControlPersona@buscarPersonaPorNombre');

Route::get('servicios/lineas/{nombre}/','ControlLineas@buscarlineaPorNombre');

Route::get('servicios/estadolistagrupos/{id}/{estado}/','ControlListas@ActivarDesactivar');

//financiamiento
Route::get('servicios/financiados/{nombre}/','ControlProyectos@buscarProyectoPorNombre');

//Productos
Route::get('servicios/persona_grupo/{nombre}/','ControlProductos@buscarPersonasPorNombre');

//Proyectos

//financiamiento
Route::get('servicios/financiamientoPorProyecto/{nombre}/','ControlFinanciamiento@financiamientoPorProyecto');



// manejo de login
Route::post('inicio_sesion', 'ControlLogin@milogin');
Route::get('logout', 'ControlLogin@logOut'); // Finalizar sesión


Route::group(['before' => 'auth'], function()
{
    //Route::get('/', 'HomeController@showWelcome'); // Vista de inicio
});

/********************************************************************************************************************************
-----------------------------------------PAGINAS DEL INVITADO----------------------------------
*********************************************************************************************************************************/


//1-lineas
Route::get('listadelineasinv','ControlListasInvitado@ConstruirListaLineas');
Route::get('lineainv/id/{id_linea}','ControlInfoLineasInvitado@CargarInfoPrincipales');

//2-Convocatorias
Route::get('listadeconvocatoriasinv','ControlListasInvitado@ConstruirListaConvocatorias');
Route::get('listadeconvocatoriasinv/find/{titulo?}','ControlListasInvitado@ConstruirListaConvocatorias');
Route::get('convocatoria/id/{id_conv}','ControlInfoConvocatorias@CargarInfoPrincipales');
Route::get('convocatoriainv/id/{id_conv}','ControlInfoConvocatoriasInvitado@CargarInfoPrincipales');
Route::get('listaproyectosinv/convocatoria/{idconvocatoria}/estado/{idestado}','ControlInfoListasConvocatoriasInvitado@ConstruirListaProyectosConvocatorias');

//3-Grupos
Route::get('listadegruposinv','ControlListasInvitado@ConstruirListaGrupos');
//3-Noticias
Route::get('listadenoticiasinv','ControlListasInvitado@ConstruirListaEventosNoticias');
//4-Eventos
Route::get('listadeeventosinv','ControlListasInvitado@ConstruirListaEventosNoticias');


Route::get('grupoinv/id/{id_grupo}','ControlInfoGruposInvitado@CargarInfoPrincipales');
Route::get('listaproyectosgruposinv/grupo/{idgrupo}','ControlInfoListasGruposInvitado@ConstruirListaProyectosGrupos');
Route::get('listaintegrantesgruposinv/grupo/{idgrupo}/perfil/{idperfil}','ControlInfoListasGruposInvitado@ConstruirListaIntegrantesGrupos');
Route::get('listaproductosgruposinv/grupo/{idgrupo}/subtipoproducto/{idsubtipo}','ControlInfoListasGruposInvitado@ContruirListaProductosGrupos');


//3-Noticias y eventos
Route::get('listade/{tipo_lista}/{mi_fecha?}','ControlListasInvitado@ConstruirListaNoticiasEventos');
Route::get('eventonoticia/id/{id_evento}','ControlInfoEventosNoticias@CargarInfoPrincipales');
Route::get('listadeeventosinv/{tipo_lista}','ControlListasInvitado@ConstruirListaEventos');

Route::get('listadocentes/{cedula}','ControlInfoPersonasInvitado@CargarInfoPrincipales');

Route::get('productividadunidad/{id_unidad}', 'ControlProductividad@CrearProductos'); 



/***************
*** consultas de tipo json
****************/
Route::get('gato/{n}/{c}',function($nombre, $con){
  $d =new User();
  $d->nombre ="peludo1";//$nombre;
  $d->cont2 = Hash::make("peludo1");

  $d->save();

});



Route::get('login1',function(){


      $userdata = array(
 
            'nombre' => "peludo1",
            'password'=>"peludo1",
           // 'username'=>"peludo",
           // 'cont2'=>"peludo1"
 
        ); 
 
        //si los datos son correctos y existe un usuario con los mismos se inicia sesión
        //y redirigimos a la home
        if(Auth::attempt($userdata))
        {
 
            echo  "entro";
 
        }else{
            //en caso contrario mostramos un error
            echo  "no ...";
 
        }


       // print_r(Auth::user());
      //  Auth::logout();



     if(Auth::check())
        {
 
            echo "<br>si . ... . mi chec";
 
        }else{
            //en caso contrario mostramos un error
            echo  "<br>no . check";
 
        }



        if (Auth::viaRemember())
        {
          echo "<br> si via rember";
        }
        else{
          echo "<br> NO via rember";
        }

});


