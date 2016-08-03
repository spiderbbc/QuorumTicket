<?php 
/**
* Clase Hash: crea y retorna un valor hash
* fecha: 29/07
*/
class Hash
{
	
	function __construct()
	{
		# code...
	}


	public static function make($string,$salt = '')
	{
		# crea y concatena un valor hash
		#$clave = $string.$salt;
		return hash('sha256',$string.$salt);
	}

	public static function salt($length)
	{
		# retorna un valor hash..
		 return mcrypt_create_iv($length);
	}

	public static function unique()
	{
		# atajo al metodo make ..
		return self::make(uniqid());
	}
}

