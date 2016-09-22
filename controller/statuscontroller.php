<?php
#print_r($_GET); # Array ( [accion] => status [valor] => 57e3d8a371a )

$response = (isset($_GET['valor'])) ? $_GET['valor'] : false ;

if (!$response) {
  # si no hay valor .....
  Session::flash('error','Upps .. problemas al cambiar el status del ticket');
  Redirect::to(404);
}

$ticket     = new Ticket();


$requestVal = ($request) ? $ticket->find('uuid',Input::get('valor')) : false ;

if (!$requestVal) {
	# si es falso ...
	Session::flash('error','Upps no encontramos ese Ticket ..');
	Redirect::to('404');
}

#print_r($requestVal[0]->id_status);

$status = ($requestVal[0]->id_status == 1) ? 2 : 1 ;

$modelStatus = $ticket->update($requestVal[0]->id,array(
                'id_status' => $status,
                'date_update'		=> date("Y-m-d H:i:s")
                  ));
if ($ticket->error()) {
  #  si hay error ...
  Session::flash('error','Upps .. problemas al cambiar el status del ticket ..32');
  Redirect::to(404);

} else {
  # code...
  #Session::flash('error','Upps .. problemas al cambiar el status del ticket');
  Redirect::to("?accion=ver&valor=".$requestVal[0]->uuid);
}


 ?>
