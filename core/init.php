<?php
session_start();


	$GLOBALS['config'] = array(

		'mysql' => array(

			'host'    => '127.0.0.1',
			'username'=> 'root',
			'password'=> 'deathnote',
			'db'      => 'qtelecom'

			),

			'sendpulse' => array(

				'smtp_server'  => 'smtp-pulse.com',
				'smtp_port'    => '465',
				'login_username' => 'ecastro@quorumtelecom.info',
				'login_password'       => '4Ng4YG92iEk6MK',

				),

		'remenber' => array(

			'cookie_name'  => 'hash',
			'cookie_expire'=> '3600'

			),

		'session' => array(

			'session_name'=> 'user',
			'token_name'  => 'token'

			)


		);

	require_once 'functions/sanitaze.php';
	require_once 'vendor/autoload.php';
	require_once 'model/User.php';
	require_once 'model/Ticket.php';


	spl_autoload_register(function($class)
	{
		# funcion anonima que carga las classes..
		require_once 'class/'.$class.'.php';
	});


