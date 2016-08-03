<?php 


/**
* name: Input
* date: 27/07/2016
* autor: Eduardo Morales
* Description: Clase envoltorio para el post o get
*/
class Input
{
	

	public static function exits($request='POST')
	{
		# retorna un get o post...
		switch ($request) {
			case 'POST':
				# retorna los datos del post si existe...
				return (!empty($_POST)) ? true : false ;
				break;

			case 'GET':
				# retorna los datos del post si existe...
				return (!empty($_GET)) ? true : false ;
				break;
			
			default:
				# un valor por default...
				return false;
				break;
		}
	}

	public static function get($item)
	{
		# retorna un dato enviado en cualquiera de los dos protocolos http
		if (isset($_POST[$item])) {
			# si viene por post
			return $_POST[$item];
		}elseif (isset($_GET[$item])) {
			# si viene por get
			return $_GET[$item];
		}
		# si no viene igual se envia blanco para que no de error
		return '';
	}

	function __construct()
	{
		# code...
	}
}
