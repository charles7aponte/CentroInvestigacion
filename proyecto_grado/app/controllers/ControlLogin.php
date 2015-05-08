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


        echo "$cedula -- $pass";


		$messages = array(
				'required' => 'Este campo es obligatorio.',
				'integer'=>'Debe ser un número.',
			);



		$validator = Validator::make(Input::all(), $reglasValidacion,$messages);

		// validando 
			if ($validator->fails()) {
				$messages = $validator->messages();
echo "error de validacion";


			/*return Redirect::to('login')
					->withErrors($validator)
					->withInput()
					->with('mensaje_error',"Verifique por favor los datos del usuario");
			*/
				}
				// paso la validacion
				else {

					$datos =  array('cedula' => $cedula,
								'password'=>$pass );

					$pass_nu=md5($pass);

					$raw=	DB::select(DB::raw("select *
									from persona
									where cedula = '$cedula'
										and clavep ='$pass_nu' ")
												);

                    echo "paso1- select *
									from persona
									where cedula = '$cedula'
										and clavep ='$pass_nu'";

                    //si existe la cedula y pass en  la tabla persona
					if($raw && count($raw)>0)	
					{

                        echo "paso2";

						$persona=User::find($raw[0]->cedula);
						$perfiles_persona=InvPersonaPerfil::where("cedula","=",$persona->cedula)->get();
						if(count($perfiles_persona)>0)
						{
                            echo "paso3";


                            foreach($perfiles_persona as $fila_perfiles_persona)
                            {

                                $perfiles=InvPerfiles::where("codperfil","=",$fila_perfiles_persona->codperfil)->get();
                                $perfiles=$perfiles[0];

                                $persona->nombreperfil=$perfiles['nombreperfil'];
                                $persona["nombreperfil"]=$persona->nombreperfil;


                                if(strnatcasecmp(trim($persona->nombreperfil),"Docente")==0
                                    || strnatcasecmp(trim($persona->nombreperfil),"Admin Centro Investigaciones")==0  )
                                {

                                    echo "paso4";

                                    Auth::login($persona);
                                   return Redirect::to("administrador");

                                }
                            }
							//aca el else?

						}

						

					}

			/*		return Redirect::to('login')
					->withErrors($validator)
					->withInput()
					->with('mensaje_error',"Verifique, Datos de usuario incorrectos.");
			*/

				}		




		//return Redirect::back()->with('mensaje_error', 'Verifique por favor los datos del usuario.<br>Datos incorrectos')->withInput();


		
	}// fin login






	public function logOut()
    {
        // Cerramos la sesión
        Auth::logout();
        Session::flush();
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



	public function CargarInfoPrincipales(){
		$unidades_academicas=InvUnidadesAcademicas::all();
		$documentos=InvEventosNoticias::where("tipo","ILIKE","documento")->get();

		$datos=array('lista_unidades' =>$unidades_academicas,
					 'lista_documentos'=>$documentos
					);

		return View::make("login_user",$datos);
	}	



}
