<?php
#require_once 'core/init.php';


$user = new Usuario();
$user->logout();

Redirect::to('?accion=login');



 ?>
