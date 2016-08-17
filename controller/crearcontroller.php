
<?php

$user = new Usuario();

if (!$user->isLoggedIn()) {
	# si no esta logeado ...
	Redirect::to('?accion=login');
}



# datos para informacion del perfil del autor
#

$perfil 	= new Usuario();
$perfilInfo = $perfil->perfilInfobyUserId($user->data()->id);


$db = DB::getInstance();
$datos = [];

# datos para las opciones del formulario
#

$arrayParams = array( 1 =>'servicios',2 =>'gravedad',3 =>'afectado');

	foreach ($arrayParams as $field => $value) {

		$data   = $db->getByName(array('id','nombre'),$value);
		if ($data) {
				# code...
				$datos[$value] = $db->result();
		}
	}

# enviando un post
#
#var_dump(Token::check(Input::get('token')));
if (Input::exits()) {
		# si hay un post ...
			if (Token::check(Input::get('token'))) {
				# code...
				$validate  = new Validate();
				$validator = $validate->check($_POST,array(

						'titulo' => array(
							'required'=> true,
							'min'     => 5,
							'max'     => 150,

						),

						'servicios'=> array(
							'required' => true,
						),

						'gravedad'=> array(
							'required' => true,
						),

						'impacto'=> array(
							'required' => true,
						),

						'email' => array(
							'required' => true,
							'min'      => 5,
							'filter'   => 'FILTER_VALIDATE_EMAIL',

						),

						'msg' => array(
							'required' => true,
							'min'      => 5,

						)



				));
			}


			if ($validate->passed()) {
					# procesamos a guardar...
					// echo "Succes";

					$ticket = new Ticket();
					$uuid = $ticket->make();
					# status  = 1 open, 2 en espera, 3 closed
					# private = 0 public, 1 private

					try {

						$ticketCreate = $ticket->create(array(

						'uuid'   		  	=> $uuid,
						'user_id'		  	=> $user->data()->id,
						'id_afectado'		=> Input::get('impacto'),
						'id_gravedad' 	=> Input::get('gravedad'),
						'id_servicios'  => Input::get('servicios'),
						'titulo'  			=> Input::get('titulo'),
						'msg'  					=> Input::get('msg'),
						'date_added'		=> date("Y-m-d H:i:s"),
						'date_update'		=> date("Y-m-d H:i:s"),

						'id_status'				=> 1,
						'private'			  	=> 1



						));

					}

						catch (Exception $e) {
							echo $e->getMessage();

						}


					if (!$ticket->error()) {
										# si no hay error...
										# tomar los involucrados por el email pedir sus datos clave tanto para el envio del email como para la tabla pivote

										$emailInvol = explodeBy(';',Input::get('email'));

										# dataInvol = [id_user => correo del usuario] si existe
										$dataInvol= array();
										# dataUser  = [correo del usuario => username usuario]
										$dataUser = array();


										$invol = new Usuario();

										foreach ($emailInvol as $email) {
											# por cada email separado por el limitador ..
											if ($invol->find($email)) {
												# si existe en la bd ..
												$dataInvol[$invol->data()->id]   = $email;
												$dataUser[$invol->data()->email]  = $invol->data()->username;
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

										# procesar supervisores de quien crea el ticket
										#
										#
										// si no tiene  datos explota

										if ($perfilInfo) {
											# code...
											$supervisor = $invol->perfilInfobyGroupDepart($perfil->data()[0]->departamento,2);

											#print_r($invol->data()[0]);
											#Array ( [0] => stdClass Object ( [nombre] => Thais Ravelo [email] => moralesx@hotmail.com ) )


											if ($supervisor) {
												# si tiene supervisor ..
												$i = 0;
												$manager = [];
												foreach ($invol->data() as $values[$i]) {
													# agregamos bbc..
													#$mandrillMail->setBbc(array($nombre => $email));
													$manager[$values[$i]->email] = $values[$i]->nombre;
													/*print_r($values[$i]->nombre);*/

													$i++;
												}
											}
										}

										# Solicitando id que sera el numero de ticket visible para los usuario
										$id   = $ticket->last_insert_id();
										# Solicitando el uuid de ticket creado mediante last_insert()
										# uuid sera utilizado para la url E.j: http:nombre/?accion=ver&valor=57ade21a65c o con .htacces http:nombre/q-ver/v-57ade21a65c
										$data = $ticket->find('id',$id);

										#  procesar los email para enviarlos
										#


										$transport = Swift_SmtpTransport::newInstance(Config::get('sendpulse/smtp_server'),
										 Config::get('sendpulse/smtp_port'));
										$transport->setUsername(Config::get('sendpulse/login_username'));
										$transport->setPassword(Config::get('sendpulse/login_password'));
										$swift = Swift_Mailer::newInstance($transport);

										$subject = "QTelecom Apertura Ticket: ".$ticket->last_insert_id();
										$text    = "Buen Dia, se a procesado un ticket ..";
										$html = '<h1>'.Input::get('titulo').'</h1><br>
														<em>'.Input::get('msg').'</em><br>
														Acceder bajo el Siguiente Link <a href="http://localhost/QTelecom/?accion=ver&valor='.$data[0]->uuid.'">'.$ticket->last_insert_id().'</a>';






										$message = new Swift_Message($subject);


										$from = array($user->data()->email => $user->data()->username);




										$message->setFrom($from);
										$message->setBody($html, 'text/html');
										#$dataUser = array('ecastro@openmailbox.org'=>'Eduardo Xavier');

										$message->setTo($dataUser);

										$message->setCc($from);
										#print_r($manager); #Array ( [Raul Piedra] => eduucss@gmail.com )
										if (isset($manager)) {
											# si tenemos datos del supervisor ...
											$message->setBcc($manager);
										}

										$message->addPart($text, 'text/plain');

										if ($recipients = $swift->send($message, $failures))
													{
													Redirect::to('?accion=ver&valor='.$data[0]->uuid);
													} else {
													 echo "There was an error:\n";
													 print_r($failures);
													}

										#
										# reenviamos a la vista view
										echo " Success!!!";
										//Redirect::(someview)

					}else {
					# hay un error al guardar
					Session::flash('error','Upps .. problemas al crear el ticket');
					Redirect::to(404);
					// no dispara el mensaje en el error page --
						}



			}else{

						$errores = $validate->errors();

				}

			}

# enviando token
$token = Token::generate();
require_once 'view/create.php';



 ?>
