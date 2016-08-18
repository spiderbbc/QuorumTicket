

<?php



/**
* Clase: Ticket
* tabla: tickets
* autor: eduardo morales
* descript: clase envoltorio y logica de negocio del ticket
* fecha: 30-07
*/
class Ticket
{
	private $_db,
					$_data,
					$_uuid,
					$_invol = array(),
					$_error = false;

	function __construct()
	{
		# code...
		$this->_db = DB::getInstance();
	}


	public function update($uuid,$fields = array())
	{
		# actualiza un ticket y devuelve true o false..
	}


	public function create($fields = array())
	{
		# crea un ticket y devuelve true o false..
		$this->_error = false;
		if (count($fields)) {
			# code...
			if (!$this->_db->insert('tickets',$fields)) {
				# otros metodos involucrados...
				throw new Exception("Error Processing Request", 1);
				$this->_error = true;
			}else{
				$this->_uuid = $this->_db->last_insert();
			}
		}

		return true;
	}



	public function exits($uuid = null)
	{
		# retorna true o false si existe un ticket bajo uuid..
		if ($uuid) {
			# code...
			$value = $this->_db->get('tickets',array('uuid','=',$uuid));
			if ($value->count()) {
				# code...
				return true;
			}
			return false;
		}
	}


	public function listar()
	{
		# lista los tiquets para el home sin restricion..
		$this->_error = false;
		$tickets = $this->_db->query('

	  SELECT t.id AS numero,
      t.titulo,
      s.nombre AS estatus,
      u.username AS autor,
      serv.nombre AS servicios,
      t.date_added AS creado,
      t.date_update AS actualizado
      from qtelecom.tickets t

      join qtelecom.users u on t.user_id = u.id
      join qtelecom.servicios serv on t.id_servicios = serv.id
      join qtelecom.status s on t.id_status = s.id '
      );

		if ($tickets->count()) {
			# code...
			$this->_data = $tickets->result();
			$this->_error = false;

		}else {
			$this->_error = true;
		}

		return $this;

	}



	public function make()
	{
		# genera un uuid pasando por un exist para evitar uuid replicados ..
		$uuid = uniqid();
		return ($this->exits($uuid)) ? $this->make():$uuid;

	}

	public function last_insert_id()
	{

		return $this->_uuid;
	}


	public function firts()
	{
		# code...
		return $this->_data[0];
	}
	public function data()
	{
		# retorna la propiedad data...
		return $this->_data;
	}

	public function error()
	{
		# retorna la propiedad data...
		return $this->_error;
	}

	public function saveInvol($id_user)
	{
		# persiste en la tabla ticket_user  ..
		if ($this->_db->insert('ticket_users',array('id_user'=>$id_user,'id_ticket'=>$this->last_insert_id()))) {
			# code...
			return true;
		}
		return false;
	}

	




	public function find($field = '',$value = '')
	{
		# retorna un ticket por uui o id..
		if (empty($field) && empty($value)) {
			# code...
			trigger_error('bad message ...');
		}

		$data = $this->_db->get('tickets',array($field,'=',$value));
				if (!$data->count()) {
					# si no hay datos ..
					return false;
				}else {
					# si hay datos ....
					return $data->result();
				}


	}

	public function isInvol($id_user)
	{
		# retorna si un usuario esta involucrado en el ticket ..
		if ($id_user) {
			# si hay id del usuario ..
			$this->_db->get('ticket_users',array(''))
		}
	}

	private function invol_to_ticket($uuid)
	{
		# retornara los involucrados en un ticket por uuid..
	}


}
