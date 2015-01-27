<?php

class ControlSubtipoProductos extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function CrearFormulario(){

		$nombre=Input::get('subtipo-producto');
		$tipo_producto=Input::get('subtipo-tipo-producto');
		$descripcion=Input::get('desc-subtipo-producto');
	

		$todosDatos = Input::all();

	

		/*objeto del modelo*/
		$entidad=new InvSubtipoProductos();
		
		$entidad->nombre_subtipo_producto=$nombre;
		$entidad->descripcion_subtipo_producto=$descripcion;
		$entidad->inv_id_tipo_producto=$tipo_producto;
	


			// mensaje a mostrar
			$messages = array(
				'required' => '*Es obligatorio.',
				'unique'  =>'Ya existe el subtipo de producto, verifique.'
				
			);


			// execute la validacin 
			$validator = Validator::make(Input::all(), InvSubtipoProductos::$reglasValidacion,$messages);

			if ($validator->fails()) {
				$messages = $validator->messages();


				return Redirect::to('formulariosubtipoproductos')
					->withErrors($validator)
					->withInput($todosDatos)
					->with('mensaje_error',"Error al guardar, Verifique.");
			} else {



					try{
						$entidad->save();
					}
				 	catch( PDOException $e)
					{
				
						
						return Redirect::to('formulariosubtipoproductos')
						->withInput($todosDatos)
						->with('mensaje_error',"Error en el servidor.");
					}

						return Redirect::to('formulariosubtipoproductos')
								->withInput($todosDatos)
								->with('mensaje_success',"Se ha Guardado");
				
			}
		}


			//crear y cargar en la tabla cada tipo .. funcionando
			public function cargarFormularioSubtipoProducto(){

			$form_subtipoproducto= InvSubtipoProductos::all(); //de donde necesito
			$listatipos =InvTipoProductos::all(); //modelo del q quiero cargar

			for ($i=0; $i<count($form_subtipoproducto); $i++) { 
				$form_subtipoproducto[$i]->nombre_campo=$this->TransformarIda_Nombre($form_subtipoproducto[$i]->inv_id_tipo_producto,$listatipos);
			}

			$datos=  array(
				'subtipoproductos' =>$form_subtipoproducto,
				'tipos' =>$listatipos);

			return View::make('administrador/formulario_subtipoproductos',$datos); 


			}//
		

			//elimina cada grupo de la tabla .. 
			public function EliminarFormularioSubtipoProducto($id){
			
				$form_subtipoproducto= InvSubtipoProductos::find($id); //de donde necesito

				if (is_null($form_subtipoproducto)==false){
					$form_subtipoproducto->delete();

					return Response::json(array("respuesta"=>true));

				}
				return Response::json(array("respuesta"=>false));
			}//


			//traer de otra tabla un dato
			public function TransformarIda_Nombre($id,$listatipos){

				for ($i=0; $i<count($listatipos); $i++) { 
					if($listatipos[$i]->id_tipo_producto==$id){
						return $listatipos[$i]->nombre_tipo_producto;
					}
				} return "error";
			}
}

