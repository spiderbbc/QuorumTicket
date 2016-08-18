<?php 


$user = new Usuario();

if (!$user->isLoggedIn()) {
	# si no esta logeado ...
	Redirect::to('?accion=login');
}

# verificamos si recibimos un GET y si el GET tiene valor = uuid
$request = (Input::exits('GET') && !empty(Input::get('valor'))) ? true : false ; 

# instanciamos ticket
$ticket     = new Ticket();
 

$requestVal = ($request) ? $ticket->find('uuid',Input::get('valor')) : false ;

if (!$requestVal) {
	# si es falso ...
	Session::flash('error','Upps no encontramos ese Ticket ..');
	Redirect::to('404');
}

# si el ticket es privado

if ($requestVal[0]->private) {
	# 1 = privado; 0 = publico ...
	
}

#print_r($requestVal[0]->private);



#var_dump($request);

require_once 'view/view.php';

 ?>