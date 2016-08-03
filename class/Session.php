<?php 

/**
* 
*/
class Session 
{
	
	function __construct()
	{
		# code...
	}

	public static function exists($name)
	{
		# si existe una session...
		return (isset($_SESSION[$name])) ? true : false ;
	}

	public static function put($name,$value)
	{
		# crea una variable de session..
		return $_SESSION[$name] = $value;
	}

	public static function get($name)
	{
		# retornamos la session por nombre..
		return $_SESSION[$name];
	}

	public static function delete($name){

		if (self::exists($name)) {
			# si existe...
			unset($_SESSION[$name]);
		}

	}

	public static function flash($name,$string = '')
	{
		# code...
		if (self::exists($name)) {
			# code...
			$msg = self::get($name);
			self::delete($name);
			return $msg;
		}else{
			 self::put($name,$string);
		}
	}
}

