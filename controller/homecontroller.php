

<?php
require_once 'model/Ticket.php';

$user = new Usuario();
//var_dump($user->isLoggedIn());
if (!$user->isLoggedIn()) {

	Redirect::to('?accion=login');
  # code...
  /*echo $user->firts()->username;*/
  include_once 'view/home.php';

}else{

    # code...
    /*echo $user->firts()->username;*/
    $ticket = new Ticket();

   

   
  

}

include_once 'view/home.php';















#$ticket = new Ticket();
#$uuid = $ticket->make();
# status  = 1 open, 2 en espera, 3 closed
# private = 0 public, 1 private
/*
try {

	$ticketCreate = $ticket->create(array(

	'uuid'   		=> $uuid,
	'user_id'		=> 5,
	'id_afectado'	=> 1,
	'id_gravedad'  	=> 1,
	'id_impacto'  	=> 1,
	'titulo'  		=> 'from the controller',
	'msg'  			=> 'from the controller',
	'date_added'	=> date("Y-m-d H:i:s"),
	'date_update'	=> date("Y-m-d H:i:s"),

	'status'		=> 1,
	'private'		=> 1,



	));

} catch (Exception $e) {
	echo $e->getMessage();
}

echo $ticket->last_insert_uuid();*/

#valido si el usuario esta logeado
#muestro todos los tickets con status open

/*$ticket = new Ticket();
$openTicket = $ticket->list(array('private','=','0'))*/

 ?>
