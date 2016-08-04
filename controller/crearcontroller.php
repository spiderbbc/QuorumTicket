

<?php 


$user = new Usuario();

if (!$user->isLoggedIn()) {
	# code...
	Redirect::to('?accion=login');
}else{

	$perfil 	= new Usuario();
	$perfilInfo = $perfil->perfilInfobyUserId($user->data()->id);

	require_once 'view/create.php';
}


