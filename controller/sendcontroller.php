<?php


$user = new Usuario;

if (!$user->isLoggedIn()) {
  # si no esta logeado ...
  Redirect::to('?accion=login');
}

#
## tratamos de recoger el id del ticket
$request = (!empty(Input::get('valor'))) ? Input::get('valor') : false ;

if (!$request) {
  # si es false tenemos problemas...
  Session::flash('error','Upps Houton tenemos un problemas');
  Redirect::to(404);
}


#
## recuperamos todo el ticket a quien el usuario solicita permiso
$ticket = new Ticket();
$ticketSend = $ticket->find('id',$request);
#var_dump($ticketSend[0]->user_id);


#
## recuperamos al autor
$autor = new Usuario($ticketSend[0]->user_id);
#var_dump($autor->data()->email);



# preparamos a enviar el correo
$transport = Swift_SmtpTransport::newInstance(Config::get('sendpulse/smtp_server'),
 Config::get('sendpulse/smtp_port'),'ssl');
$transport->setUsername(Config::get('sendpulse/login_username'));
$transport->setPassword(Config::get('sendpulse/login_password'));
$swift = Swift_Mailer::newInstance($transport);

$subject = "Solicitud para unirse en ticket: ".$ticketSend[0]->id;
$text    = "Buen Dia, el usuario .{$user->data()->username} solicita unirse al ticket";
$html = '<p>se le solicita al autor del siguiente <a href="http://localhost/QTelecom/?accion=ver&valor='.$ticketSend[0]->uuid.'">'.$ticketSend[0]->id.'!!</a> </p><br>
        <em> si desea autorizar seguir el siguiente enlace de caso contrario ignorar:</em><br>
        <a href="http://localhost/QTelecom/?accion=recovery&id='.$user->data()->id.'&valor='.$user->data()->password.'">aqui!!</a>';






$message = new Swift_Message($subject);
$from = array(Config::get('sendpulse/login_username') => Config::get('sendpulse/system_name'));

$message->setFrom($from);
$message->setBody($html, 'text/html');

$message->setTo([$autor->data()->email => $autor->data()->username]);

$message->addPart($text, 'text/plain');

if ($recipients = $swift->send($message, $failures))
      {
      Session::delete('home');
      Session::flash('home','Se envio un email al autor del ticket, atento a cualquier respuesta');
      Redirect::to('?accion=home');
        } else {
       echo "There was an error:\n";
       print_r($failures);
      }
