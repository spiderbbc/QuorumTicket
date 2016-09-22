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

			'email' => array(
			//	'required' => false,
				'min'      => 5,
				'filter'   => 'FILTER_VALIDATE_EMAIL',

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



					$emailInvol = (!empty(Input::get('email'))) ? explodeBy(';',Input::get('email')) : false ;
					# tomar los involucrados por el email pedir sus datos clave tanto para el envio del email como para la tabla pivote

					//print_r($emailInvol);
					# lo instanciamos porque se va usar sin hay email nuevos en una respuesta o no
					$invol = new Usuario();

					if ($emailInvol) {
						# si hay email por el post ..
						# dataInvol = [id_user => correo del usuario] si existe
									$dataInvol= array();
									# dataUser  = [correo del usuario => username usuario]
									$dataUser = array();


									#$invol = new Usuario();
									# involucramos al usuario quien crea el ticket;;
									#
									#
									$dataInvol[$user->data()->id] = $user->data()->email;

									foreach ($emailInvol as $email) {
										# por cada email separado por el limitador ..
										if ($invol->find($email)) {
											# si existe en la bd ..
											$dataInvol[$invol->data()->id]   = $email;
											$dataUser[$invol->data()->email]  = $invol->data()->username;
										}elseif (!$invol->find($email)) {
											# code...
											echo "Problema con el Siguiente email: ".$email;
										}
									}





									#print_r($dataUser); Array ( [eduuccs@gmail.com] => chateing [ecastro@openmailbox.org] => xcastro )

									#
									#  guardar a los invol en tabla pivote
									#
									foreach (array_keys($dataInvol) as $id) {
										# code...
										if (!$ticket->saveInvol($id)) {
											# code...
											trigger_error("Upps .. no se proceso el email:{$dataInvol[$id]}");
										}
									}

					}


					#	echo "Se a procesado su respuesta al ticket".$requestVal[0]->id;


					#  procesar los email para enviarlos
					#


					$transport = Swift_SmtpTransport::newInstance(Config::get('sendpulse/smtp_server'),
					 Config::get('sendpulse/smtp_port'));
					$transport->setUsername(Config::get('sendpulse/login_username'));
					$transport->setPassword(Config::get('sendpulse/login_password'));
					$transport->setLocalDomain('[tecnicos2]');
					$swift = Swift_Mailer::newInstance($transport);

					$subject = "QTelecom se a respondido el ticket: ".$requestVal[0]->id;
					$text    = "Buen Dia, tenemos una respuesta ..";
					$html = '<h1>'.$requestVal[0]->titulo.'</h1><br>
									<em>'.Input::get('msg').'</em><br>
									Acceder bajo el Siguiente Link <a href="http://localhost/QTelecom/?accion=ver&valor='.$requestVal[0]->uuid.'">'.$requestVal[0]->id.'</a>';






					$message = new Swift_Message($subject);


			//		$from = array($user->data()->email => $user->data()->username);
					$from = array(Config::get('sendpulse/login_username') => Config::get('sendpulse/system_name'));
					$message->setFrom($from);

					$message->setBody($html, 'text/html');


					if ($userInvol = $invol->involInfoByid_ticket($requestVal[0]->id)) {
						# code...
								$dataInvol = array();
								$x = 0;
								foreach ($invol->data() as $data[$x]) {
									# por cada invol con infice de $x..
									$dataInvol[$data[$x]->email] = $data[$x]->nombre;

									$x ++;
								}
					}



				#	print_r($dataInvol);


					if (isset($dataInvol)) {
						# code...
						$message->setTo($dataInvol);
					}

					$message->addPart($text, 'text/plain');

					if ($recipients = $swift->send($message, $failures))
								{
								Redirect::to('?accion=ver&valor='.$requestVal[0]->uuid);
								} else {
								 echo "There was an error:\n";
								 print_r($failures);
								}



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
