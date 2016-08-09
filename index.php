<?php

#require_once 'core/init.php';


#if (Input::exits($_SERVER['REQUEST_METHOD'])) {
	# si hay un post o get..


	// var_dump($user->isLoggedIn());
		# code...

		// echo $request;
	$request = (!empty($_GET['accion'])) ? $_GET['accion'] : 'login' ;

	if (is_file("controller/{$request}controller.php")) {
				# code...
			require_once "controller/{$request}controller.php";
	} else {
				# code...
				echo "Bad request";
	}




#}
