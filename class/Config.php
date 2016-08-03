<?php 

/**
* name: Config
* date: 22/07/2016
* autor: Eduardo Morales
* Description: Clase envoltorio que retorna los valores del array config de core/init
*/
class Config 
{
	
	function __construct()
	{
		# code...
	}


	public static function get($path = null)
	{
		# $tring : false ($path = string)
		if ($path) {
			# si es distinto null...
			$config = $GLOBALS['config'];
			$path   = explode("/",trim($path));

			foreach ($path as $bit) {
				# por cada path sera a bit..
				if (isset($config[$bit])) {
					# si bit esta en el array de config..
					$config = $config[$bit];
				}

			}
			return $config;
		}
		return false;
	}
}

