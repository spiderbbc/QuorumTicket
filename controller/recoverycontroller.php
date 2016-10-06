<?php

$request = (!empty(Input::get('id'))) ? Input::get('id') : false ;

if (!$request) {
  # code...
 Redirect::to(404);
}

#echo $request;
$user = new Usuario($request);
#var_dump($user->data());
$perfil 	= new Usuario();
$perfilInfo = $perfil->perfilInfobyUserId($user->data()->id);


if (Input::exits()) {
  # si hay post
  if (Token::check(Input::get('token'))) {
    # si pasa seguridad por token ....
    $validate   = new Validate;
    $validation = $validate->check($_POST,array(

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
      # si paso la validacion ....
      $salt =     Hash::salt(32,MCRYPT_RAND);
      $password = Hash::make(Input::get('password'),$salt);
      $update= new Usuario();

          try {
              $userUpdate = $update->update('users',$user->data()->id,array(

                'password' => $password,
                'salt'     => $salt
            ));

          } catch (Exception $e) {
            echo $e->getMessage();
          }

          Session::flash('login', 'Se guardo de manera exitosa la informacion');
          Redirect::to('?accion=login');

    }else {
      # disparamos errores ...
      foreach ($validate->errors() as $error) {
        # por cada error..
        echo $error."<br>";
      }
    }
  }
}

$token = Token::generate();
include_once 'view/recovery.php';
