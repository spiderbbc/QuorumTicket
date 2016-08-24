<?php


$user = new Usuario();

if (!$user->isLoggedIn()) {
	# si no esta logeado ...
	Redirect::to('?accion=login');
}

# verificamos si recibimos un GET y si el GET tiene valor = uuid
$request = (Input::exits('GET') && !empty(Input::get('valor'))) ? true : false ;
#var_dump($request);


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
	if (!$ticket->isInvol($requestVal[0]->id,$user->data()->id)) {
		# si no esta involucrado lo sentimos ...
		Session::flash('error','Upps.. no tiene permiso para visualizar este ticket ..');
		Redirect::to('404');
	}

}

#print_r($ticket->isInvol($user->data()->id,$requestVal[0]->id));


# datos para informacion del perfil del autor
#

$perfil 	= new Usuario();
$perfilInfo = $perfil->perfilInfobyUserId($requestVal[0]->user_id);

//print_r($requestVal[0]);

# tomar las respuestas del ticket
require_once 'model/Respuesta.php';
$resp       =  new Respuesta();
$respuestas = $resp->get($requestVal[0]->uuid);

if (Input::exits()) {
	# code...

//	echo "tenemos un post gracias a Angular ..";
		if (Token::check(Input::get('token'))) {
			# si el token existe ..
		//	echo " Tenemos el token ...";
		$validate  = new Validate();
		$validator = $validate->check($_POST,array(

			'msg' => array(
				'required'=> true,
				'min'     => 5,
				'max'     => 150,

			),


		));
		if ($validate->passed()) {
			# si paso por las reglas de validacion.

			$model     = new Respuesta();
			$respuesta = $model->create(array(

						'uuid'          => $requestVal[0]->uuid,
						'user_id'       => $user->data()->id,
						'msg'           => Input::get('msg'),
						'date_added'		=> date("Y-m-d H:i:s"),
						'date_update'		=> date("Y-m-d H:i:s")


			));
					if ($model->error()) {
						# si es falso es porque no guardo ..
						echo "Upps .. problemas al guardar";
					}
					echo "Se a procesado su respuesta al ticket";
			//Session::flash('success','Se a procesado su respuesta al ticket');
			//Redirect::to('some-view');

		}else {
					# si no paso mostramos los errores ..
					foreach ($validate->errors() as $error) {
						# disparamos los errores ..
						echo $error."<br>";
					}
		}

		}


}

$token = Token::generate();
require_once 'view/view.php';

 ?>
