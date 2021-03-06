

<?php


/**
*
*/
class Usuario
{
	private $_db,
					$_data,
					$_sessionName,
					$_isLoggin = false;

	function __construct($user = null)
	{
		# code...
		$this->_db  = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');

		if (!$user) {
			# user = null..
			if (Session::exists($this->_sessionName)) {
				# si existe una session con nombre sessionName..
				$user = Session::get($this->_sessionName);
				if ($this->find($user)) {
					# code...
					$this->_isLoggin = true;
				}else {
					// $this->_isLoggedIn = false;
				}
			}
		}else {
			# si $user= 2 ..
			$this->find($user);
		}

	}


	public function create($fields = array())
	{
		$nombre = $fields['nombre'];
		unset($fields['nombre']);
		# crea a un usuario ..

		if (!$this->_db->insert('users',$fields)) {
			# code...
			throw new Exception("Error Processing Request", 1);

		}

		if ($this->temporalPerfil($this->_db->last_insert(),$nombre)) {
			# si tenemos el ultimo el id ....
			return true;
		}



	}

	public function updatePerfil($id_user,$fields = array())
	{
		# actualiza un usuario en la vista de perfilUpdate ...

$query = $this->_db->query("

		UPDATE users,perfiles
		SET
				users.username =  ?,
		    users.password =  ?,
				users.salt     =  ?,
				perfiles.nombre = ?,
		    perfiles.id_departamento= ?,
		    perfiles.cargo = ?,
		    perfiles.ext   = ?,
				perfiles.img   = ?

		WHERE users.id= {$id_user} AND perfiles.user_id= {$id_user}
		",$fields);



if ($query->error()) {
			# si no hay cuenta ...
			throw new Exception("Error Processing Update", 1);
			$this->_error;

		}
		return true;


	}


	public function find($user = null)
	{
		# retorna los datos de un usuario..
		# cambiado el 10 agosto para que retorne informacion por el email
		if (!filter_var($user,FILTER_VALIDATE_EMAIL)) {
			# si no es un email ...
				if ($user) {
				# si es distinto a null...
				$field = (is_numeric($user)) ? 'id':'username';
				$data  = $this->_db->get('users',array($field,'=',$user));

				if ($data->count()) {
					# si hay datos..
					$this->_data = $data->firts();
					return true;
				}
			}

		} else {
			# es un email ...
			$data  = $this->_db->get('users',array('email','=',$user));

				if ($data->count()) {
					# si hay datos..
					$this->_data = $data->firts();
					return true;
				}
		}


		return false;
	}


	public function login($username = null,$password = null)
	{
		# code...
		/*$model = code.$this->find($username);
		var_dump($this->data()->password);*/

		if ($username) {
			# si es distinto a null ...
			$user = $this->find($username);

			if ($user) {
				# code...

				if ($this->data()->password === Hash::make($password,$this->data()->salt)) {
					# si es user ..
					Session::put(Config::get('session/session_name'),$this->data()->id);
					return true;
				}


			}

			return false;
		}
	}


	public function temporalPerfil($id,$nombre)
	{
		# creara un perfil temporal ....
		if ($id) {
			# si hay un id ...
			$temporalperfil = $this->_db->insert('perfiles',array(
				'user_id'         => $id,
				'id_departamento' => '5',
				'nombre'          => $nombre,
				'cargo' 					=> 'desconocido',
				'ext' 						=> '0000',
				'img' 						=> ucwords($nombre[0]).'.png'

			));
			#die($id);
		}
	}

	public function perfilInfobyGroupDepart($depar = '',$grupo = '')
	{
		# code...
		#if (isset($depar) && isset($grupo)) {
			# code...
			$supervisor = $this->_db->query('

			SELECT p.nombre AS nombre,
		       u.email  AS email


		    FROM qtelecom.perfiles p

		       join qtelecom.users u on p.user_id = u.id
		       join qtelecom.departamentos d on p.id_departamento = d.id


       		WHERE
            	d.nombre = ?     # departamento de quien crea el ticket o el usuario
       		AND
				u.grupo = ?      # grupo a quien pertenece el interesado


				',array($depar,$grupo));

			if ($supervisor->count()) {
					# code...
					$this->_data = $supervisor->result();
					return true;
				}

		#}

		return false;
	}







	public function perfilInfobyUserId($user_id)
	{
		# retorna el perfil de un usuario...

		if ($this->find($user_id)) {
			# code...
			$perfil = $this->_db->query('

			SELECT
			p.nombre AS nombre,
		  d.nombre AS departamento,
		  p.cargo  AS cargo,
			p.img    AS img,
		  p.ext    AS extencion

		       FROM qtelecom.perfiles p

		       join qtelecom.users u on p.user_id = u.id
		       join qtelecom.departamentos d on p.id_departamento = d.id

       WHERE
            u.id = ?

				',array($user_id));


			if ($perfil->count()) {
				# code...
				$this->_data = $perfil->result();
				return true;
			}
		}

		return false;
	}


	public function involInfoByid_ticket($id_ticket)
	{
		# retorna el nombre y el email de los involucrados en un ticket
		# teniendo informacion del usuario en la tabla perfil ...
		if ($id_ticket) {
			# code...
			$infoInvol = $this->_db->query('

			select u.email AS email,
					 p.nombre AS nombre

					 FROM qtelecom.ticket_users t_u

					 join qtelecom.perfiles p on t_u.id_user = p.user_id
					 join qtelecom.users u on p.user_id = u.id

					 WHERE
					 t_u.id_ticket = ?

			',array($id_ticket));

			if ($infoInvol->count()) {
				# si tenemos datos  ..
				$this->_data = $infoInvol->result();
				return true;
			}


		}
		return false;
	}

	public function get_email_and_name_all()
	{
		# metodo que retorna todos los email y nombres de los usuarios registrados..
		$email_nombre = $this->_db->query('

		select p.nombre AS nombre,
	 				 u.email AS email

	  FROM qtelecom.perfiles p

			 join qtelecom.users u on p.user_id = u.id
			 join qtelecom.departamentos d on p.id_departamento = d.id


		');

		if ($email_nombre->count()) {
			# si hay resultados ...
			return $email_nombre->result();
		}
		return false;
	}

	public function update($table,$id,$fields = array())
	{
		# actualizar tabla user mediante los campos.
		if (count($fields)) {
			# si hay cuenta en el array.
			if (!$this->_db->update($table,$id,$fields)) {
				# code...
				throw new Exception("Problemas al actualizar", 1);

			}
		}
	}

	public function logout()
	{
		# elimina una session..

		Session::delete($this->_sessionName);

	}

	/*public function firts()
	{
		# code...
		return $this->_data;
	}*/


	public function data()
	{
		# code...
		#
		return $this->_data;
	}


	public function isLoggedIn()
	{
		# retorna la propiedad isLoggedIn...
		return $this->_isLoggin;
	}



	}
