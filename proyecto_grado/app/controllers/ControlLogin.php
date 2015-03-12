<?php 

	class ControlLogin extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public  function milogin()
	{

		$cedula = $this->limpiarCadena(Input::get('cedula',""));
		$pass =  $this->limpiarCadena(Input::get('pass',""));



		//validacion 
		$reglasValidacion = array(
			'cedula'             =>'required|integer', 
			'pass'            => 'required',
				
		);

		$messages = array(
				'required' => 'Este campo es obligatorio.',
				'integer'=>'Debe ser un número.',
			);



		$validator = Validator::make(Input::all(), $reglasValidacion,$messages);

		// validando 
			if ($validator->fails()) {
				$messages = $validator->messages();



				return Redirect::to('login')
					->withErrors($validator)
					->withInput()
					->with('mensaje_error',"Verifique por favor los datos del usuario");
				}
				// paso la validacion
				else {

					$datos =  array('cedula' => $cedula,
								'password'=>$pass );

					$raw=	DB::select(DB::raw("select *
									from persona
									where cedula = '$cedula'
										and clavep = md5('$pass')")
												);


					
					if($raw && count($raw)>0)	
					{


						$persona=User::find($raw[0]->cedula);
						Auth::login($persona);
						

						return Redirect::to("administrador");

					}	


				}		




		return Redirect::back()->with('mensaje_error', 'Verifique por favor los datos del usuario.<br>Datos incorrectos')->withInput();


		
	}// fin login






	public function logOut()
    {
        // Cerramos la sesión
        Auth::logout();
        return Redirect::to('login')->with('mensaje_success', 'Ha cerrado sesión correctamente');
    }


	public  function limpiarCadena($valor)
		{
			$valor = str_ireplace("SELECT","",$valor);
			$valor = str_ireplace("COPY","",$valor);
			$valor = str_ireplace("DELETE","",$valor);
			$valor = str_ireplace("DROP","",$valor);
			$valor = str_ireplace("DUMP","",$valor);
			$valor = str_ireplace(" OR ","",$valor);
			$valor = str_ireplace("%","",$valor);
			$valor = str_ireplace("LIKE","",$valor);
			$valor = str_ireplace("--","",$valor);
			$valor = str_ireplace("^","",$valor);
			$valor = str_ireplace("[","",$valor);
			$valor = str_ireplace("]","",$valor);
			$valor = str_ireplace("\\","",$valor);
			$valor = str_ireplace("!","",$valor);
			$valor = str_ireplace("¡","",$valor);
			$valor = str_ireplace("?","",$valor);
			$valor = str_ireplace("=","",$valor);
			$valor = str_ireplace("&","",$valor);
			$valor = str_ireplace("'","\\'",$valor);
			$valor = str_ireplace("\"","\\\"",$valor);
			return $valor;
		}



}
