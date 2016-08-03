

<?php 



/**
* 
*/
class Redirect 
{

	/*private $_ruta = "/QTelecom";*/

	public static function to($location = null)
	{
		# code...
		if ($location) {
			# code...
			$ruta = "/QTelecom/";
			if (is_numeric($location)) {
				# code...
				switch ($location) {
					case '404':
						# code...
						header("HTTP/1.0 404 Not Found");
						include_once 'includes/error/404.php';
						exit();
						break;
					
					default:
						# code...
						break;
				}
			}

			header('location:'.$ruta.$location);
			exit();
		}
		
	}

	function __construct()
	{
		# code...
	}
}


