<?php
#require_once 'class/Email.php';
#require_once 'core/init.php';
// require_once 'vendor/autoload.php';
// require_once 'vendor/swiftmailer/swiftmailer/lib/swift_init.php';
//
//
// // Create the mail transport configuration
// $transport = Swift_MailTransport::newInstance();
//
// // Create the message
// $message = Swift_Message::newInstance();
// $message->setTo(array(
//   "spiderbbc@gmail.com" => "Aurelio De Rosa",
//   "ecastro@quorumtelecom.info" => "Audero"
// ));
// $message->setSubject("This email is sent using Swift Mailer");
// $message->setBody("You're our best client ever.");
// $message->setFrom("account@bank.com", "Your bank");
//
// // Send the email
// $mailer = Swift_Mailer::newInstance($transport);
// $mailer->send($message);

// $email = "spiderbbc@gmail.com";
// $arrayEmail = explodeBy(';',$email);
//
// echo $arrayEmail[0];


/*Email::getInstance();
Email::getInstance();
Email::getInstance();
Email::getInstance();
*/





// $mandrillMail = Email::getInstance();
//
// $sendMail = $mandrillMail->prepare($user->data()->name,$bbc,$dataUser,1);
//
// if (!$sendMail->send->error()) {
// 	# code...
// 	# redirect::to('some view');
// }else{
// 	foreach ($sendMail->error() as $error) {
// 		# code...
// 	}
// }





//  $emailClass = new Email();
//
// $arrayEmail = array('eduuccs@gmail.com' =>'eduardo','castro@gmail.com' =>'castro' );
// echo count($arrayEmail);
//  foreach ($arrayEmail as $nombre => $email) {
//  	# code...
// 	 $emailClass->setParamPrivate('to',array($nombre => $email));
//  }
//
//  print_r($emailClass);
// $user = new Usuario;
// $arrayEmail = array();
// $arrayEmail = get_object_vars($user->data());
//
// // $arrayEmail[$user->data()->username] = $user->data()->email ;
// //
// //
// print_r($arrayEmail['username']);
$user = new Usuario;

$to = array(
 $user->data()->email  => $user->data()->username,
 'recipient2@example2.com' => 'Recipient2 Name'
);
//print_r($to);

$from = array($user->data()->email => $user->data()->username);
print_r($from)."<br>";