<?php
#require_once 'core/init.php';
#require_once 'model/User.php';
/*echo "Login<br>";


echo Config::get('mysql/host');*/

/*DB::getInstance();*/


/*$query = DB::getInstance()->query('SELECT * FROM usuarios WHERE username = ?',array('spiderbbc'));
*/


/*$username = DB::getInstance()->get('usuarios',array('username','=','spiderbbc'));

if (!$username->count()) {
	# code...
	echo "No user";
}else{

	 echo $username->firts()->username;
}
*/

/*$userInsert = DB::getInstance()->insert('users',array(
 					'username' => 'Otra prueba' ,
 					'password' => '321' ,
 					'name'     => 'xavitest'  ));
print_r($userInsert);*/

/*$userUpdate = DB::getInstance()->update('users',23,array(

					'username' => 'Otra actualizacion test' ,
 					'password' => '321' ,
 					'name'     => 'xavitest'

	));

echo Config::get('session/session_name');*/
/*
print_r(Session::put(,"3343434"));*/


if (Token::check(Input::get('token'))) {
	# code...

		if (Input::exits()) {
			# code...
			/*echo "Succes";*/

			$validate  = new Validate();
			$validator = $validate->check($_POST,array(

		'username' => array(

			'required' => true,
			'min'	   => 5,
			'max'	   => 20,


			),


		'password' => array(

			'required' => true,
			'min'	   => 3,
			'max'	   => 20

			),



		));
			/*var_dump($validate->passed());*/
			if ($validate->passed()) {
				# procesamos el login ..
				$usuario = new Usuario();

				$login = $usuario->login(Input::get('username'),Input::get('password'));
				/*var_dump($login);*/
					if ($login) {
						# usuario logeado...
						Redirect::to('?accion=home');
					} else {
						# usuario no logeado..
						echo "Not User";
					}


			}else{

				foreach ($validate->errors() as $errors) {
					# code...
					echo $errors."<br>";
				}
			}
		}

}


include_once 'view/login.php';
