<?php

function escape($string)
{
	# code...
	return htmlentities($string,ENT_QUOTES,'UTF-8');
}

function explodeBy($by,$string)
{
	# hace un explode simple por el string y delimitador..
		return explode($by,$string);
}

function implodeBy($by,$string= array())
{
	# hace un implode simple por el string y delimitador..
		return implode($by,$string);
}

 ?>
