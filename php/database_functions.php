<?php

function db_connect()
{
	$result = mysql_connect("localhost","u08124275","brushcall");
	if(!$result)
		throw new Exception('Could not connect to database');
	else
		{
			return $result;
		}
}

?>