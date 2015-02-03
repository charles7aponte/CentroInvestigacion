<?php

class ControlListas extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	//controlador lineas
	public function ConstruirListaLineas(){
		$listas=InvLineas::all(); //traer registros
		$paginacion=InvLineas::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		//print_r($a);
		return View::make('administrador/lista_lineas',$datos);
	}

	//controlador sublineas
	public function ConstruirListaSublineas(){
		$listas=InvSublineas::all(); //traer registros
		$paginacion=InvSublineas::paginate(20);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);

		return View::make('administrador/lista_sublineas',$datos);
	}

	//controlador convocatorias
	public function ConstruirListaConvocatorias(){
		$listas=InvConvocatorias::all(); //traer registros
		$paginacion=InvConvocatorias::paginate(30);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_convocatorias',$datos);
	}

		//controlador emoresas
	public function ConstruirListaEmpresas(){
		$listas=InvEntidades::all(); //traer registros
		$paginacion=InvEntidades::paginate(30);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_empresas',$datos);
	}
	

		//controlador proyectos
	public function ConstruirListaProyectos(){
		$listas=InvProyectos::all(); //traer registros
		$paginacion=InvProyectos::paginate(30);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_proyectos',$datos);
	}
	
			//controlador productos
	public function ConstruirListaProductos(){
		$listas=InvProductos::all(); //traer registros
		$paginacion=InvProductos::paginate(30);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_productos',$datos);
	}

				//controlador emoresas
	public function ConstruirListaGrupos(){
		$listas=InvGrupos::all(); //traer registros
		$paginacion=InvGrupos::paginate(30);
		$crear_paginacion=$paginacion->links();

		$datos= array(
			'campo_lista'=>$paginacion,'links'=>$crear_paginacion);
		
		return View::make('administrador/lista_grupos',$datos);
	}
}
