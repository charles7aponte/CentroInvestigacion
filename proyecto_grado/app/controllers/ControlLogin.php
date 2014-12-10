<?php 

	class ControlLogin extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public  function login()
	{

		$nombre = Input::get('nombre',"");
		$pass = Input::get('pass',"");




		$datos =  array('cedula' => $nombre,
					'password'=>$pass );

		if(Auth::attempt($datos))
		{

			//return Redirect::route('administrador');	

		}
		else{
			//return Redirect::route('login', array('nombre' => $nombre
			//								,'pass'=>$pass)
			//						);


			
		}

return "fato";
	}// fin login



}
