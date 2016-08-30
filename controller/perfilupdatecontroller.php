<?php

$user = new Usuario;
#licensiado rondon vehiculo cero oriconia

if (!$user->isLoggedIn()) {
  # si no esta logeado..
  Redirect::to('?accion=login');
}

$perfil 	= new Usuario();
$perfilInfo = $perfil->perfilInfobyUserId($user->data()->id);


# datos para las opciones del formulario
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


require_once 'view/perfilUpdate.php';


 ?>
