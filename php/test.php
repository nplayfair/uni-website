<?php

$con = mysql_connect("localhost","u08124275","brushcall");

if (!$con)
	{
	die('Couldnt connect' . mysql_error());
	}
mysql_select_db("u08124275",$con);

$sql="CREATE TABLE rhusers (
	userid SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(16) NOT NULL,
	password VARCHAR(40) NOT NULL,
	email VARCHAR(100) NOT NULL,
	newsletter BOOLEAN NOT NULL
	)";
if (!mysql_query($sql,$con))    
  {       
  die('Error: ' . mysql_error());    
  } 
else 
     { 
echo ("table successfully created"); 
}


mysql_close($con);
echo ('YO!');

?>