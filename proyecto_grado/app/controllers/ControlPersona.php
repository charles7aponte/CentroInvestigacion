<?php

class ControlPersona extends Controller {





	/*********************
	* retorna las coincidencias en nombre , apellido o cedula
	*/
	public function buscarPersonaPorNombre($nombre)
	{
		$nombre=$this->limpiarCadena($nombre);

		$nombre=strtolower($nombre);

				$listaPersonas=	DB::select(DB::raw("select trim(nombre1||' '||nombre2||' '||trim(apellido1)||' '||trim(apellido2)) as nombre , cedula as cedula
					FROM \"persona\"
					where lower((nombre1||' '||nombre2||' '||apellido1||' '||apellido2 ||' '||cedula)) LIKE '%$nombre%'")
									);

		return Response::json($listaPersonas);

	
	}	




		/*********************
	* retorna las coincidencias en nombre , apellido o cedula
	*/
	public function getEstudiantesByName($nombre)
	{
		$nombre=$this->limpiarCadena($nombre);

		/*$listaPersonas= Persona::select("nombre12")->where("nombre1","LIKE" ,"'%$nombre%'")
					//->orwhere("nombre2","LKE" ,$nombre."%")
					//->orwhere("apellido1","LKE" ,$nombre."%")
					//->orwhere("apellido2","LKE" ,$nombre."%")
					//->where("cedula","LKE" ,$nombre)
					->get();*/

				$listaPersonas=	DB::select(DB::raw("select (nombre1||' '||nombre2||' '||apellido1||' '|| apellido2 ) as nombre , cedula as cedula
					FROM \"persona\", \"estudiante\" 
					where (nombre1||' '||nombre2||' '||apellido1||' '||apellido2||' '||cedula) LIKE '%$nombre%'
								AND estudiante.cedula = persona.cedula")
									);

		return Response::json($listaPersonas);
z
	
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
