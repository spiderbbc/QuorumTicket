<?php
session_start();


	$GLOBALS['config'] = array(

		'mysql' => array(

			'host'    => '127.0.0.1',
			'username'=> 'root',
			'password'=> 'deathnote',
			'db'      => 'qtelecom'

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

	spl_autoload_register(function($class)
	{
		# funcion anonima que carga las classes..
		require_once 'class/'.$class.'.php';
	});

	require_once 'functions/sanitaze.php';
	require_once 'model/User.php';
	require_once 'model/Ticket.php';
