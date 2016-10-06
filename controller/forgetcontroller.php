<?php




if (Input::exits()) {
  # code...
  if (Token::check(Input::get('token'))) {
    # code...



    $validation = new Validate();
    $validate   = $validation->check($_POST,array(

      'email' => array(
        'required' => true,
        'filter'   => FILTER_VALIDATE_EMAIL
      )

    ));

    if ($validation->passed()) {
      # code...
      #echo "No hay problemas";
      $user = new Usuario(Input::get('email'));
      if (!$user->data()) {
        # no esta registrado ...
        Session::flash('error','Upss este email, no esta registrado en el sistema');
        Redirect::to(404);
      }

      # preparamos a enviar el correo
      $transport = Swift_SmtpTransport::newInstance(Config::get('sendpulse/smtp_server'),
       Config::get('sendpulse/smtp_port'),'ssl');
      $transport->setUsername(Config::get('sendpulse/login_username'));
      $transport->setPassword(Config::get('sendpulse/login_password'));
      $swift = Swift_Mailer::newInstance($transport);

      $subject = "Restablecer la contraseña: Usuario ".$user->data()->username;
      $text    = "Buen Dia, estas a un paso de restablecer tu contraseña..";
      $html = '<h1>Restablecer la contraseña</h1><br>
              <em> sigue el siguiente enlace:</em><br>
              <a href="http://localhost/QTelecom/?accion=recovery&id='.$user->data()->id.'&valor='.$user->data()->password.'">aqui!!</a>';






      $message = new Swift_Message($subject);
      $from = array(Config::get('sendpulse/login_username') => Config::get('sendpulse/system_name'));

      $message->setFrom($from);
      $message->setBody($html, 'text/html');

      $message->setTo([$user->data()->email => $user->data()->username]);

      $message->addPart($text, 'text/plain');

      if ($recipients = $swift->send($message, $failures))
            {
            Redirect::to('?accion=ver&valor='.$data[0]->uuid);
              } else {
             echo "There was an error:\n";
             print_r($failures);
            }



    }else {
      # disparamos los errores
      foreach ($validation->errors() as $error) {
        # code...
        echo $error."<br>";
      }
    }
  }
}

$token = Token::generate();
require_once 'view/forget.php';
