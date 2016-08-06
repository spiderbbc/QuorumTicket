

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

						),

						'msg' => array(
							'required' => true,
							'min'      => 5,

						)



				));

				if ($validate->passed()) {
					# procesamos a guardar...
					echo "Succes";
				}else{

						$errores = $validate->errors();

				}

			}

			# reparar esta doble instancia
			require_once 'view/create.php';

	
	}
		require_once 'view/create.php';
}




