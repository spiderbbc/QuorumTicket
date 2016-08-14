<?php

/**
 * fecha: 12/08
 * description: clase wrapper para el envio de correo al crear,actualizar un ticket
 */






class Email
{

  private static $_instance = null;

  private $_transport,
          $_smtp ,
          $_port ,
          $_username ,
          $_password,
          $_error,
          $_mailer; 

  public 
         $from = [],
         $to  = [],
         $bbc =[],

       
         $title,
         $body;

private function __construct(){

           try {
               // set parametros
               $this->_smtp = Config::get('sendpulse/smtp_server');
               $this->_port = Config::get('sendpulse/smtp_port');
               // set cuenta del usuario
               $this->_username = Config::get('sendpulse/login_username');
               $this->_password = Config::get('sendpulse/login_password');

               
               // Creando el transporte
               $this->_transport = Swift_SmtpTransport::newInstance($this->_smtp,$this->_port);
               $this->_transport->setUsername($this->_username);
               $this->_transport->setPassword($this->_transport);
            

           } catch (Exception $e) {
             die($e->getMessage());
           }


  }



  public function getInstance()
  {
    # code...
    # code...
    if (!isset(self::$_instance)) {
      # si es null ...
      self::$_instance = new Email;
      }

      return self::$_instance;
    }

  


// Create the Mailer using your created Transport

private function setMailerTransport()
{
  # code...
  if (!$this->_mailer = Swift_Mailer::newInstance($this->_transport)) {
    # si no instancia (problemas)...
    return false;
  }
  return true;
}

// prepare
// 

public function prepare($params)
{
  # code...
  if ($params) {
    # si tenemos instancia de Swift..
    if ($this->setMailerTransport()) {
      # instanciamos la instancia Swift_Message..
      $mensage = new Swift_Message();
      $mensage->setFrom($this->from);
      $mensage->setBody($this->body,'text/html');
      $mensage->setTo($this->to);
      $mensage->addPart($params,'text/plain');
      return $mensage;
    }
    

  }
  
  return false;
}





// Send the message
public function sendEmail($mensage)
{
  # code...
  if (!$value = $this->_mailer->send($mensage,$failed)) {
    # code...
    $this->_error = true;
  }
  return $this;
}

//

  public function setFrom($from = array())
  {
    # ingresamos quien los envia ..
    
      if (count($from)) {
        # si tiene datos..
        foreach ($from as $username => $email) {
          # asignamos ...
          $this->from[$username] = $email;
          #return true;
        }
      }
    return false;
  }


  public function setTo($dataUser)
  {
    # ingresamos quien los recibe ..
    if (count($dataUser)) {
        # si tiene datos..
        foreach ($dataUser as $username => $email) {
          # asignamos ...
          $this->to[$username] = $email;
          #return true;
        }
      }
    return false;
  }

  public function setBbc($dataUser)
  {
    # ingresamos quien los recibe ..
    if (count($dataUser)) {
        # si tiene datos..
        foreach ($dataUser as $username => $email) {
          # asignamos ...
          $this->bbc[$username] = $email;
          #return true;
        }
      }
    return false;

    
  }

  public function setTitle($titulo)
  {
    # asginamos..
     $this->title = $titulo;
  }


  public function setBody($body)
  {
    # asginamos..
    $this->body = $body;
  }

  public function getError(){

    return $this->_error;
  }



}