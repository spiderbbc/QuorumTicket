<?php

$user = new Usuario;
#$errors = [];

if (!$user->isLoggedIn()) {
  # si no esta logeado..
  Redirect::to('?accion=login');
}

$perfil 	= new Usuario();
$perfilInfo = $perfil->perfilInfobyUserId($user->data()->id);


# datos para las opciones del combolist
#

$db = DB::getInstance();
$datos = [];

$arrayParams = array( 1 =>'departamentos');

	foreach ($arrayParams as $field => $value) {

		$data   = $db->getByName(array('id','nombre'),$value);
		if ($data) {
				# code...
				$datos[$value] = $db->result();
		}
	}


if (Input::exits()) {
  # si tenemos post ...
#  echo "Hay post";
  if (Token::check(Input::get('token'))) {
    # tenenos confirmacion por token ....
    #  echo "hay Token ..";
    #print_r($_POST);

    $validate = new Validate();
    $validation = $validate->check($_POST,array(



        'nombre' => array(

    			'required' => true,
    			'min'	   => 5,
    			'max'	   => 20
    		//	'unique'   => true

    			),



            'password' => array(

        			'required' => false,
        			'min'	   => 3,
        			'max'	   => 20

        			),

        		'password_again' => array(

        			'required' => false,
        			'equal'	   => 'password',
        			'min'	   => 3,
        			'max'	   => 20

        			),


            'cargo' => array(

        			'required' => true,
        			'min'	   => 5,
        			'max'	   => 20
        		//	'unique'   => true

        			),

              'extencion' => array(

          			'required' => true,
          			'min'	   => 4,
          			'max'	   => 20
          			//'unique'   => true

          			)


    ));


    if ($validate->passed()) {
      # si paso la validacion...
      if (!empty(Input::get('contraseña'))) {
        # si no viene la contraseña vacia entonces ....
        # se pretende actualizarla
        #print_r($user);
              if (!($user->data()->password === Hash::make(Input::get('contraseña'),$user->data()->salt))) {

                #echo "Upps .. la contraseña actual no coincide con la registrada ..";
                #  $i = 0;
                $errors[0] = "Upps .. la contraseña actual no coincide con la registrada ..";
              }else {
                # no hay problea con la actual contrase;a y se prepara la nueva contrase'a
                $salt =     Hash::salt(32,MCRYPT_RAND);
                $password = Hash::make(Input::get('password'),$salt);
              }

      }else {
        $salt = $user->data()->salt;
        $password = $user->data()->password;
      }
        if (empty($errors)) {
          # no se genero error en la contrase actual por ende procedemos a actualizar..
          #echo " a actualizar  ...";
          $update= new Usuario();

              try {
                $userUpdate = $update->update($user->data()->id,array(
                  $password,
                  $salt,
                  Input::get('nombre'),
                  Input::get('id_departamento'),
                  Input::get('cargo'),
                  Input::get('extencion')

                ));

              } catch (Exception $e) {
                echo $e->getMessage();
              }

        }

        if ($userUpdate === true) {
          # si no hay errores al guardar el perfil ..
          Session::flash('succes', 'Se guardo de manera exitosa la informacion');
          Redirect::to('?accion=perfil');
        }


    }else {
      # si no paso la validacion disparamos los errores..

      $i = 0;
      foreach ($validate->errors() as $error) {
        # recorremos y disparamos los errores ...
        #echo $error."<br>";
        $errors[$i] = $error;
        $i ++;
      }
    }
  }
}



$token = Token::generate();
require_once 'view/perfilUpdate.php';


 ?>
