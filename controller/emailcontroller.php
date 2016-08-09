<?php

require_once 'vendor/autoload.php';
require_once 'vendor/swiftmailer/swiftmailer/lib/swift_init.php';


// Create the mail transport configuration
$transport = Swift_MailTransport::newInstance();

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
