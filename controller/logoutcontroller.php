<?php



$user = new Usuario();
$user->logout();

Redirect::to('?accion=login');



 ?>
