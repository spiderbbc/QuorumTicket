<?php
session_start();
setlocale(LC_TIME,"es_VE.UTF-8");

// heroku config
//$url = getenv('JAWSDB_MARIA_URL');
//$dbparts = parse_url($url);

	$GLOBALS['config'] = array(

		'mysql' => array(

			'host'    => '127.0.0.1',
			'port'		=> '5432',
			'username'=> 'root',
			'password'=> 'deathnote',
			'db'      => 'qtelecom'

			),

			'postgresql' => array(

				'host'    => '127.0.0.1',
				'port'		=> '5432',
				'username'=> 'root',
				'password'=> 'deathnote',
				'db'      => 'qtelecom'

				),

			'sendpulse' => array(

				'smtp_server'  				 => 'smtp.gmail.com',
				'smtp_port'    				 => '465',
				'login_username' 			 => 'spiderbbc@gmail.com',
				'login_password'       => 'deathnote254242',
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
