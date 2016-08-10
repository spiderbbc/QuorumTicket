<?php

require_once 'vendor/autoload.php';
require_once 'vendor/swiftmailer/swiftmailer/lib/swift_init.php';


// Create the mail transport configuration
/*$transport = Swift_MailTransport::newInstance();

// Create the message
$message = Swift_Message::newInstance();
$message->setTo(array(
  "spiderbbc@gmail.com" => "Aurelio De Rosa",
  "ecastro@quorumtelecom.info" => "Audero"
));
$message->setSubject("This email is sent using Swift Mailer");
$message->setBody("You're our best client ever.");
$message->setFrom("account@bank.com", "Your bank");

// Send the email
$mailer = Swift_Mailer::newInstance($transport);
$mailer->send($message);
*/

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp-pulse.com',2525)
  ->setUsername('ecastro@quorumtelecom.info')
  ->setPassword('4Ng4YG92iEk6MK')
  ;

/*
You could alternatively use a different transport such as Sendmail or Mail:

// Sendmail
$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

// Mail
$transport = Swift_MailTransport::newInstance();
*/

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('test Swift_Mailer y Mandrill')
  ->setFrom(array('ecastro@quorumtelecom.info' => 'xavier castro'))
  ->setTo(array('spiderbbc@gmail.com', 'other@domain.org' => 'Qtelecom'))
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);