<?php

/**
 * fecha: 12/08
 * description: clase wrapper para el envio de correo al crear,actualizar un ticket
 */





class Email
{

  private static $_instance = null;

  private $_transport,
          $_smtp,
          $_port,
          $_username,
          $_password,
          $_error = false;

  public $from,
         $to,
         $title,
         $body;

private function __construct(){

           try {
               $this->_transport = Swift_SmtpTransport::newInstance(Config::get('sendpulse/smtp_server',Config::get('sendpulse/smtp_port')));
               $this->_transport->setUsername(Config::get('sendpulse/login_username'));
               $this->_transport->setPassword(Config::get('sendpulse/password'));
               echo "Clase Email lista ...";

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

  }
