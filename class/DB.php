<?php

/**
* name: DB
* date: 25/07/2016
* autor: Eduardo Morales
* Description: Clase envoltorio para la base de datos: create,update,query
*/
class DB
{
	private static $_instance = null;

	private $_pdo,
			$_query,
			$_error = false,
			$_count= 0,
			$_lastid = null,
			$_result;


	private function __construct()
	{
		# code...
		try {
			$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db').'',Config::get('mysql/username'),Config::get('mysql/password'));


		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public static function getInstance()
	{
		# instancia una nueva clase ..
		if (!isset(self::$_instance)) {
			# si no esta instanciada o es distinto de null..
			self::$_instance = new DB();
		}

		return self::$_instance;
	}

	public function query($sql,$params = array())
	{
		$this->_error = false;
		# ejecuta una sentencia query...
		
		if ($this->_query = $this->_pdo->prepare($sql)) {
			# si es una sentencia valida..
			if (count($params)) {
				# si hay datos en params...
				$x = 1;
				foreach ($params as $param) {
					# ...
					/*echo $param.'<br>';*/
					$this->_query->bindValue($x,$param);
					$x++;
				}
			}

				if ($this->_query->execute()) {
					# si se ejecuta el query...
					$this->_lastid = $this->_pdo->lastInsertId();
					$this->_count  = $this->_query->rowCount();
					$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
				}else{

					$this->_error = true;
				}

		}

		return $this;
	}

	public function action($action,$table,$where = array())
	{
		# determina una accion para invocar el metodo query..
		if (count($where) === 3) {
			# si el array tiene 3 elementos..

			$operators = array('<','>','=','>=','<=');

			$field    = $where[0];
			$operador = $where[1];
			$value    = $where[2];

			if (in_array($operador,$operators)) {
				# si valor esta en el array en operators..
				$sql = "{$action} FROM {$table} WHERE {$field}{$operador} ?";

				if (!$this->query($sql,array($value))->error()) {
					# si no hay error en el query...
					return $this;
				}
			}
		}

		return false;
	}


	public function insert($table,$fields = array())
	{
		# metodo que crea un nuevo registro en la bd ...


		if (count($fields)) {
			# si hay datos en el array...
			$set = '';
			$x   = 1;
			foreach ($fields as $field) {
				# code...
				$set .= '?';
				if (count($fields) > $x) {
					# si el indice es menor a fields ...
					$set .= ', ';

				}
				$x++;
			}
			/*die($set);*/
			$keys = array_keys($fields);
				#   "INSERT INTO {$table}(`".implode('`,`',$keys)."`) VALUES({$value})"
			$sql  = "INSERT INTO {$table}(`".implode('`,`',$keys)."`) VALUES ({$set})";
			/*die($sql);*/

			if (!$this->query($sql,$fields)->error()) {
				# si no hay error...
				return true;
			}
		}


		return false;
	}

	public function update($table,$id,$fields = array())
	{
		# actualiza un registro...
		if (count($fields)) {
			# si hay datos en el array...
			$set = '';
			$x   =  1;
			foreach ($fields as $field => $value) {
				# por cada..
				$set .= $field.'= ?';
				if (count($fields) > $x) {
				 	# code...
				 	$set .= ', ';
				 }
				 $x++;
			}
			/*die($set);*/
			$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
			/*die($sql);*/
			if (!$this->query($sql,$fields)->error()) {
				# si no hay error..
				return true;
			}
		}
		return false;
	}


	public function getByName($fields = array(),$table)
	{
		# retorna la data por field ...
		if (count($fields)) {
			# si hay datos...
			$set = '';
			$x   = 1;
			foreach ($fields as $field) {
				# code...
				$set .= $field;
				if (count($fields) > $x) {
					# code...
					$set .=', ';
					$x++;
				}

			}
			$sql = "SELECT {$set} FROM {$table}";
			// die($sql);
			if (!$this->query($sql)->error()) {
				# code...
				return true;
			}
		}
		return false;
	}

	public function delete($table,$params)
	{
		# elimina un registro...
		return $this->action('DELETE',$table,$params);
	}

	public function get($table,$params = array()){

		return $this->action('SELECT *',$table,$params);
	}

	public function firts()
	{
		# retorna el atributo result...
		return $this->_result[0];
	}

	public function last_insert()
	{
		# code...
		return $this->_lastid;
	}

	public function error()
	{
		# retorna la propiedad error...
		return $this->_error;
	}

	public function result()
	{
		# retorna la propiedad result...
		return $this->_result;
	}

	public function count()
	{
		# retorna la propiedad $_count...
		return $this->_count;
	}


}
