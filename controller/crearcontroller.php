

<?php


$user = new Usuario();

if (!$user->isLoggedIn()) {
	# code...
	Redirect::to('?accion=login');
}else{

	# datos para informacion del perfil del autor
	#

	$perfil 	= new Usuario();
	$perfilInfo = $perfil->perfilInfobyUserId($user->data()->id);



	# datos para las opciones del formulario
	#

	$db = DB::getInstance();
	$datos = [];

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

					} catch (Exception $e) {
						echo $e->getMessage();
					}

									if (!$ticket->error()) {
										# si no hay error...
										# tomar los involucrados por el email pedir sus datos clave tanto para el envio del email como para la tabla pivote

										$emailInvol = explodeBy(';',Input::get('email'));

										$dataInvol = array();

										$invol = new Usuario();

										foreach ($emailInvol as $email) {
											# por cada email separado por el limitador ..
											if ($invol->find($email)) {
												# si existe en la bd ..
												$dataInvol[$invol->data()->id] = $email;
											}
										}



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

										#  procesar los email para enviarlos
										#
										#  enviarlos
										#
										#  redirigir al usuario en la viste 	   ver/{id_ticket}
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

			# reparar esta doble instancia
			require_once 'view/create.php';


	}
		require_once 'view/create.php';
}