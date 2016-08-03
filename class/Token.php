

<?php 


/**
* name: Token
* date: 29/07/2016
* autor: Eduardo Morales
* Description: Clase envoltorio añade un token en la variable de session y lo confirma
*/
class Token 
{
	

	public static function generate()
	{
		# retorna una clave o token y lo añade a una variable de session...
		return Session::put(Config::get('session/token_name'),md5(uniqid()));
	}


	public static function check($token)
	{
		# code...
		$tokenName = Config::get('session/token_name');

		if (Session::exists($tokenName) && $token === Session::get($tokenName) ) {
			# code...
			Session::delete($tokenName);
			return true;
		}

		return false;
	}

	function __construct()
	{
		# code...
	}
}

