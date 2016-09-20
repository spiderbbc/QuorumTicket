<?php


/**
 * Clase Respuesta
 * description: representacion de tabla respuesta
 * date: 23/08/2016
 */
class Respuesta
{

  private $_error,
          $_data,
          $_db;

  function __construct()
  {
    # inicializando la clase ...
    $this->_db = DB::getInstance();
  }

  public function data()
  {
    # retornamos la data...
    return $this->_data;
  }

  public function create($fields = array())
  {
    # metodo que guarda la respuesta de un ticket ...
    $this->_error = false;
        if (count($fields)) {
          # si hay datos en el array ..
          $respuesta = $this->_db->insert('respuestas',$fields);
                if (!$respuesta) {
                  # si no guardo tenemos un error ...
                  $this->_error = true;
                }
        }
  }

  public function get($uuid)
  {
    # retorna las respuesta de un tickets...
    $respuesta = $this->_db->query("

    select p.nombre AS nombre,
           d.nombre AS departamento,
           p.cargo  AS cargo,
           p.ext    AS extencion,
           p.img    AS img,

           r.msg    AS mensaje,
           r.date_update AS fecha

           FROM qtelecom.respuestas r

           join qtelecom.perfiles p on r.user_id = p.user_id
           join qtelecom.users u on p.user_id = u.id
           join qtelecom.departamentos d on p.id_departamento = d.id
          # join qtelecom.respuestas r on t.uuid = r.uuid

           WHERE
                r.uuid = ?


    ",array($uuid));
      if ($respuesta->count()) {
        # si tenemos datos ...
        $this->_data = $respuesta->result();
        return true;
      }
      return false;
  }

  public function error()
  {
    # retornamos la propiedad error ..
    return $this->_error;
  }

}

//$json = file_get_contents('php://input');
//$obj['message'] = json_decode($json);
//$respuesta = new Respuesta(json_decode(file_get_contents('php://input'), true));
//$data['message'] = "hola hola";
//$post = json_decode(file_get_contents('php://input'), true);
//$data ['message'] = "hola desde el modelo respuesta";
// // response back.
// echo json_encode($obj);
// //	print_r($_POST);
// echo "Es un Post";
