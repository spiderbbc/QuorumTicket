
<?php 


/**
* 
*/
class Validate 
{
	private $_db,
			$_error,
			$_passed = false;



	function __construct()
	{
		# inicializamos...
		$this->_db = DB::getInstance();
	}

	public function check($request,$fields = array())
	{
		# valida los inputs mediante una serie de reglas...
		# source = [ username =>'aaaa','password'=>'aaaaa']
		#field = username,password,email
		#rule = min,max,required
		#rule_value = true,20,10
		foreach ($fields as $field => $rules) {
			# code...
			foreach ($rules as $rule => $rule_value) {
				# code...
				
				$source = $request[$field];
				/*echo "El campo:{$field} con regla:{$rule} tiene un valor:{$rule_value}<br>";
				echo "El formulario envia ... {$source}<br>";*/

				if (empty($source) && $rule === "required") {
					# code...
					$this->addError("El Campo:{$field} es requerido");
				}elseif (!empty($source)) {
					# si no esta vacio se procede a validar ...
					switch ($rule) {
						case 'min':
							# valor minimo...
							if (strlen($source) < $rule_value) {
								# code...
								$this->addError("El campo:{$field} debe ser mayor que {$rule_value}");
							}
							break;

						case 'max':
							# valor maximo...
							if (strlen($source) > $rule_value) {
								# code...
								$this->addError("El campo:{$field} debe ser menor que {$rule_value}");
							}
							break;
						
						case 'equal':
							# que sea identico con el referido ...
							
							if ($source != $request[$rule_value]) {
								# code...
								$this->addError("El campo:{$field} debe ser igual que {$rule_value}");
							}

							break;

						case 'unique':
							# validamos que el usuario no este duplicado en la bd..
							$user = $this->_db->get('users',array($field,'=',$source));
							if ($user->count()) {
								# si hay una cuenta..
								$this->addError("El usuario:{$source} no esta disponible");
							}
							break;
						
						default:
							# code...
							break;
					}
				}
			}
		}

	if (empty($this->_error)) {
		# si no hay errores en el array..
		$this->_passed = true;
	}

	}


	private function addError($error)
	{
		# insertamos los errores en un array..
		$this->_error[] = $error;
	}

	public function errors()
	{
		# retorna el array error...
		return $this->_error;
	}

	public function passed()
	{
		# code...
		return $this->_passed;
	}

	
}