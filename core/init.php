<?php
session_start();
setlocale(LC_TIME,"es_VE.UTF-8");

// heroku config
$url = getenv('JAWSDB_MARIA_URL');
$dbparts = parse_url($url);

	$GLOBALS['config'] = array(

		'mysql' => array(

			'host'    => $dbparts['host'],
			'port'		=> '5432',
			'username'=> $dbparts['user'],
			'password'=> $dbparts['pass'],
			'db'      => ltrim($dbparts['path'],'/')

			),

			'postgresql' => array(

				'host'    => '127.0.0.1',
				'port'		=> '5432',
				'username'=> 'root',
				'password'=> 'deathnote',
				'db'      => 'qtelecom'

				),

			'sendpulse' => array(

				'smtp_server'  				 => 'smtp-pulse.com',
				'smtp_port'    				 => '2525',
				'login_username' 			 => 'ecastro@quorumtelecom.info',
				'login_password'       => '4Ng4YG92iEk6MK',
				'system_name'					 => 'Quorum Ticket'

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
