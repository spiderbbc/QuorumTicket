<?php
$user = new Usuario();

if (!$user->isLoggedIn()) {
	# si no esta logeado ...
	Redirect::to('?accion=login');
}

# instanciamos ticket
$ticket     = new Ticket();


$requestVal = $ticket->find('user_id',$user->data()->id);

var_dump($requestVal);
require_once 'view/tickets.php';
 ?>
