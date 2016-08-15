<?php

/**
 * fecha: 12/08
 * description: clase wrapper para el envio de correo al crear,actualizar un ticket
 */






class Email
{

  private $_transport,
          $_mensage,
          $_to,
          $_bbc,
          $_from,
          $_error;

  public
         $subject,
         $title,
         $text,
         $body;


public function setParam($param,$string = '')
{

  # metodo que seteara datos dependdientdo el params ..

  $list = array('subject','title','text','body');
  if (in_array($param,$list)) {
    # si es una propiedad de la clase...
    $this->$param = $string;
  }
  return false;
}


public function setParamPrivate($param,$dataUser)
{
  # ingresamos quien los recibe ..

  if (count($dataUser)) {
      # si tiene datos..
      $private = '_'.$param;
      #foreach ($dataUser as $username => $email) {
        # asignamos ...
        $this->$private = $dataUser;
        #return true;
      #}
    }
  #return false;
}

}
