<?php

#require_once 'core/init.php';
	# si el token es igual al token de la variable de session...





if (Token::check(Input::get('token'))) {

if (Input::exits()) {
	# code...
	/*echo Input::get('username');*/



	$validate  = new Validate();
	$validator = $validate->check($_POST,array(

		'username' => array(

			'required' => true,
			'min'	   => 5,
			'max'	   => 20,
			'unique'   => true

			),
		'email' => array(

			'required' => true,
			'min'	   => 5,
			'max'	   => 50,
			'unique'   => true

			),

		'password' => array(

			'required' => true,
			'min'	   => 3,
			'max'	   => 20

			),
		'password_again' => array(

			'required' => true,
			'equal'	   => 'password',
			'min'	   => 3,
			'max'	   => 20

			),


		));

	if ($validate->passed()) {
		# code...
		/*echo "Ok!";*/
		$salt = Hash::salt(32,MCRYPT_RAND);
		/*var_dump(Hash::make(Input::get('password'),$salt));*/
		$user = new Usuario();
		try {



			$user->create(array(
				'nombre'   => Input::get('nombre'),
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password'),$salt),
				'salt'     => $salt,
				'email'    => Input::get('email'),
				'joined'   => date("Y-m-d H:i:s"),
				'grupo'    => 1


				));



		} catch (Exception $e) {
			die($e->getMessage());
		}

		if ($user == true) {
			# code...
			Session::flash('succes','Ya se encuentra registrado en el Sistema');
			Redirect::to('?accion=login');
		}

	}else{

		$errores = $validate->errors();
	}
}




}

include_once 'view/register.php';
