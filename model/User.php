

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
		# crea a un usuario ..

		if (!$this->_db->insert('users',$fields)) {
			# code...
			throw new Exception("Error Processing Request", 1);

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

	public function perfilInfobyUserId($user_id)
	{
		# retorna el perfil de un usuario...
		
		if ($this->find($user_id)) {
			# code...
			$perfil = $this->_db->query('
				
			select p.nombre AS nombre,
		       d.nombre AS departamento,
		       p.cargo  AS cargo,
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
