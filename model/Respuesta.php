<?php


/**
 * Clase Respuesta
 * description: representacion de tabla respuesta
 * date: 23/08/2016
 */
// class Respuesta
// {
//
//   private $_data;
//
//   function __construct($data)
//   {
//     # inicializando la clase ...
//     $this->_data = $data;
//   }
//
//   public function data()
//   {
//     # retornamos la data...
//     return $this->_data;
//   }
// }

$json = file_get_contents('php://input');
$obj['message'] = json_decode($json);
//$respuesta = new Respuesta(json_decode(file_get_contents('php://input'), true));
//$data['message'] = "hola hola";
//$post = json_decode(file_get_contents('php://input'), true);
//$data ['message'] = "hola desde el modelo respuesta";
// // response back.
 echo json_encode($obj);
// //	print_r($_POST);
// echo "Es un Post";
