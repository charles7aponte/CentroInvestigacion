<?php

/******************-------------------------
PAGINAS DEL ADMINISTRADOR--------------------
***************/
Route::group(array('before'=>'permisosadmin'), function(){
//grupos
Route::get('formulariogrupos','ControlGrupos@cargarFormularioGrupo');
Route::get('formulariogrupos/eliminar/{id}','ControlGrupos@EliminarFormularioGrupo');
Route::get('formulariogrupos/edit/{id}','ControlGrupos@cargarEditar');
Route::get('formulariogrupos/eliminarintegrante/{idgrupo}/{idintegrante}','ControlGrupos@EliminarIntegrantesGrupos');
Route::get('formulariogrupos/eliminarlinea/{idgrupo}/{idlinea}','ControlGrupos@EliminarlineaGrupos');
Route::post('creacion/formulariogrupos', 'ControlGrupos@CrearFormulario');
Route::post('edicion/formulariogrupos','ControlGrupos@guardarEdicion');
Route::get('listadegrupos','ControlListas@ConstruirListaGrupos');
Route::get('grupo/id/{id_grupo}','ControlInfoGrupos@CargarInfoPrincipales');
Route::get('listaintegrantesgrupos/grupo/{idgrupo}/perfil/{idperfil}','ControlInfoListasGrupos@ConstruirListaIntegrantesGrupos');
Route::get('listaproductosgrupos/grupo/{idgrupo}/subtipoproducto/{idsubtipo}','ControlInfoListasGrupos@ContruirListaProductosGrupos');
Route::get('listaproyectosgrupos/grupo/{idgrupo}','ControlInfoListasGrupos@ConstruirListaProyectosGrupos');
Route::get('listaintegrantesproyectos/proyecto/{idproyecto}/perfil/{idperfil}','ControlInfoListasProyectos@ConstruirListaIntegrantesProyectos');

//empresas 
Route::get('listadeempresas','ControlListas@ConstruirListaEmpresas');

//tipo grupo
Route::get('formulariotipogrupo','ControlTipoGrupos@cargarFormularioTipoGrupo');
Route::get('formulariotipogrupo/eliminar/{id}','ControlTipoGrupos@EliminarFormularioTipoGrupo');
Route::post('creacion/formulariotipogrupos', 'ControlTipoGrupos@CrearFormulario');

//unidades academicas 
Route::get('formulariounidadesacademicas','ControlUnidadesAcademicas@cargarFormularioUnidades');
Route::post('creacion/formulariounidadesacademicas', 'ControlUnidadesAcademicas@CrearFormulario');

//docentes, investigadores,investigadores externos
Route::get('formularioinvestigadores','ControlInvestigadores@cargarFormularioInvestigadores');
Route::get('infdocentes/{cedula}','ControlInfoDocentes@CargarInfoPrincipales');
Route::get('infinvestigadores/{cedula}','ControlInfoPersonas@CargarInfoPrincipales');
Route::get('formularioinvestigadores/edit/{id}','ControlInvestigadores@cargarEditar');
Route::post('creacion/formularioinvestigadores', 'ControlInvestigadores@CrearFormulario');
Route::post('edicion/formularioinvestigadores','ControlInvestigadores@guardarEdicion');
Route::get('listadeinvestigadores','ControlListas@ConstruirListaInvestigadores');
Route::get('infdocentesinv/{cedula}','ControlInfoDocentesInvitado@CargarInfoPrincipales');

//slider
Route::get('formularioslider','ControlSlider@cargarFormularioSlider');
Route::post('creacion/formularioslider', 'ControlSlider@CrearFormulario');
Route::get('formularioslider/eliminar/{id}','ControlSlider@EliminarFormularioSlider');
Route::get('listaimageneslider','ControlListas@ConstruirListaSlider');

//sublineas
Route::get('formulariosublineas','ControlSublineas@cargarFormularioNuevaSublinea');
Route::get('formulariosublineas/eliminar/{id}','ControlSublineas@EliminarFormularioSublinea');
Route::get('formulariosublineas/edit/{id}','ControlSublineas@cargarEditar');
Route::post('creacion/formulariosublineas', 'ControlSublineas@CrearFormulario');
Route::post('edicion/formulariosublineas','ControlSublineas@guardarEdicion');
Route::get('listadelineas','ControlListas@ConstruirListaLineas');
Route::get('listadesublineas','ControlListas@ConstruirListaSublineas');

//subtipo de producto
Route::get('formulariosubtipoproductos','ControlSubtipoProductos@cargarFormularioSubtipoProducto');
Route::get('formulariosubtipoproductos/eliminar/{id}','ControlSubtipoProductos@EliminarFormularioSubtipoProducto');
Route::post('creacion/formulariosubtipoproductos', 'ControlSubtipoProductos@CrearFormulario');

//tipo producto
Route::get('formulariotipoproductos', 'ControlTipoProductos@cargarFormularioTipoProducto');
Route::get('formulariotipoproductos/eliminar/{id}','ControlTipoProductos@EliminarFormularioTipoProducto');
Route::post('creacion/formulariotipoproductos', 'ControlTipoProductos@CrearFormulario');

//proyectos
Route::get('formularioproyectos', 'ControlProyectos@cargarFormularioProyectos');
Route::get('formularioproyectos/eliminar/{id}','ControlProyectos@EliminarFormularioProyecto');
Route::get('formularioproyectos/edit/{id}','ControlConvocatorias@cargarEditar');
Route::get('formularioproyectos/edit/{id}','ControlProyectos@cargarEditar');
Route::get('formularioproyectos/eliminarintegrante/{idproyecto}/{idintegrante}','ControlProyectos@EliminarIntegrantesProyectos');
Route::post('creacion/formularioproyectos', 'ControlProyectos@CrearFormulario');
Route::post('edicion/formularioproyectos','ControlProyectos@guardarEdicion');
Route::get('listadeproyectos','ControlListas@ConstruirListaProyectos');
Route::get('listadeproyectos/find/{titulo?}','ControlListas@ConstruirListaProyectos');
Route::get('proyecto/id/{id_proyecto}','ControlInfoProyectos@CargarInfoPrincipales');

//financiamiento
Route::get('formulariofinanciamiento', 'ControlFinanciamiento@cargarFormularioFinanciamiento');
Route::get('formulariofinanciamiento/eliminar/{id}','ControlFinanciamiento@EliminarListaFinanciamiento');
Route::post('creacion/formulariofinanciamiento', 'ControlFinanciamiento@CrearFormulario');
Route::post('edicion/formulariofinanciamiento','ControlFinanciamiento@guardarEdicion');
Route::get('listafinanciamiento', function() {return View::make('administrador/lista_financiamiento');});

//periodos academicos
Route::get('formularioperiodosacademicos','ControlPeriodosAcademicos@cargarFormularioPeriodo');
Route::get('formularioperiodosacademicos/eliminar/{id}','ControlPeriodosAcademicos@EliminarFormularioPeriodo');

//productos
Route::get('formularioproductos', 'ControlProductos@cargarFormularioProductos');
Route::get('formularioproductos/eliminar/{id}','ControlProductos@EliminarFormularioProducto');
Route::get('formularioproductos/edit/{id}','ControlProductos@cargarEditar');
Route::get('formularioproductos/eliminarintegrante/{idproducto}/{idintegrante}','ControlProductos@EliminarIntegrantesProductos');
Route::post('creacion/formularioproductos', 'ControlProductos@CrearFormulario');
Route::post('edicion/formularioproductos','ControlProductos@guardarEdicion');
Route::get('listadeproductos','ControlListas@ConstruirListaProductos');
Route::get('listadeproductos/find/{titulo?}','ControlListas@ConstruirListaProductos');
Route::get('listadeproductosdocentes','ControlListas@ConstruirListaProductosDocentes');
Route::get('listadeproductosdocentes/find/{titulo?}','ControlListas@ConstruirListaProductos');
Route::get('producto/id/{id_producto}','ControlInfoProductos@CargarInfoPrincipales');
Route::get('listaintegrantesproductos/producto/{idproducto}/perfil/{idperfil}','ControlInfoListasProductos@ConstruirListaIntegrantesProductos');


//lineas
Route::get('formulariolineas', 'ControlLineas@cargarFormularioLinea');
Route::get('formulariolineas/eliminar/{id}','ControlLineas@EliminarFormularioLinea');
Route::get('formulariolineas/edit/{id}','ControlLineas@cargarEditar');
Route::post('creacion/formulariolineas', 'ControlLineas@CrearFormulario');
Route::post('edicion/formulariolineas','ControlLineas@guardarEdicion'); 
Route::get('linea/id/{id_linea}','ControlInfoLineas@CargarInfoPrincipales');
Route::get('listaproyectoslineas/linea/{idlinea}','ControlInfoListasLineas@ConstruirListaProyectosLineas');
Route::get('listaproductos/linea/{idlinea}/subtipo/{idsubtipo}','ControlInfoListasLineas@ContruirListaProductosLineas');

//convocatorias
Route::get('formularioconvocatorias', function() { return View::make('administrador/formulario_convocatorias');});  
Route::get('formularioconvocatorias/eliminar/{id}','ControlConvocatorias@EliminarFormularioConvocatoria');
Route::get('formularioconvocatorias/edit/{id}','ControlConvocatorias@cargarEditar');
Route::post('creacion/formularioconvocatorias', 'ControlConvocatorias@CrearFormulario');
Route::post('edicion/formularioconvocatorias','ControlConvocatorias@guardarEdicion'); 
Route::get('listadeconvocatorias','ControlListas@ConstruirListaConvocatorias');
Route::get('listadeconvocatorias/find/{titulo?}','ControlListas@ConstruirListaConvocatorias');
Route::get('convocatoria/id/{id_conv}','ControlInfoConvocatorias@CargarInfoPrincipales');
Route::get('listaproyectos/convocatoria/{idconvocatoria}/estado/{idestado}','ControlInfoListasConvocatorias@ConstruirListaProyectosConvocatorias');


//productos
Route::get('listaintegrantesproductos/producto/{idproducto}/perfil/{idperfil}','ControlInfoListasProductos@ConstruirListaIntegrantesProductos');


/***********--------creacion de graficas reportes: productividad por grupos,proyectos,productos,lineas ------------*/

Route::get('reporte/unidadgrupos/', 'ControlReportes@CrearReporteGrupos'); 

Route::get('reporte/proyectolineas/{idperiodo?}', 'ControlReportes@CrearReporteProyectos');

Route::get('reporte/productoperiodo/{idperiodo?}', 'ControlReportes@CrearReporteProductos');

Route::get('reporte/productividaddocente/', 'ControlReportes@CrearReporteDocentes');


Route::get('reporte/generar/excel/reportegrupos', 'ControlReportesExcel@GenerarReporteTablas');

Route::get('reporte/generar/excel/reporteproyectos', 'ControlReportesExcel@GenerarReporteTablaProyectos');

Route::get('reporte/generar/excel/reporteproductos', 'ControlReportesExcel@GenerarReporteTablaProductos');

Route::get('reporte/generar/excel/reportedocentes', 'ControlReportesExcel@GenerarReporteTablaDocentes');


/***********--------creacion de servicios (modales integrantes, lineas, proyecto, producto)------------*/
=======
//eventos noticias y documentos
Route::get('formularioeventosnoticias', function() {return View::make('administrador/formulario_eventos_noticias');});
Route::get('formularioeventosnoticias/eliminar/{id}','ControlEventosNoticias@EliminarFormularioEventosNoticias');
Route::get('formularioeventosnoticias/edit/{id}','ControlEventosNoticias@cargarEditar');
Route::post('creacion/formularioeventosnoticias', 'ControlEventosNoticias@CrearFormulario');
Route::post('edicion/formularioeventosnoticias','ControlEventosNoticias@guardarEdicion');
Route::get('listadeeventosynoticias','ControlListas@ConstruirListaEventosNoticias');
Route::get('eventosnoticias/id/{id_evento}','ControlInfoEventosNoticias@CargarInfoPrincipales');
>>>>>>> origin/master

//periodos academicos
Route::post('creacion/formularioperiodosacademicos', 'ControlPeriodosAcademicos@CrearFormulario');

/***********--------creacion de servicios (modales)------------**********/
Route::get('servicios/personas/{nombre}/','ControlPersona@buscarPersonaPorNombre');
Route::get('servicios/lineas/{nombre}/','ControlLineas@buscarlineaPorNombre');
Route::get('servicios/estadolistagrupos/{id}/{estado}/','ControlListas@ActivarDesactivar');
Route::get('servicios/financiados/{nombre}/','ControlProyectos@buscarProyectoPorNombre');
Route::get('servicios/persona_grupo/{nombre}/','ControlProductos@buscarPersonasPorNombre');
Route::get('servicios/estadolistaproductos/{id}/{estado}/','ControlListas@ActivarDesactivarDocente');
Route::get('servicios/financiamientoPorProyecto/{nombre}/','ControlFinanciamiento@financiamientoPorProyecto');

//reportes
Route::get('listadereportes', function() { return View::make('administrador/inf_reportes'); });
Route::get('reporte/unidadgrupos/', 'ControlReportes@CrearReporteGrupos'); 
Route::get('reporte/proyectolineas/{idperiodo?}', 'ControlReportes@CrearReporteProyectos');
Route::get('reporte/productoperiodo/{idperiodo?}', 'ControlReportes@CrearReporteProductos');
Route::get('reporte/productividaddocente/', 'ControlReportes@CrearReporteDocentes');

});


//Rutas de sesion
Route::get('login','ControlLogin@CargarInfoPrincipales');
Route::get('contrasena', function() { return View::make('olvido_clave'); });
Route::get('/', 'ControlPaginaInicio@CrearPagina');

/********************************************************************************************************************************
-----------------------------------------PAGINAS DEL ADMINISTRADOR----------------------------------
*********************************************************************************************************************************/
Route::get('administrador', function() { return View::make('administrador/panel_admin'); });



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
Route::get('listaproyectoslineasinv/linea/{idlinea}','ControlInfoListasLineasInvitado@ConstruirListaProyectosLineas');
Route::get('listaproductoslineasinv/linea/{idlinea}/subtipo/{idsubtipo}','ControlInfoListasLineasInvitado@ContruirListaProductosLineas');

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
Route::get('eventonoticiainv/id/{id_evento}','ControlInfoEventosNoticiasInvitado@CargarInfoPrincipales');
Route::get('listadeeventosinv/{tipo_lista}','ControlListasInvitado@ConstruirListaEventos');
 

Route::get('productividadunidad/{id_unidad}', 'ControlProductividad@CrearProductos'); 




