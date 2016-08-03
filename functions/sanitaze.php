<?php 

function escape($string)
{
	# code...
	return htmlentities($string,ENT_QUOTES,'UTF-8');
}


 ?>