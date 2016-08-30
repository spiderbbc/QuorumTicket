
<?php

$user = new Usuario;
#licensiado rondon vehiculo cero oriconia

if (!$user->isLoggedIn()) {
  # si no esta logeado..
  Redirect::to('?accion=login');
}

$perfil 	= new Usuario();
$perfilInfo = $perfil->perfilInfobyUserId($user->data()->id);


require_once 'view/perfil.php';

 ?>
